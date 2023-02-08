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
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <!--form -->
                                    <form class="user" method="post" action="login.php">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control form-control-user" value="<?=$_SESSION['token']?>" name="token" id="token">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email" required placeholder="Enter Email Address..." id="email" require>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password"  placeholder="Enter Password..." required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit" >
                                            Login
                                        </button>
                                        <hr>
                                    </form>
                                    <!-- End form -->
                                    <div class="text-center">
                                        <a class="small" href="ForgetPassword.php">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="registerForm.php">Create a new account!</a>
                                    </div>
                                    <hr>
                                    
                                    <?php
                                        if(isset($_SESSION['err'])){
                                            echo "<div class='alert alert-danger'>".$_SESSION['err']."</div>";
                                            unset($_SESSION['err']);
                                        }
                                    ?>
                                    <div class='alert alert-danger' role='alert' id="error"></div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let email = document.getElementById('email');
        let divError = document.getElementById('error');
        divError.style.display = 'none';
        
        function valid(){
            let valid = true;
            let mailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            let arrError = [];
            //Matching
            let validemail = email.value.match(mailRegex);
            //validation
            if(validemail == null ){
                arrError.push(`<p>is not valid Email</p>`);
                valid= false;
            }
            //print error;
            if(arrError.length > 0){
                divError.innerHTML = arrError.join(" ");
                arrError.length = 0;
                divError.style.display = 'block';
            }
            if(valid === false){
                event.preventDefault();
            }
        }
    </script>
</body>
