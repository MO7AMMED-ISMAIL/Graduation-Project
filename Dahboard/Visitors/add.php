<?php
include "../database/DBClass.php";
use DbClass\Table;
session_start();

if(!isset($_POST['token']) || !isset($_SESSION['token'])){
    exit('Token is not set');
}

if($_POST['token'] == $_SESSION['token']){
    if(time() >= $_SESSION['token_expire']){
        exit('Token is Expired');
    }
    unset($_SESSION['token']);
}

$visitors = new Table('users');
//validation
try{
    $username = $visitors->inputData($_POST['username']);
    $password = $visitors->inputData($_POST['password']);
    $phone = $visitors->inputData($_POST['phone']);
    $email = $visitors->ValidateEmail($_POST['email']);
    $role = $visitors->inputData($_POST['role']);
    $role = $role == 'Visitor' ? '2' : throw new Error('role isnot valid');
}catch(Exception $e){
    $_SESSION['err'] = $e->getMessage();
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
$visitors->Create($DataInsert);
header("location: ../visitor.php");
exit();

?>