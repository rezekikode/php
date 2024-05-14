<?php include 'header.php'; ?>
<?php
$db->setActiveConnection('db_sqlite');
?>
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
                    <?php
                    $query = "SELECT * FROM users";
                    $users = $db->fetchAll($query);
                    ?>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <th scope="row"><?= $user['id'] ?></th>
                            <td><?= $user['email'] ?></td>
                            <td>
                                <a href="edit-user.php?id=<?= $user['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="delete-user.php?id=<?= $user['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>                    
                </tbody>
            </table>   
    </div>
</div>
<?php include 'footer.php'; ?>