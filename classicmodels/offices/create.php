<!DOCTYPE html>
<html>
<head>
    <title>Create Office</title>
</head>
<body>
    <h1>Create Office</h1>
    <form action="store.php" method="POST">
        <label for="officeCode">Office Code:</label>
        <input type="text" id="officeCode" name="officeCode" required>
        <br>
        <label for="city">City:</label>
        <input type="text" id="city" name="city" required>
        <br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required>
        <br>
        <label for="addressLine1">Address Line 1:</label>
        <input type="text" id="addressLine1" name="addressLine1" required>
        <br>
        <label for="addressLine2">Address Line 2:</label>
        <input type="text" id="addressLine2" name="addressLine2">
        <br>
        <label for="state">State:</label>
        <input type="text" id="state" name="state">
        <br>
        <label for="country">Country:</label>
        <input type="text" id="country" name="country" required>
        <br>
        <label for="postalCode">Postal Code:</label>
        <input type="text" id="postalCode" name="postalCode" required>
        <br>
        <label for="territory">Territory:</label>
        <input type="text" id="territory" name="territory" required>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
