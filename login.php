<?php
include "db_conn.php";


// Function to validate input
function validate($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}


// Check if login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);


    if (empty($username) || empty($password)) {
        header("Location: index.php?error=Username and Password are required!");
        exit();
    }


    $sql = "SELECT * FROM login WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();


        // Verify password
        if (password_verify($password, $row['password'])) {
            header("Location: dashboard.php");
            exit();
        } else {
            header("Location: index.php?error=Incorrect Password!");
            exit();
        }
    } else {
        header("Location: index.php?error=User not found!");
        exit();
    }
    $stmt->close();
}
$conn->close();
?>
