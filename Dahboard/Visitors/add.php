<?php
include "../database/DBClass.php";
use DbClass\Table;
session_start();
$visitors = new Table('users');

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(!isset($_POST['token']) || !isset($_SESSION['token'])){
        exit('Token is not set');
    }
    if($_POST['token'] == $_SESSION['token']){
        if(time() >= $_SESSION['token_expire']){
            exit('Token is Expired');
        }
        unset($_SESSION['token']);
    }
    
    //validation
    try{
        $img = $_FILES['img'];
        if($img['size'][0] != 0){
            $username = $visitors->inputData($_POST['username']);
            $password = $visitors->inputData($_POST['password']);
            $phone = $visitors->inputData($_POST['phone']);
            $email = $visitors->ValidateEmail($_POST['email']);
            $role = $visitors->inputData($_POST['role']);
            $role = $role == 'Visitor' ? '2' : throw new Error('role is not valid');
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
            $visitors->Create($DataInsert);
            $visitors->upload($img , $email);
            header("location: ../Visitor.php");
            exit();
        }else{
            $_SESSION['err'] = "You Must Upload Image";
        }
    }catch(Exception $e){
        $_SESSION['err'] = $e->getMessage();
        header("location: ../Visitor.php?add=Visitor");
        exit();
    }
}
?>