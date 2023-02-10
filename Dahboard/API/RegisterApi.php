<?php

include "../database/DBClass.php";
use DbClass\Table;
session_start();
header('content-type:application/json');
$users = new Table('users');


//validation
try{
    $username = $users->inputData($_POST['username']);
    $password = $users->inputData($_POST['password']);
    $phone = $users->inputData($_POST['phone']);
    $email = $users->ValidateEmail($_POST['email']);
    $role = $users->inputData($_POST['role']);
    // $role = $role == 'User' ? '1' : throw new Error('role isnot valid');
}catch(Exception $e){
    $_SESSION['err'] = $e->getMessage();
    header("location: ../User.php?add=User");
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
$users->Create($DataInsert);

$SelAdmin = $users->FindById('user_email',$email);
$_SESSION['id_admin'] = $SelAdmin['user_id']; 
include "SendMail.php";

if ($users) {
    echo json_encode(["status"=>"success"]);
}
else {
	echo json_encode("error");
}
