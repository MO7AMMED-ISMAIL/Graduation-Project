<?php
    session_start();
    $_SESSION['token'] = bin2hex(random_bytes(32));
    $_SESSION['token_expire'] = time() + 3600;
    if(isset($_SESSION['Admin_id'])){
        header("location: ../index.php");
        exit();
    }
?>

<head>
    <title>ASPS Login</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/mystyle.css" />
    <!--  font awesome -->
    <link rel="stylesheet" href="../css/all.min.css" />
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block"><img src="../img/logo.jpg" width="420" height="600" /></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Code Verification</h1>
                                    </div>
                                    <p>We have send a verification code in your email . 
                                    Please , Enter this code here</p>
                                    
                                    <!--form -->
                                    <form class="user" method="post" action="CodeVerification.php">
                                        
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="code" required placeholder="Enter Verification Code ..." id="text" require>
                                        </div>
                                    
                                        
                                        <button class="btn btn-primary btn-user btn-block" type="submit">
                                            Verify
                                        </button>
                                        <hr>
                                    </form>
                                    <!-- End form -->
                                    <div class="text-center">
                                        <a class="small" href="LoginForm.php">Already have an account? Login!</a>
                                    </div>
                                    
                                   
                                    <div class="text-center">
                                        <a class="small" href="registerForm.php">Create a new account!</a>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
