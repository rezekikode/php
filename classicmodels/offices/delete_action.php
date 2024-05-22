<?php
include '../db.php';

$officeCode = $_POST['officeCode'];

$conn = getDbConnection();
$stmt = $conn->prepare("DELETE FROM offices WHERE officeCode = ?");
$stmt->bind_param("s", $officeCode);

if ($stmt->execute()) {
    header("Location: index.php");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
