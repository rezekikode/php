<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form id="loginForm">
        <h2>Login</h2>
        <div>
            <input type="text" name="username" placeholder="Username">
        </div>
        <div>
            <input type="password" name="password" placeholder="Password">
        </div>
        <br>
        <div>
            <input type="submit" value="Login">
        </div>
    </form>

    <div id="message"></div>

    <script>
        document.getElementById("loginForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent default form submission
            var formData = new FormData(this);

            // Send form data to the server using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "login/login.php", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Display response from the server
                    document.getElementById("message").innerHTML = xhr.responseText;
                }
            };
            xhr.send(formData);
        });
    </script>
</body>

</html>