<?php
include '../db.php';
$conn = getDbConnection();
$result = $conn->query("SELECT * FROM offices");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Offices</title>
</head>
<body>
    <h1>Offices</h1>
    <a href="create.php">Create New Office</a>
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li><?php echo $row['officeCode']; ?> - <a href="show.php?officeCode=<?php echo $row['officeCode']; ?>">View</a> | <a href="edit.php?officeCode=<?php echo $row['officeCode']; ?>">Edit</a> | <a href="delete.php?officeCode=<?php echo $row['officeCode']; ?>">Delete</a></li>
        <?php endwhile; ?>
    </ul>
</body>
</html>

<?php $conn->close(); ?>
