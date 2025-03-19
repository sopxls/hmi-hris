<?php
header('Content-Type: application/json');
include 'employee_db.php'; // Ensure this points to your database connection

$data = json_decode(file_get_contents("php://input"), true);
$empID = $data['empID'] ?? '';

if (!$empID) {
    echo json_encode(["success" => false, "message" => "No Employee ID provided"]);
    exit;
}

// Delete employee from database
$query = "DELETE FROM imaging_emp WHERE empID = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $empID);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Employee deleted successfully"]);
} else {
    echo json_encode(["success" => false, "message" => "Failed to delete employee"]);
}

$stmt->close();
$conn->close();
?>
