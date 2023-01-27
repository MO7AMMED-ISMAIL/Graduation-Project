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
$username = $users->inputData($_POST['username']);
$password = $users->inputData($_POST['password']);
$phone = $users->inputData($_POST['phone']);
$email = $users->ValidateEmail($_POST['email']);
$roles_id = $users->inputData($_POST['role_id']);
$roles_id = $roles_id == 'User' ? 2 : throw new Error('roles_id isnot valid');
//insert user
$DataInsert = [
    'user_name'=>$username,
    'user_password'=>$password,
    'user_email'=>$email,
    'user_phone'=>$phone,
    'roles_id'=>$roles_id,
];
$users->Create($DataInsert);
header("location: ../User.php");


?>