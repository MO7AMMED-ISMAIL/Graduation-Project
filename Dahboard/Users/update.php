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

$update = new Table('users');  
//validation
$id = $update->inputData($_POST['id']);
$username = $update->inputData($_POST['username']);
$password = $update->inputData($_POST['password']);
$phone = $update->inputData($_POST['phone']);
$email = $update->ValidateEmail($_POST['email']);

//update
$DataUpdate = [
    "user_name"=>$username,
    "user_password"=>$password,
    "user_email"=>$email,
    "user_phone"=>$phone
];
$updat = $update->Update($DataUpdate,'user_id',$id);
header("location: ../User.php");



?>