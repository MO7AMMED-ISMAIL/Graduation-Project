<?php
    session_start();
    $_SESSION['token'] = bin2hex(random_bytes(32));
    $_SESSION['token_expire'] = time() + 3600;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>ASPS Forgot Password</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block "><img src="../img/logo.jpg" width="500" height="500"/></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <?php
                                        if(isset($_SESSION['err'])){
                                            echo "<div class='alert alert-danger'>".$_SESSION['err']."</div>";
                                            unset($_SESSION['err']);
                                        }
                                    ?>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                        <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                            and we'll send you a link to reset your password!</p>
                                    </div>
                                    <form class="user" action="SendMail.php" method="post">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"  placeholder="Enter Email Email..." required name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="token" value="<?=$_SESSION['token']?>">
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="sumbit">
                                            Reset Password
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="LoginForm.php">Already have an account? Login!</a>
                                    </div>

                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>