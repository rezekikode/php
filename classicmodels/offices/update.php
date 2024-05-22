<?php
include '../db.php';

$officeCode = $_POST['officeCode'];
$city = $_POST['city'];
$phone = $_POST['phone'];
$addressLine1 = $_POST['addressLine1'];
$addressLine2 = $_POST['addressLine2'];
$state = $_POST['state'];
$country = $_POST['country'];
$postalCode = $_POST['postalCode'];
$territory = $_POST['territory'];

$conn = getDbConnection();
$stmt = $conn->prepare("UPDATE offices SET city = ?, phone = ?, addressLine1 = ?, addressLine2 = ?, state = ?, country = ?, postalCode = ?, territory = ? WHERE officeCode = ?");
$stmt->bind_param("sssssssss", $city, $phone, $addressLine1, $addressLine2, $state, $country, $postalCode, $territory, $officeCode);

if ($stmt->execute()) {
    header("Location: index.php");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
