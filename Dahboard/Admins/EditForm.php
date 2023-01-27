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
                <h2 class="h4 text-gray-900 mb-4">Updte Admin</h2>
            </div>

            <form action="Admins/update.php" method="post" class="user" enctype="multipart/form-data">
            <div class="form-group">
                    <input type="hidden" class="form-control form-control-user" name="token" value="<?=$_SESSION['token']?>">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form-control-user" name="id" value="<?=$SelAdmin['id']?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Enter User Name..." name="username" value="<?=$SelAdmin['username']?>">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" value="<?=$SelAdmin['email']?>">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Password" name="role_id" value="Admin" readonly>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                    </div>
                </div>
                <button class="btn btn-primary btn-user btn-block" type="submit">Update</button>
            </form>
        </div>
    </div>
</div>
