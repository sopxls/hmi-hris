
<?php
header('Content-Type: application/json'); // Ensures JSON response
include 'employee_db.php'; // Ensure this path is correct

$query = "SELECT * FROM admin_emp"; // Replace with your actual table name
$result = mysqli_query($conn, $query);

$admin_emp = [];
while ($row = mysqli_fetch_assoc($result)) {
    // Convert employment history CSV fields into arrays
    $row['companyName'] = !empty($row['companyName']) ? explode(", ", $row['companyName']) : [];
    $row['employmentPositions'] = !empty($row['employmentPositions']) ? explode(", ", $row['employmentPositions']) : [];
    $row['lengthExp'] = !empty($row['lengthExp']) ? explode(", ", $row['lengthExp']) : [];


    // Convert employee movement CSV fields into arrays
    $row['movementType'] = !empty($row['movementType']) ? explode(", ", $row['movementType']) : [];
    $row['effectiveDate'] = !empty($row['effectiveDate']) ? explode(", ", $row['effectiveDate']) : [];
    $row['percentageMere'] = !empty($row['percentageMere']) ? explode(", ", $row['percentageMere']) : [];
    $row['positionFrom'] = !empty($row['positionFrom']) ? explode(", ", $row['positionFrom']) : [];
    $row['positionTo'] = !empty($row['positionTo']) ? explode(", ", $row['positionTo']) : [];
    $row['statusFrom'] = !empty($row['statusFrom']) ? explode(", ", $row['statusFrom']) : [];
    $row['statusTo'] = !empty($row['statusTo']) ? explode(", ", $row['statusTo']) : [];
    $row['deptFrom'] = !empty($row['deptFrom']) ? explode(", ", $row['deptFrom']) : [];
    $row['deptTo'] = !empty($row['deptTo']) ? explode(", ", $row['deptTo']) : [];
    $row['joblevelFrom'] = !empty($row['joblevelFrom']) ? explode(", ", $row['joblevelFrom']) : [];
    $row['joblevelTo'] = !empty($row['joblevelTo']) ? explode(", ", $row['joblevelTo']) : [];
    $row['grosspayFrom'] = !empty($row['grosspayFrom']) ? explode(", ", $row['grosspayFrom']) : [];
    $row['grosspayTo'] = !empty($row['grosspayTo']) ? explode(", ", $row['grosspayTo']) : [];

    $admin_emp[] = $row;
}

echo json_encode($admin_emp); // Send JSON response
?>
