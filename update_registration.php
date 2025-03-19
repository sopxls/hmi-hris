<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');
include 'employee_db.php'; // Ensure database connection

// Set the correct timezone
date_default_timezone_set('Asia/Manila'); // Change to your actual timezone

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if empID exists
    if (!isset($_POST["empID"])) {
        echo json_encode(["error" => "empID is missing from POST data"]);
        exit;
    }

    $empID = mysqli_real_escape_string($conn, $_POST["empID"]);

    // Fetch existing employee data before updating
    $existingQuery = "SELECT * FROM registration_emp WHERE empID = '$empID'";
    $existingResult = mysqli_query($conn, $existingQuery);

    if (!$existingResult) {
        echo json_encode(["error" => "Failed to fetch employee data: " . mysqli_error($conn)]);
        exit;
    }
    $existingRow = mysqli_fetch_assoc($existingResult);

    if (!$existingRow && isset($_POST['update'])) { 
        // Only show error when updating, not inserting a new employee
        echo json_encode(["error" => "Employee with ID $empID not found. Cannot update."]);
        exit;
    }

    // Get the current timestamp with the correct timezone
    $timestamp = date('Y-m-d H:i:s');

    // Define function to safely append new entries
    function appendEntries($conn, $field, $existingData, $newData, $timestamp = null) {
        $existingEntries = !empty($existingData) ? explode(", ", $existingData) : [];
        
        if (isset($_POST[$field]) && is_array($_POST[$field]) && !empty($_POST[$field])) {
            foreach ($_POST[$field] as $entry) {
                $sanitizedEntry = mysqli_real_escape_string($conn, $entry);
                
                // Only append "Date Added" if timestamp is not empty
                if (!empty($timestamp)) {
                    $sanitizedEntry .= "<br><br><b>Date Added: " . $timestamp . "</b></br>";
                }
                
                $existingEntries[] = $sanitizedEntry;
            }
        }
    
        return implode(", ", $existingEntries);
    }
    

    // Update company history fields - add timestamps directly to entries
    $companyName = appendEntries($conn, "companyName", $existingRow['companyName'], $_POST["companyName"] ?? []);
    $employmentPositions = appendEntries($conn, "employmentPositions", $existingRow['employmentPositions'], $_POST["employmentPositions"] ?? []);
    $lengthExp = appendEntries($conn, "lengthExp", $existingRow['lengthExp'], $_POST["lengthExp"] ?? [], $timestamp);

    // Update employee movement fields - add timestamps directly to entries
    $movementType = appendEntries($conn, "movementType", $existingRow['movementType'], $_POST["movementType"] ?? []);
    $effectiveDate = appendEntries($conn, "effectiveDate", $existingRow['effectiveDate'], $_POST["effectiveDate"] ?? []);
    $percentageMere = appendEntries($conn, "percentageMere", $existingRow['percentageMere'], $_POST["percentageMere"] ?? []);
    $positionFrom = appendEntries($conn, "positionFrom", $existingRow['positionFrom'], $_POST["positionFrom"] ?? []);
    $positionTo = appendEntries($conn, "positionTo", $existingRow['positionTo'], $_POST["positionTo"] ?? []);
    $statusFrom = appendEntries($conn, "statusFrom", $existingRow['statusFrom'], $_POST["statusFrom"] ?? []);
    $statusTo = appendEntries($conn, "statusTo", $existingRow['statusTo'], $_POST["statusTo"] ?? []);
    $deptFrom = appendEntries($conn, "deptFrom", $existingRow['deptFrom'], $_POST["deptFrom"] ?? []);
    $deptTo = appendEntries($conn, "deptTo", $existingRow['deptTo'], $_POST["deptTo"] ?? []);
    $joblevelFrom = appendEntries($conn, "joblevelFrom", $existingRow['joblevelFrom'], $_POST["joblevelFrom"] ?? []);
    $joblevelTo = appendEntries($conn, "joblevelTo", $existingRow['joblevelTo'], $_POST["joblevelTo"] ?? []);
    $grosspayFrom = appendEntries($conn, "grosspayFrom", $existingRow['grosspayFrom'], $_POST["grosspayFrom"] ?? []);
    $grosspayTo = appendEntries($conn, "grosspayTo", $existingRow['grosspayTo'], $_POST["grosspayTo"] ?? [], $timestamp);

    // Update query
    $query = "UPDATE registration_emp SET 
    companyName = '$companyName',
    employmentPositions = '$employmentPositions',
    lengthExp = '$lengthExp',
    movementType = '$movementType',
    effectiveDate = '$effectiveDate',
    percentageMere = '$percentageMere',
    positionFrom = '$positionFrom',
    positionTo = '$positionTo',
    statusFrom = '$statusFrom',
    statusTo = '$statusTo',
    deptFrom = '$deptFrom',
    deptTo = '$deptTo',
    joblevelFrom = '$joblevelFrom',
    joblevelTo = '$joblevelTo',
    grosspayFrom = '$grosspayFrom',
    grosspayTo = '$grosspayTo'
WHERE empID = '$empID'";


    if (mysqli_query($conn, $query)) {
        echo json_encode(["success" => "Employee updated successfully"]);
    } else {
        echo json_encode(["error" => "Failed to update: " . mysqli_error($conn)]);
    }

    mysqli_close($conn);
}
?>
