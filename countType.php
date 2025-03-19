<?php
include 'employee_db.php'; // Ensure this connects to your database

// List of all department tables
$tables = ['admin_emp', 'ancillary_emp', 'clinic_emp', 'customer_emp', 'finance_emp', 'hr_emp', 'imaging_emp', 'laboratory_emp', 'medical_emp', 'nursing_emp', 'psychometry_emp', 'records_emp', 'registration_emp', 'sales_emp'];

// Update typeCounts to match the new employment types
$typeCounts = [
    'probationary' => 0,
    'regular'      => 0,
    'fixed'        => 0,
    'on call'      => 0,
    'consultant'   => 0,
    'ojt'          => 0
];

foreach ($tables as $table) {
    $query = "SELECT type, COUNT(*) AS count FROM $table GROUP BY type";
    $result = $conn->query($query);
    
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $type = strtolower(trim($row['type'])); // Normalize type

            // Standardize type names:
            // Convert "oncall" to "on call"
            if ($type === 'oncall') {
                $type = 'on call';
            }
            // (If needed, add further standardization for any variations)

            if (isset($typeCounts[$type])) {
                $typeCounts[$type] += $row['count'];
            }
        }
    }
}

echo json_encode($typeCounts);
$conn->close();
?>
