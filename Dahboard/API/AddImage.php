<?php
include "../database/DBClass.php";
use DbClass\Table;
session_start();
header('content-type:application/json');
$user = new Table('users');
$image = new Table('images');
$output = ["flag"=>'0' , 'message'=>''];

//validation
try{
    $email = $user->ValidateEmail($_GET['email']);
    $SelUser = $user->FindById('user_email',$email);
    $img=$_FILES['image'];
    $tmp = $_FILES['image']['tmp_name'];
    $extensions = ['jpg','jpeg','gif','png'];
    $ext =pathinfo($img['name'],PATHINFO_EXTENSION);
    if($extensions=$ext){
        
        if($img['size']<200000){
            $newImageName = md5(uniqid()).'.'.$ext;
            move_uploaded_file($tmp, "../uploads/".$newImageName);
            $ImagesInsert =[
                'image_path'=>$newImageName,
                'email_user'=>$SelUser['user_email'],
            ];
            $image->Create($ImagesInsert);
            
        }
    }
    $output['flag']= 1;
}catch(Exception $e){
    $output['message']= $e->getMessage();
}
$_SESSION['id_admin'] = $SelUser['user_id'];
include "SendMail.php";
echo json_encode($output);

?>

