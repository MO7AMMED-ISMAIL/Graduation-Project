<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Table Admins</h6>
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
                        foreach($result as $admin){
                    ?>
                        <tr>
                            <td><?=$id++?></td>
                            <td><?=$admin['user_name']?></td>
                            <td><?=$admin['user_email']?></td>
                            <td><?=$admin['user_phone']?></td>
                            <td><?=$admin['user_role']== '0'? 'admin': ''?></td>
                            <td>
                                <a class="btn action" href="Admins/delete.php?admin_id=<?=$admin['user_id']?>">Delete</a>
                                <a class="btn action1" href="?edit=<?=$admin['user_id']?>">Edit</a>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
</body>

</html>