<?php
    if(isset($_GET['add']) == 'Admin'){
        $_SESSION['token'] = bin2hex(random_bytes(32));
        $_SESSION['token_expire'] = time() + 3600 ;
        if(isset($_GET['add']) == 'Admin'){
            $roles_id = 1;
        }
    }else{
        header("location: ../Admin.php");
    }
    
?>

<div class="row">
    <div class="col-lg-12">
        <div class="p-5">
            <div class="text-center">
                <h2 class="h4 text-gray-900 mb-4">Create New Admin</h2>
            </div>

            <form action="Admins/add.php" method="post" class="user" enctype="multipart/form-data">
            <div class="form-group">
                    <input type="hidden" class="form-control form-control-user" name="token" value="<?=$_SESSION['token']?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Enter User Name..." name="username">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" placeholder="Enter Password..." name="password">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Enter Phone..." name="phone">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Password" name="role_id" value="<?= $roles_id == 1? 'Admin':''?>" readonly>
                </div>
                <button class="btn btn-primary btn-user btn-block" type="submit">ADD</button>
            </form>
        </div>
    </div>
</div>
