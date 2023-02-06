<?php
include "../database/DBClass.php";
use DbClass\Table;
session_start();
// echo $_SESSION['token'];
// exit();
if(!isset($_POST['token']) || !isset($_SESSION['token'])){
    exit('Token is not set');
}

if($_POST['token'] == $_SESSION['token']){
    if(time() >= $_SESSION['token_expire']){
        exit('Token is Expired');
    }
    unset($_SESSION['token']);
}

$visitors = new Table('users');
$images = new Table('images');

         

//validation
try{
    $username = $visitors->inputData($_POST['username']);
    $password = $visitors->inputData($_POST['password']);
    $phone = $visitors->inputData($_POST['phone']);
    $email = $visitors->ValidateEmail($_POST['email']);
    $role = $visitors->inputData($_POST['role']);
    $role = $role == 'Visitor' ? '2' : throw new Error('role is not valid');
}catch(Exception $e){
    $_SESSION['err'] = $e->getMessage();
    header("location: ../Visitor.php?add=Visitor");
    exit();
}
$password_ard = rand(1000000,99999999);

//image
$array=[];
$img=$_FILES['img'];
foreach ($img['name'] as $key => $value) {
    $tmp = $_FILES['img']['tmp_name'][$key];
    $extensions = ['jpg','jpeg','gif','png'];
    $ext =pathinfo($img['name'][$key],PATHINFO_EXTENSION);
    if($extensions=$ext){
          
          
          if($img['size'][$key]<200000){
                 $newImageName = md5(uniqid()).'.'.$ext;
                 move_uploaded_file($tmp, "../uploads/".$newImageName);
                 array_push($array, $newImageName);
             }
        }
}
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

//insert images
foreach($array as $one){
    $ImagesInsert =[
    'image_path'=>$one,
    'email_user'=>$email,

    ];
   $images->Create($ImagesInsert);
}

header("location: ../visitor.php");
exit();

?>