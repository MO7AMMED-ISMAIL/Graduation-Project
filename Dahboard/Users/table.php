<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Table Users</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($result as $user){
                    ?>
                        <tr>
                            <td><?=$id++?></td>
                            <td><?=$user['user_name']?></td>
                            <td><?=$user['user_email']?></td>
                            <td><?=$user['user_phone']?></td>
                            <td><?=$user['role_title']?></td>
                            <td>
                                <a class="btn action" href="Users/delete.php?user_id=<?=$user['user_id']?>">Delete</a>
                                <a class="btn action1" href="?edit=<?=$user['user_id']?>">Edit</a>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>