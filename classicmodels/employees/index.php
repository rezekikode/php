<?php
include '../db.php';
$conn = getDbConnection();
$result = $conn->query("SELECT * FROM employees");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employees</title>
</head>
<body>
    <h1>Employees</h1>
    <a href="create.php">Create New Employee</a>
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li><?php echo $row['firstName'] . " " . $row['lastName']; ?> - <a href="show.php?employeeNumber=<?php echo $row['employeeNumber']; ?>">View</a> | <a href="edit.php?employeeNumber=<?php echo $row['employeeNumber']; ?>">Edit</a> | <a href="delete.php?employeeNumber=<?php echo $row['employeeNumber']; ?>">Delete</a></li>
        <?php endwhile; ?>
    </ul>
</body>
</html>

<?php $conn->close(); ?>
