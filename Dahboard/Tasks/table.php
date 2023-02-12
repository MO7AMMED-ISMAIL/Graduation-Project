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
                            <th>Content</th>
                            <th>From Admin</th>
                            <th>TO User</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php   
                        foreach($result as $task){
                    ?>
                        <tr>
                            <td><?=$id++?></td>
                            <td><?=$task['task_content']?></td>
                            <td><?=$task['task_from']?></td>
                            <td><?=$task['task_to']?></td>
                            <td>
                                <?php
                                    if($task['task_from'] == $_SESSION['Admin_email']){
                                ?>
                                <a class="btn action" href="Tasks/delete.php?mes_id=<?=$task['task_id']?>">Delete</a>
                                <a class="btn action1" href="Task.php?edit=<?=$task['task_id']?>">Edit</a>
                            </td>
                            <?php }else{?>
                            <a class="btn action1" href="?view=mes" data-toggle="modal" data-target="#logoutModal">View</a>
                            <?php } ?>
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