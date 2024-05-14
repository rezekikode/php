<?php include 'header.php'; ?>
<?php
$db->setActiveConnection('db_sqlite');
?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Edit User</h5>
        <div class="" role="alert" id="message"></div>  
        <?php if (isset($_GET['id'])) : ?>
            <?php
            $id = $_GET['id'];
            $query = "SELECT * FROM users WHERE id = :id";
            $user = $db->fetch($query, ['id' => $id]);
            ?>
            <?php if ($user) : ?>
                <form id="form">
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            <?php else : ?>
                <div class="alert alert-danger" role="alert">
                    User not found
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<script>
    document.getElementById("form").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent default form submission
        var formData = new FormData(this);

        // Send form data to the server using AJAX
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "action-edit-user.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Display response from the server
                if (xhr.responseText === "1") {
                    alert("User updated successfully");
                    window.location.href = "users.php";                    
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