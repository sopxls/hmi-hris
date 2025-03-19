<?php
include 'employee_db.php'; // Ensure this connects to your database

header('Content-Type: application/json');

// List of department tables
$tables = [
    'admin_emp', 'ancillary_emp', 'clinic_emp', 'customer_emp', 
    'finance_emp', 'hr_emp', 'imaging_emp', 'laboratory_emp', 
    'medical_emp', 'nursing_emp', 'psychometry_emp', 'records_emp', 
    'registration_emp', 'sales_emp'
];

$totalCount = 0;

foreach ($tables as $table) {
    $query = "SELECT COUNT(*) AS count FROM $table WHERE status = 'active'";
    $result = $conn->query($query);
    
    if ($result) {
        $row = $result->fetch_assoc();
        $totalCount += $row['count'];
    } else {
        echo json_encode(['error' => "Failed to fetch from $table: " . $conn->error]);
        exit;
    }
}

echo json_encode(['total_active' => $totalCount]);

$conn->close();
?>
