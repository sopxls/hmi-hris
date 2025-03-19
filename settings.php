<?php
include("db_conn.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST); // Debugging: Check if form data is received

    $username = "sopiya"; // Change this to dynamic if needed
    $oldPass = $_POST['oldPass'] ?? '';
    $newPass = $_POST['newPass'] ?? '';
    $confirmPass = $_POST['confirmPass'] ?? '';

    // Validation: Check if new password matches confirm password
    if ($newPass !== $confirmPass) {
        header("Location: account.php?error=Error: New and current password do not match.");
        exit();
    }

    // Password Strength Validation (at least 8 characters, one uppercase letter, one number)
    if (!preg_match('/^(?=.*[A-Z])(?=.*\d).{8,}$/', $newPass)) {
        header("Location: account.php?error=Error: Password must be at least 8 characters long, contain an uppercase letter, and a number.");
        exit();
    }

    // Fetch user details from the database
    $sql = "SELECT password FROM login WHERE username = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        header("Location: account.php?error=Error in SQL preparation: " . $conn->error);
        exit();
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) { // User found
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        echo "Hashed Password from DB: " . $hashed_password . "<br>"; // Debugging

        // Verify old password
        if (password_verify($oldPass, $hashed_password)) {
            // Hash the new password
            $new_hashed_password = password_hash($newPass, PASSWORD_DEFAULT);

            echo "New Hashed Password: " . $new_hashed_password . "<br>"; // Debugging

            // Update password in the database
            $update_sql = "UPDATE login SET password = ? WHERE username = ?";
            $update_stmt = $conn->prepare($update_sql);
            if (!$update_stmt) {
                die("Error in update SQL preparation: " . $conn->error);
            }

            $update_stmt->bind_param("ss", $new_hashed_password, $username);
            if ($update_stmt->execute()) {
                header("Location: account.php?error=Password Changed Successfully!");
                exit();
            } else {
                header("Location: account.php?error=Error updating password: ") . $update_stmt->error;
                exit();
            }
        } else {
            header("Location: account.php?error=Error: Current password is incorrect.");
            exit();
        }
    } else {
        header("Location: account.php?error=Error: User not found.");
        exit();
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>
