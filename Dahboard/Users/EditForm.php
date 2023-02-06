<?php
    if(isset($_GET['edit'])){
        $_SESSION['token'] = bin2hex(random_bytes(32));
        $_SESSION['token_expire'] = time() + 3600 ;
    }else{
        exit();
    }
?>


<div class="row">
    <div class="col-lg-12">
        <div class="p-5">
            <div class="text-center">
                <h2 class="h4 text-gray-900 mb-4">Update User</h2>
            </div>

            <form action="Users/update.php" method="post" class="user" enctype="multipart/form-data">
            <div class="form-group">
                    <input type="hidden" class="form-control form-control-user" name="token" value="<?=$_SESSION['token']?>">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form-control-user" name="id" value="<?=$UserId?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Enter User Name..." name="username" value="<?=$SelUser['user_name']?>" id="username">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control form-control-user"  aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" value="<?=$SelUser['user_email']?>" id="email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" placeholder="Enter Password..." name="password" id="password">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Enter Phone..." name="phone" value="<?=$SelUser['user_phone']?>" id="phone">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Password" name="roles_id" value="User" readonly>
                </div>
                <button class="btn btn-primary btn-user btn-block" type="submit" onclick="valid();">Update</button>
            </form>
            <hr>
            <div class='alert alert-danger' role='alert' id="error"></div>
        </div>
    </div>
</div>
