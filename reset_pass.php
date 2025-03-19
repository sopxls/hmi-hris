<?php
session_start();
include "db_conn.php";

// Define a variable to store the error message
$error_message = '';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $sql = "SELECT email, reset_token, reset_expiry FROM login WHERE reset_token = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (strtotime($row['reset_expiry']) < time()) {
            // Set error message instead of die()
            $error_message = "Token has expired! Please request a new one.";
        }
        $_SESSION['reset_email'] = $row['email'];
    } else {
        // Set error message instead of die()
        $error_message = "Invalid token! Please check your email and try again.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['reset_email'])) {
        // Set error message instead of die()
        $error_message = "Session expired or invalid request!";
    }

    $new_password = $_POST['new_password'];
    if (strlen($new_password) < 8 || !preg_match("/[A-Z]/", $new_password) || !preg_match("/[0-9]/", $new_password)) {
        // Set error message instead of die()
        $error_message = "Password must be at least 8 characters long, contain an uppercase letter and a number.";
    }

    if (empty($error_message)) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $email = $_SESSION['reset_email'];

        // Update password and clear reset attempts
        $sql = "UPDATE login SET password = ?, reset_token = NULL, reset_expiry = NULL, reset_attempts = 0 WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $hashed_password, $email);
        $stmt->execute();

        session_destroy();
        header("Location: index.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<style>
    /* RESET PASSWORD */
    .reset-header-btn button {
        width: 50px;
        margin: 3px;
        background-color: #6d2323;
        color: white;
        padding: 7px;
        cursor: pointer;
        font-size: 13px;
        border-radius: 5px;
        transition: background 0.3s;
    }

    .reset-header-btn button:hover {
        background-color: gray;
    }

    .reset-header-btn i {
        font-size: 18px;
    }

    .reset-header h2 {
        font-size: 50px;
        text-align: center;
        color: #6d2323;
        font-family: "Markazi Text", serif;
        font-weight: bold;
        margin: 20px auto;
    }

    .reset-grp-form {
        width: 35%;
        min-height: 100px;
        margin: 10px auto;
        padding: 20px;
        background: #d9d9d9;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .reset-grp-form input {
        width: 100%;
        max-width: 300px;
        padding: 10px;
        margin: 20px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .reset-error {
        font-size: 12px;
        color: #6d2323;
        text-align: center;
        margin: 10px 0;
        font-weight: bold;
    }

    .reset-grp-form button {
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

    .reset-grp-form button:hover {
        background-color: gray;
    }

    /* Media Queries for Responsiveness */
    @media only screen and (max-width: 768px) {
        .reset-header h2 {
            font-size: 35px;
        }

        .reset-grp-form {
            width: 80%;
            padding: 15px;
        }

        .reset-grp-form input {
            width: 100%;
            margin: 15px 0;
        }

        .reset-grp-form button {
            width: 100%;
            font-size: 14px;
        }

        .reset-header-btn button {
            width: 40px;
            font-size: 12px;
        }
    }

    @media only screen and (max-width: 480px) {
        .reset-header h2 {
            font-size: 30px;
        }

        .reset-grp-form {
            width: 90%;
            padding: 15px;
        }

        .reset-grp-form input {
            width: 100%;
            margin: 15px 0;
        }

        .reset-grp-form button {
            width: 100%;
            font-size: 14px;
        }
    }
</style>
<body>
<div class="reset-header">
    <div class="reset-header-btn">
        <button class="back-btn-reset">
            <i class="bi bi-arrow-left-circle"></i> BACK
        </button>
    </div>
    <h2>Reset Password</h2>
</div>
<form action="reset_pass.php" method="post">
    <?php if (!empty($error_message)) { ?>
        <div class="reset-error"><?php echo $error_message; ?></div>
    <?php } ?>
    <div class="reset-grp-form">
        <input type="password" name="new_password" required placeholder="Enter new password">
        <button type="submit" id="reset-btn">Reset Password</button>
    </div>
</form>

<script>
    if (document.querySelector(".back-btn-reset")) {
        document.querySelector(".back-btn-reset").addEventListener("click", function () {
            window.location.href = "forgot_pass.php";
        });
    }
</script>
</body>
</html>
