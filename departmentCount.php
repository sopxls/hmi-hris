<?php
include 'employee_db.php'; // Ensure this includes your database connection

// Query to count the total number of department tables
$query = "SELECT COUNT(*) as total_departments FROM information_schema.tables WHERE table_schema = 'employee_db' AND table_name LIKE '%_emp'";
$result = $conn->query($query);

if ($result) {
    $row = $result->fetch_assoc();
    echo json_encode(['total_departments' => $row['total_departments']]);
} else {
    echo json_encode(['error' => 'Query failed']);
}

$conn->close();
?>
