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

$update = new Table('users');  
$image = new Table('images');
//validation
try{
    $id = $update->inputData($_POST['id']);
    $username = $update->inputData($_POST['username']);
    $phone = $update->inputData($_POST['phone']);
    $email = $update->ValidateEmail($_POST['email']);
}catch(Exception $e){
    $_SESSION['err'] = $e->getMessage();
}
$password_ard = rand(1000000,99999999);
//update
$DataUpdate = [
    "user_name"=>$username,
    
    "user_pass_ard"=>$password_ard,
    "user_email"=>$email,
    "user_phone"=>$phone
];
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
foreach($array as $one){
    $ImagesUpdate =[
    'image_path'=>$one,
    'email_user'=>$email,
    ];
    $updateImage = $image->Update($ImagesUpdate,'email_user',$email);
}

$updat = $update->Update($DataUpdate,'user_id',$id);
header("location: ../admin.php");
exit();


?>