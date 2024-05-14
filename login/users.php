<?php include 'header.php'; ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Users</h5>  
        <a href="add-user.php" class="btn btn-primary btn-sm">Add User</a>   
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>admin</td>
                        <td>
                            <a href="edit-user.php?id=1" class="btn btn-primary btn-sm">Edit</a>
                            <a href="delete-user.php?id=1" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>user</td>
                        <td>
                            <a href="edit-user.php?id=2" class="btn btn-primary btn-sm">Edit</a>
                            <a href="delete-user.php?id=2" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>   
    </div>
</div>
<?php include 'footer.php'; ?>