<?php
include 'employee_db.php'; // Database connection

$query = "SELECT COUNT(*) AS totalEmployees, 
                 SUM(CASE WHEN status = 'active' THEN 1 ELSE 0 END) AS activeEmployees 
          FROM ancillary_emp";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

echo json_encode($row);
mysqli_close($conn);
?>
