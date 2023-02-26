<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Table Posts</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>User</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php   
                        foreach($result as $post){
                    ?>
                        <tr>
                            <td><?=$id++?></td>
                            <td><?=$post['post_title']?></td>
                            <td><?=$post['post_content']?></td>
                            <td><?=$post['user_name']?></td>
                            <td>
                                <?php
                                    if($post['users_id'] == $_SESSION['Admin_id']){
                                ?>
                                <a class="btn action" href="Posts/delete.php?post_id=<?=$post['post_id']?>">Delete</a>
                                <a class="btn action1" href="?edit=<?=$post['post_id']?>">Edit</a>
                            </td>
                            <?php }else{?>
                            <a class="btn action1" href="?view=post">View</a>
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