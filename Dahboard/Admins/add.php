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

$admins = new Table('Admins');
//validation
$username = $admins->inputData($_POST['username']);
$password = $admins->inputData($_POST['password']);
$phone = $admins->inputData($_POST['phone']);
$email = $admins->ValidateEmail($_POST['email']);
$roles_id = $admins->inputData($_POST['role_id']);
$roles_id = $roles_id == 'Admin' ? 1 : throw new Error('roles_id isnot valid');
//insert user
$DataInsert = [
    'admin_name'=>$username,
    'admin_password'=>$password,
    'admin_email'=>$email,
    'admin_phone'=>$phone,
    'roles_id'=>$roles_id,
];
$admins->Create($DataInsert);
header("location: ../admin.php");


?>