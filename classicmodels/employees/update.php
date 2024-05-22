<?php
include '../db.php';

$employeeNumber = $_POST['employeeNumber'];
$lastName = $_POST['lastName'];
$firstName = $_POST['firstName'];
$extension = $_POST['extension'];
$email = $_POST['email'];
$officeCode = $_POST['officeCode'];
$reportsTo = $_POST['reportsTo'];
$jobTitle = $_POST['jobTitle'];

$conn = getDbConnection();
$stmt = $conn->prepare("UPDATE employees SET lastName = ?, firstName = ?, extension = ?, email = ?, officeCode = ?, reportsTo = ?, jobTitle = ? WHERE employeeNumber = ?");
$stmt->bind_param("ssssssi", $lastName, $firstName, $extension, $email, $officeCode, $reportsTo, $jobTitle, $employeeNumber);

if ($stmt->execute()) {
    header("Location: index.php");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
