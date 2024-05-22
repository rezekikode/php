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
    <title>Edit Office</title>
</head>
<body>
    <h1>Edit Office</h1>
    <form action="update.php" method="POST">
        <input type="hidden" name="officeCode" value="<?php echo $office['officeCode']; ?>">
        <label for="city">City:</label>
        <input type="text" id="city" name="city" value="<?php echo $office['city']; ?>" required>
        <br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="<?php echo $office['phone']; ?>" required>
        <br>
        <label for="addressLine1">Address Line 1:</label>
        <input type="text" id="addressLine1" name="addressLine1" value="<?php echo $office['addressLine1']; ?>" required>
        <br>
        <label for="addressLine2">Address Line 2:</label>
        <input type="text" id="addressLine2" name="addressLine2" value="<?php echo $office['addressLine2']; ?>">
        <br>
        <label for="state">State:</label>
        <input type="text" id="state" name="state" value="<?php echo $office['state']; ?>">
        <br>
        <label for="country">Country:</label>
        <input type="text" id="country" name="country" value="<?php echo $office['country']; ?>" required>
        <br>
        <label for="postalCode">Postal Code:</label>
        <input type="text" id="postalCode" name="postalCode" value="<?php echo $office['postalCode']; ?>" required>
        <br>
        <label for="territory">Territory:</label>
        <input type="text" id="territory" name="territory" value="<?php echo $office['territory']; ?>" required>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>

<?php $conn->close(); ?>
