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
    <title>Edit Employee</title>
</head>
<body>
    <h1>Edit Employee</h1>
    <form action="update.php" method="POST">
        <input type="hidden" name="employeeNumber" value="<?php echo $employee['employeeNumber']; ?>">
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" value="<?php echo $employee['lastName']; ?>" required>
        <br>
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" value="<?php echo $employee['firstName']; ?>" required>
        <br>
        <label for="extension">Extension:</label>
        <input type="text" id="extension" name="extension" value="<?php echo $employee['extension']; ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $employee['email']; ?>" required>
        <br>
        <label for="officeCode">Office Code:</label>
        <input type="text" id="officeCode" name="officeCode" value="<?php echo $employee['officeCode']; ?>" required>
        <br>
        <label for="reportsTo">Reports To:</label>
        <input type="text" id="reportsTo" name="reportsTo" value="<?php echo $employee['reportsTo']; ?>">
        <br>
        <label for="jobTitle">Job Title:</label>
        <input type="text" id="jobTitle" name="jobTitle" value="<?php echo $employee['jobTitle']; ?>" required>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>

<?php $conn->close(); ?>
