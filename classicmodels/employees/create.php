<!DOCTYPE html>
<html>
<head>
    <title>Create Employee</title>
</head>
<body>
    <h1>Create Employee</h1>
    <form action="store.php" method="POST">
        <label for="employeeNumber">Employee Number:</label>
        <input type="text" id="employeeNumber" name="employeeNumber" required>
        <br>
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required>
        <br>
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required>
        <br>
        <label for="extension">Extension:</label>
        <input type="text" id="extension" name="extension" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="officeCode">Office Code:</label>
        <input type="text" id="officeCode" name="officeCode" required>
        <br>
        <label for="reportsTo">Reports To:</label>
        <input type="text" id="reportsTo" name="reportsTo">
        <br>
        <label for="jobTitle">Job Title:</label>
        <input type="text" id="jobTitle" name="jobTitle" required>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
