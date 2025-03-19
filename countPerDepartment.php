<?php
include 'employee_db.php'; // Ensure this connects to your database

header('Content-Type: application/json');

// List of department tables in the database
$tables = [
    "admin_emp", "ancillary_emp", "clinic_emp", "customer_emp",
    "finance_emp", "hr_emp", "imaging_emp", "laboratory_emp",
    "medical_emp", "nursing_emp", "psychometry_emp",
    "records_emp", "registration_emp", "sales_emp"
];

$departmentCounts = [];
foreach ($tables as $table) {
    $query = "SELECT COUNT(*) AS count FROM $table";
    $result = $conn->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        $departmentCounts[$table] = $row['count'];
    } else {
        $departmentCounts[$table] = 0; // If query fails, default to 0
    }
}

echo json_encode($departmentCounts);

$conn->close();
?>
