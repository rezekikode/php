<?php
include '../db.php';
$officeCode = $_GET['officeCode'];

$conn = getDbConnection();
$stmt = $conn->prepare("SELECT * FROM offices WHERE officeCode = ?");
$stmt->bind_param("s", $officeCode);
$stmt->execute();
$result = $stmt->get_result();
$office = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Office</title>
</head>
<body>
    <h1><?php echo $office['officeCode']; ?></h1>
    <p>City: <?php echo $office['city']; ?></p>
    <p>Phone: <?php echo $office['phone']; ?></p>
    <p>Address Line 1: <?php echo $office['addressLine1']; ?></p>
    <p>Address Line 2: <?php echo $office['addressLine2']; ?></p>
    <p>State: <?php echo $office['state']; ?></p>
    <p>Country: <?php echo $office['country']; ?></p>
    <p>Postal Code: <?php echo $office['postalCode']; ?></p>
    <p>Territory: <?php echo $office['territory']; ?></p>
    <a href="index.php">Back to List</a>
</body>
</html>

<?php $conn->close(); ?>
