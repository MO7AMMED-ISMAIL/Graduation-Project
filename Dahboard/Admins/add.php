<?php
include "../database/DBClass.php";
use DbClass\Table;
session_start();
$admins = new Table('users');
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
            $username = $admins->inputData($_POST['username']);
            $password = $admins->inputData($_POST['password']);
            $phone = $admins->inputData($_POST['phone']);
            $email = $admins->ValidateEmail($_POST['email']);
            $role = $admins->inputData($_POST['role']);
            $role = $role == 'Admin' ? '0' : throw new Error('role isnot valid');
            //insert user
            $password_ard = rand(1000000,99999999);
            $DataInsert = [
                'user_name'=>$username,
                'user_password'=>$password,
                'user_pass_ard'=>$password_ard,
                'user_email'=>$email,
                'user_phone'=>$phone,
                'user_role'=>$role,
            ];
            $admins->Create($DataInsert);
            $admins->upload($img , $email);
            header("location: ../admin.php");
            exit();
        }else{
            $_SESSION['err'] = "You Must Upload Image";
        }
    }catch(Exception $e){
        $_SESSION['err'] = $e->getMessage();
        header("location: ../Admin.php?add=Admin");
        exit();
    }
}

?>