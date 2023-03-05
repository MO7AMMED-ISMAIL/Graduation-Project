<?php
session_start();
include "../database/DBClass.php";
use DbClass\Table;

if(!isset($_POST['token']) || !isset($_SESSION['token'])){
    exit('Token is not set');
}

if($_POST['token'] == $_SESSION['token']){
    if(time() >= $_SESSION['token_expire']){
        exit('Token is Expired');
    }
    unset($_SESSION['token']);
}
$admins = new Table('users');
try{
    $email = $admins->ValidateEmail($_POST['email']);
    $password = $admins->inputData($_POST['password']);
    $user_role = ['user_role'=> '0'];
    $admin = $admins->Login($email,$password,$user_role);
    $_SESSION['Admin_id'] = $admin['user_id'];
    $_SESSION['Admin_email'] = $admin['user_email'];
    header("location: ../index.php");
    exit();
}catch(Exception $e){
    $_SESSION['err'] = $e->getMessage();
    header("location: LoginForm.php");
    exit();
}




?>