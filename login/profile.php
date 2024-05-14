<?php include 'header.php'; ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Profile</h5>
        <div class="" role="alert" id="message"></div>
        <form id="profileForm">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Old Password</label>
                <input type="password" name="old_password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword2" class="form-label">New Password</label>
                <input type="password" name="new_password" class="form-control" id="exampleInputPassword2">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
<script>
    document.getElementById("profileForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent default form submission
        var formData = new FormData(this);

        // Send form data to the server using AJAX
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "action-profile.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Display response from the server
                if (xhr.responseText === "1") {
                    document.getElementById("message").innerHTML = "Profile updated successfully.";
                    document.getElementById("message").setAttribute("class", "alert alert-success");
                    document.getElementById("exampleInputPassword1").value = "";
                    document.getElementById("exampleInputPassword2").value = "";
                } else {
                    document.getElementById("message").innerHTML = xhr.responseText;
                    document.getElementById("message").setAttribute("class", "alert alert-danger");
                }
            }
        };
        xhr.send(formData);
    });
</script>
<?php include 'footer.php'; ?>