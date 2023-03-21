<div class="container-fluid">
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
                        foreach($result as $mes){
                    ?>
                        <tr>
                            <td><?=$id++?></td>
                            <td><?=$mes['mes_content']?></td>
                            <td><?=$mes['mes_from']?></td>
                            <td><?=$mes['mes_to']?></td>
                            <td>
                                <?php
                                    if($mes['mes_from'] == $_SESSION['Admin_email']){
                                ?>
                                <a class="btn action" href="Messages/delete.php?mes_id=<?=$mes['mes_id']?>">Delete</a>
                                <a class="btn action1" href="Message.php?edit=<?=$mes['mes_id']?>">Edit</a>
                                <a class="btn action1"data-toggle="modal" data-target="#exampleModalToggle">View</a>
                            </td>
                            <?php }else{?>
                                <a class="btn action1" data-toggle="modal" data-target="#exampleModalToggle">View</a>
                            <?php } ?>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">View</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Admin Sender</label>
                        <input type="text" class="form-control form-control-user" readonly value="<?=$mes['user_name']?>">
                        <label>Data</label>
                        <input type="text" class="form-control form-control-user" readonly value="<?=$mes['mes_date']?>">
                    </div>
                </div>
                <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-dismiss="modal" aria-label="Close">Close</button>
                </div>
            </div>
        </div>
</div>
</body>
</html>