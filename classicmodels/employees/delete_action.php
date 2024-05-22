<?php
include '../db.php';

$employeeNumber = $_POST['employeeNumber'];

$conn = getDbConnection();
$stmt = $conn->prepare("DELETE FROM employees WHERE employeeNumber = ?");
$stmt->bind_param("i", $employeeNumber);

if ($stmt->execute()) {
    header("Location: index.php");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
