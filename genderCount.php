<?php
include 'employee_db.php'; // Ensure this connects to your database

// List of all department tables
$tables = ['admin_emp', 'ancillary_emp', 'clinic_emp', 'customer_emp', 'finance_emp', 'hr_emp', 'imaging_emp', 'laboratory_emp', 'medical_emp', 'nursing_emp', 'psychometry_emp', 'records_emp', 'registration_emp', 'sales_emp'];

$genderCounts = [
    'male' => 0,
    'female' => 0,
    'non-binary' => 0
];

foreach ($tables as $table) {
    $query = "SELECT sex, COUNT(*) AS count FROM $table GROUP BY sex";
    $result = $conn->query($query);
    
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $sex = strtolower(trim($row['sex'])); // Normalize gender values
            if (isset($genderCounts[$sex])) {
                $genderCounts[$sex] += $row['count'];
            }
        }
    }
}

echo json_encode($genderCounts);
$conn->close();
?>
