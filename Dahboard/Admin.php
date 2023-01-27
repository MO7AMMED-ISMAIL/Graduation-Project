<?php
    session_start();
    $current = 'Admin';
    include "include/sidebar.php";
    include "include/navbar.php";
    include "database/DBClass.php";
    use DbClass\Table;
    $admins = new Table('admins');
    $admins = $admins->InnerJoin('roles','role_id','title','admin');
    if(isset($_GET['add']) == 'Admin'){
        include "Admins/AddForm.php";
    }elseif(isset($_GET['edit'])){
        $UpdateAdmin = new Table('admins');
        $AdminId = $_GET['edit'];
        $SelAdmin = $UpdateAdmin->FindById('id',$AdminId);
        include "Admins/EditForm.php";
    }
    $id = 0;
?>
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
                            <th>role_id</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($admins as $admin){
                    ?>
                        <tr>
                            <td><?=$id++?></td>
                            <td><?=$admin['username']?></td>
                            <td><?=$admin['email']?></td>
                            <td><?=$admin['title']?></td>
                            <td>
                                <a class="btn action" href="Admins/delete.php?id=<?=$admin['id']?>">Delete</a>
                                <a class="btn action1" href="?edit=<?=$admin['id']?>">Edit</a>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>




<?php
        include "include/footer.php";
    ?>