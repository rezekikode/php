<?php
$employeeNumber = $_GET['employeeNumber'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Employee</title>
</head>
<body>
    <h1>Delete Employee</h1>
    <p>Are you sure you want to delete <?php echo $employeeNumber; ?>?</p>
    <form action="delete_action.php" method="POST">
        <input type="hidden" name="employeeNumber" value="<?php echo $employeeNumber; ?>">
        <button type="submit">Yes, Delete</button>
        <a href="index.php">No, Cancel</a>
    </form>
</body>
</html>
