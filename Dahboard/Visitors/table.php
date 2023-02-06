<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Table Visitor</h6>
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
                            <th>image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php   
                        foreach($result as $visitor){
                    ?>
                        <tr>
                            <td><?=$id++?></td>
                            <td><?=$visitor['user_name']?></td>
                            <td><?=$visitor['user_email']?></td>
                            <td><?=$visitor['user_phone']?></td>
                            <td><?= 'Visitor'?></td>
                           
                           <td><?php

                            $user_email=$visitor['user_email'];
                            
                            $cond = "email_user".'='."'$user_email'";

                            $selectImages = $images->FindAll($cond);

                        
                            foreach($selectImages as $img){

                              ?>

                              <img src='uploads/<?= $img['image_path'] ?>' style="width:50px ; height: 50px;">
                              <?php
                            }
                            ?>
                        </td>
                            <td>
                                <a class="btn action" href="Visitors/delete.php?visitor_id=<?=$visitor['user_id']?>">Delete</a>
                                <a class="btn action1" href="?edit=<?=$visitor['user_id']?>">Edit</a>
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