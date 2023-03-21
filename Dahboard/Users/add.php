<?php
include "../database/DBClass.php";
use DbClass\Table;
session_start();
$users = new Table('users');

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
            $username = $users->inputData($_POST['username']);
            $password = $users->inputData($_POST['password']);
            $phone = $users->inputData($_POST['phone']);
            $email = $users->ValidateEmail($_POST['email']);
            $role = $users->inputData($_POST['role']);
            $role = $role == 'User' ? '1' : throw new Error('role isnot valid');
            $password_ard = rand(1000000,99999999);
            $DataInsert = [
                'user_name'=>$username,
                'user_password'=>$password,
                'user_pass_ard'=>$password_ard,
                'user_email'=>$email,
                'user_phone'=>$phone,
                'user_role'=>$role,
            ];
            $users->Create($DataInsert);
            $users->upload($img , $email);
            header("location: ../user.php");
            exit();
        }else{
            $_SESSION['err'] = "You Must Upload Image";
        }
    }catch(Exception $e){
        $_SESSION['err'] = $e->getMessage();
        header("location: ../User.php?add=User");
        exit();
    }
}
?>