<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Table Messages</h6>
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
                            </td>
                            <?php }else{?>
                            <a class="btn action1" href="?view=mes">View</a>
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