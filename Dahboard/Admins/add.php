<?php
include "../database/DBClass.php";
use DbClass\Table;
session_start();
// echo $_SESSION['token'];
// exit();
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
//validation
try{
    $username = $admins->inputData($_POST['username']);
    $password = $admins->inputData($_POST['password']);
    $phone = $admins->inputData($_POST['phone']);
    $email = $admins->ValidateEmail($_POST['email']);
    $role = $admins->inputData($_POST['role']);
    $role = $role == 'Admin' ? '0' : throw new Error('role isnot valid');
}catch(Exception $e){
    $_SESSION['err'] = $e->getMessage();
    header("location: ../Admin.php?add=Admin");
    exit();
}
$password_ard = rand(1000000,99999999);
//insert user
$DataInsert = [
    'user_name'=>$username,
    'user_password'=>$password,
    'user_pass_ard'=>$password_ard,
    'user_email'=>$email,
    'user_phone'=>$phone,
    'user_role'=>$role,
];
$admins->Create($DataInsert);
header("location: ../admin.php");
exit();

?>