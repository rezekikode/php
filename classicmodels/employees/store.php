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
$stmt = $conn->prepare("INSERT INTO employees (employeeNumber, lastName, firstName, extension, email, officeCode, reportsTo, jobTitle) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isssssis", $employeeNumber, $lastName, $firstName, $extension, $email, $officeCode, $reportsTo, $jobTitle);

if ($stmt->execute()) {
    header("Location: index.php");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
