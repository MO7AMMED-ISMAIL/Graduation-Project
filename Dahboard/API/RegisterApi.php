<?php

include "../database/DBClass.php";
use DbClass\Table;
session_start();
header('content-type:application/json');
$user = new Table('users');
$output = ["flag"=>'0' , 'message'=>''];

//validation
try{
    $username = $user->inputData($_POST['username']);
    $password = $user->inputData($_POST['password']);
    $repeatPassword = $user->inputData($_POST['repeatPassword']);
    $phone = $user->inputData($_POST['phone']);
    $email = $user->ValidateEmail($_POST['email']);
    $role = $user->inputData($_POST['role']);
    $output['flag']= 1;
}catch(Exception $e){

    $output['message']= $e->getMessage();
    header("location: ../User.php?add=User");
    exit();
}
$password_ard = rand(1000000,99999999);
//insert user
if($password === $repeatPassword){
$DataInsert = [
    'user_name'=>$username,
    'user_password'=>$password,
    'user_pass_ard'=>$password_ard,
    'user_email'=>$email,
    'user_phone'=>$phone,
    'user_role'=>$role,
];

$user->Create($DataInsert);
$SelAdmin = $user->FindById('user_email',$email);
$_SESSION['id_admin'] = $SelAdmin['user_id']; 

$addImage = $user->Upload($_FILES['image'],$email);
}else{
     throw new Exception("The new password does not match");
}

include "SendMail.php";

echo json_encode($output);

?>

