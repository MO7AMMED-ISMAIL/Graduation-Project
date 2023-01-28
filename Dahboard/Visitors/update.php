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

$update = new Table('visitors');  
//validation
$id = $update->inputData($_POST['id']);
$username = $update->inputData($_POST['username']);
$password = $update->inputData($_POST['password']);
$phone = $update->inputData($_POST['phone']);
$email = $update->ValidateEmail($_POST['email']);

//update
$DataUpdate = [
    "visitor_name"=>$username,
    "visitor_password"=>$password,
    "visitor_email"=>$email,
    "visitor_phone"=>$phone
];
$updat = $update->Update($DataUpdate,'visitor_id',$id);
header("location: ../visitor.php");



?>