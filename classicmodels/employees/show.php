<?php
include '../db.php';
$employeeNumber = $_GET['employeeNumber'];

$conn = getDbConnection();
$stmt = $conn->prepare("SELECT * FROM employees WHERE employeeNumber = ?");
$stmt->bind_param("i", $employeeNumber);
$stmt->execute();
$result = $stmt->get_result();
$employee = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Employee</title>
</head>
<body>
    <h1><?php echo $employee['firstName'] . " " . $employee['lastName']; ?></h1>
    <p>Extension: <?php echo $employee['extension']; ?></p>
    <p>Email: <?php echo $employee['email']; ?></p>
    <p>Office Code: <?php echo $employee['officeCode']; ?></p>
    <p>Reports To: <?php echo $employee['reportsTo']; ?></p>
    <p>Job Title: <?php echo $employee['jobTitle']; ?></p>
    <a href="index.php">Back to List</a>
</body>
</html>

<?php $conn->close(); ?>
