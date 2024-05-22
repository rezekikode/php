<?php
$officeCode = $_GET['officeCode'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Office</title>
</head>
<body>
    <h1>Delete Office</h1>
    <p>Are you sure you want to delete <?php echo $officeCode; ?>?</p>
    <form action="delete_action.php" method="POST">
        <input type="hidden" name="officeCode" value="<?php echo $officeCode; ?>">
        <button type="submit">Yes, Delete</button>
        <a href="index.php">No, Cancel</a>
    </form>
</body>
</html>
