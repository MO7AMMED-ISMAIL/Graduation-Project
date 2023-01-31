<?php
    if(isset($_GET['add']) == 'Place'){
        $_SESSION['token'] = bin2hex(random_bytes(32));
        $_SESSION['token_expire'] = time() + 3600 ;
        if(isset($_GET['add']) == 'Place'){
            $roles_id = 1;
        }
    }else{
        header("location: ../Place.php");
    }
    
?>

<div class="row">
    <div class="col-lg-12">
        <div class="p-5">
            <div class="text-center">
                <h2 class="h4 text-gray-900 mb-4">Create New Place</h2>
            </div>

            <form action="Places/add.php" method="post" class="user" enctype="multipart/form-data">
            <div class="form-group">
                    <input type="hidden" class="form-control form-control-user" name="token" value="<?=$_SESSION['token']?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Enter User Name..." name="name">
                </div>
                <!-- <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="description" name="description">
                </div> -->
                <textarea class="form-control form-control-user" name="description"></textarea><br>
                <button class="btn btn-primary btn-user btn-block" type="submit">ADD</button>
            </form>
        </div>
    </div>
</div>
