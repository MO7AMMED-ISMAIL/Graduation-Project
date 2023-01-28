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

$visitors = new Table('Visitors');
//validation
$username = $visitors->inputData($_POST['username']);
$password = $visitors->inputData($_POST['password']);
$phone = $visitors->inputData($_POST['phone']);
$email = $visitors->ValidateEmail($_POST['email']);
$roles_id = $visitors->inputData($_POST['role_id']);
$roles_id = $roles_id == 'Visitor' ? 3 : throw new Error('roles_id isnot valid');
//insert user
$DataInsert = [
    'visitor_name'=>$username,
    'visitor_password'=>$password,
    'visitor_email'=>$email,
    'visitor_phone'=>$phone,
    'roles_id'=>$roles_id,
];
$visitors->Create($DataInsert);
header("location: ../visitor.php");


?>