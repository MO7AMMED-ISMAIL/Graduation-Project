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

$update = new Table('admins');  
//validation
$id = $update->inputData($_POST['id']);
$username = $update->inputData($_POST['username']);
$password = $update->inputData($_POST['password']);
$email = $update->ValidateEmail($_POST['email']);

//update
$DataUpdate = [
    "username"=>$username,
    "password"=>$password,
    "email"=>$email,
];
$updat = $update->Update($DataUpdate,$id);
header("location: ../admin.php");



?>