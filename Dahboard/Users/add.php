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

$users = new Table('users');
//validation
try{
    $username = $users->inputData($_POST['username']);
    $password = $users->inputData($_POST['password']);
    $phone = $users->inputData($_POST['phone']);
    $email = $users->ValidateEmail($_POST['email']);
    $role = $users->inputData($_POST['role_id']);
    $role = $role == 'User' ? '1' : throw new Error('roles_id isnot valid');
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
$users->Create($DataInsert);
header("location: ../User.php");


?>