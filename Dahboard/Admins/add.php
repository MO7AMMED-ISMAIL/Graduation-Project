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
$role_id = $admins->inputData($_POST['role_id']);
$role_id = $role_id == 'Admin' ? 1 : '';
$email = $admins->ValidateEmail($_POST['email']);
//insert user
$DataInsert = [
    'username'=>$username,
    'password'=>$password,
    'email'=>$email,
    'role_id'=>$role_id,
];
$admins->Create($DataInsert);
header("location: ../admin.php");


?>