<?php
include "../database/DBClass.php";
use DbClass\Table;
session_start();

$admin = new Table('users');  
//validation
try{
    $id = $_SESSION['id_admin'];

    $password = $admin->inputData($_POST['password']);
    $repeatPassword = $admin->inputData($_POST['repeatPassword']);
    
}catch(Exception $e){
    $_SESSION['err'] = $e->getMessage();
}

if ($password==$repeatPassword) {
	$DataUpdate = [
    "user_password"=>$password,
    ];
    $updat = $admin->Update($DataUpdate,'user_id',$id);
    header("location: LoginForm.php");
}


?>
