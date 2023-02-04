<?php
    if(isset($_GET['edit'])){
        $_SESSION['token'] = bin2hex(random_bytes(32));
        $_SESSION['token_expire'] = time() + 3600 ;
    }else{
        header("location: Visitor.php");
        exit();
    }
?>


<div class="row">
    <div class="col-lg-12">
        <div class="p-5">
            <div class="text-center">
                <h2 class="h4 text-gray-900 mb-4">Update Admin</h2>
            </div>
            <form action="Visitors/update.php" method="post" class="user" enctype="multipart/form-data">
            <div class="form-group">
                    <input type="hidden" class="form-control form-control-user" name="token" value="<?=$_SESSION['token']?>">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form-control-user" name="id" value="<?=$VisitorId?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Enter User Name..." name="username" value="<?=$SelVisitor['user_name']?>" id="username">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control form-control-user" placeholder="Enter Email Address..." name="email" value="<?=$SelVisitor['user_email']?>" id="email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" placeholder="Enter Password..." name="password" id="password">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Enter Phone..." name="phone" value="<?=$SelVisitor['user_phone']?>" id="name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Password" name="role" value="<?=$SelVisitor['user_role']=='2'?'Visitor':''?>" readonly>
                </div>
                <button class="btn btn-primary btn-user btn-block" type="submit" onclick="valid();">Update</button>
            </form>
            <hr>
            <div class='alert alert-danger' role='alert' id="error"></div>
        </div>
    </div>
</div>
