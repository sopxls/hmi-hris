<?php
include "db_conn.php"; 
session_start();

date_default_timezone_set('Asia/Manila'); // Set timezone to avoid mismatches
$cooldown_time = 300; // 5 minutes in seconds
$remaining_time = 0;
$reset_link = ''; // Initialize the variable to store the reset link.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);

    // Check last reset attempt
    $sql = "SELECT reset_attempts, last_reset_attempt FROM login WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        $last_attempt = $user['last_reset_attempt'] ? strtotime($user['last_reset_attempt']) : 0; // Fix NULL issue
        $current_time = time();

        if ($last_attempt > 0 && ($current_time - $last_attempt) < $cooldown_time) {
            $remaining_time = $cooldown_time - ($current_time - $last_attempt);
        } else {
            $token = bin2hex(random_bytes(32));
            $expires = date("Y-m-d H:i:s", strtotime("+15 minutes"));
            $ip_address = $_SERVER['REMOTE_ADDR'];

            // Update the database with the reset token
            $sql = "UPDATE login SET reset_token = ?, reset_expiry = ?, reset_attempts = reset_attempts + 1, last_reset_attempt = NOW(), last_reset_ip = ? WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $token, $expires, $ip_address, $email);
            $stmt->execute();

            // Generate reset link
            $reset_link = "http://localhost/HRIS/reset_pass.php?token=" . urlencode($token);
        }
    } else {
        header("Location: forgot_pass.php?error=Email not found!");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <script>
    let remainingTime = <?php echo max(0, $remaining_time); ?>; // Ensure it doesn't go negative

    function startCountdown() {
        if (remainingTime > 0) {
            document.getElementById("send-btn").disabled = true;

            let countdown = setInterval(() => {
                let minutes = Math.floor(remainingTime / 60);
                let seconds = remainingTime % 60;
                document.getElementById("timer").innerText = `Please wait ${minutes}m ${seconds}s before trying again.`;

                remainingTime--;

                if (remainingTime <= 0) {
                    clearInterval(countdown);
                    document.getElementById("timer").innerText = "";
                    document.getElementById("send-btn").disabled = false;
                }
            }, 1000);
        }
    }

    window.onload = startCountdown;
</script>
</head>
<style>
    /* Default styles */
/* Default styles */
.forgot-header-btn button {
    width: 50px;
    margin: auto;
    background-color: #6d2323;
    color: white;
    padding: 7px;
    cursor: pointer;
    font-size: 13px;
    border-radius: 5px;
    transition: background 0.3s;
}

.forgot-header-btn button:hover {
    background-color: gray;
}

.forgot-header-btn i {
    font-size: 18px;
}

.forgot-header h2 {
    font-size: 45px;
    text-align: center;
    color: #6d2323;
    font-family: "Markazi Text", serif;
    font-weight: bold;
    margin: 20px auto;
}

.forgot-grp-form {
    width: 35%;
    min-height: 200px;
    margin: 20px auto;
    padding: 20px;
    background: #d9d9d9;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.forgot-grp-form p {
    font-family: "Markazi Text", serif;
    font-weight: bold;
    font-size: 25px;
    margin: 10px auto;
}

.forgot-grp-form input {
    width: 100%;
    max-width: 300px;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.forgot-error {
    font-size: 12px;
    color: #6d2323;
    text-align: center;
    margin: 10px 0;
    font-weight: bold;
}

.forgot-grp-form button {
    width: 100%;
    max-width: 200px;
    padding: 10px 15px;
    background-color: #6d2323;
    color: white;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
    border: none;
    transition: background 0.3s;
    margin: 20px 0;
}

.forgot-grp-form button:hover {
    background-color: gray;
}

/* Media Queries for responsiveness */

/* For tablets and smaller screens (max-width: 768px) */
@media only screen and (max-width: 768px) {
    .forgot-header h2 {
        font-size: 35px;
    }

    .forgot-grp-form {
        width: 80%;
        padding: 15px;
    }

    .forgot-grp-form input {
        width: 100%;
        margin: 15px 0;
    }

    .forgot-grp-form button {
        width: 100%;
        font-size: 14px;
    }
}

/* For mobile screens (max-width: 480px) */
@media only screen and (max-width: 480px) {
    .forgot-header h2 {
        font-size: 30px;
    }

    .forgot-grp-form {
        width: 90%;
    }

    .forgot-grp-form input {
        width: 100%;
        margin: 10px 0;
    }

    .forgot-grp-form button {
        width: 100%;
        font-size: 14px;
    }
}

</style>
<body>
    <div class="forgot-header">
        <div class="forgot-header-btn">
            <button class="back-btn-reset">
                <i class="bi bi-arrow-left-circle"></i> BACK
            </button>
        </div>
        <h2>Forgot Password?</h2>
    </div>
    <form action="forgot_pass.php" method="post">
        <div class="forgot-grp-form">
            <p>EMAIL VERIFICATION</p><hr>
            <input type="email" name="email" required placeholder="Enter your email">
            <?php if(isset($_GET['error'])) { ?>
                <div class="forgot-error"><?php echo $_GET['error']; ?></div>
            <?php } ?>
            <p id="timer" style="color: red;"></p> <!-- Countdown display -->
            <button type="submit" id="send-btn">Send Reset Link</button>

            <!-- Display the reset link if it's set -->
            <?php if ($reset_link) { ?>
                <div class="reset-link" style="margin-top: 20px; font-size: 16px; font-weight: bold; color: green;">
                    <p>Here is your reset link:</p>
                    <a href="<?php echo $reset_link; ?>"><?php echo $reset_link; ?></a>
                </div>
            <?php } ?>
        </div>
    </form>
    <script>
        if (document.querySelector(".back-btn-reset")) {
            document.querySelector(".back-btn-reset").addEventListener("click", function () {
                window.location.href = "index.php";
            });
        }
    </script>
</body>
</html>
