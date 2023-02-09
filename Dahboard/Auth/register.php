<?php
include "../database/DBClass.php";
use DbClass\Table;
session_start();
$user = new Table('users');
if($_SERVER['REQUEST_METHOD'] == "POST"){
    try{
        $email = $user->ValidateEmail($_POST['email']);
        $f_name = $user->inputData($_POST['f_name']);
        $l_name = $user->inputData($_POST['l_name']);
        $username = $f_name ." ".$l_name;
        $phone = $user->inputData($_POST['phone']);
        $password = $user->inputData($_POST['password']);
        $verPass = $user->inputData($_POST['verPass']);
        if($password === $verPass){
            $row = [
                "user_name"=>$username,
                "user_password"=>$password,
                "user_email"=>$email,
                "user_pass_ard"=>rand(1000000,99999999),
                "user_role"=>'0',
                "user_phone"=>$phone
            ];
            $addAdmin = $user->Create($row);
            if($_FILES['img']['size'] < 200000){
                $addImage = $user->Upload($_FILES['img'],$email);
            }else{
                throw new Exception("The Image is so Bigger");
            }
            header("location: LoginForm.php");
            exit();
        }else{
            throw new Exception("The new password does not match");
        }
    }catch(Exception $e){
        $_SESSION['err'] = $e->getMessage();
        header("location: RegisterForm.php");
        exit();
    }
}

?>