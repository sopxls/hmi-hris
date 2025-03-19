<?php
include 'employee_db.php'; // Ensure this connects to your database

// Query to count all employees from all department tables
$tables = ['admin_emp', 'ancillary_emp', 'clinic_emp', 'customer_emp', 'finance_emp', 'hr_emp', 'imaging_emp', 'laboratory_emp', 'medical_emp', 'nursing_emp', 'psychometry_emp', 'records_emp', 'registration_emp', 'sales_emp'];
$totalCount = 0;

foreach ($tables as $table) {
    $query = "SELECT COUNT(*) AS count FROM $table";
    $result = $conn->query($query);
    if ($result) {
        $row = $result->fetch_assoc();
        $totalCount += $row['count'];
    }
}

echo json_encode(['total' => $totalCount]);

$conn->close();
?>
