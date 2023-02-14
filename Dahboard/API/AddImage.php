<?php
include "../database/DBClass.php";
include "../header.php";
use DbClass\Table;
session_start();
$user = new Table('users');
$image = new Table('images');
$output = ["flag"=>'0' , 'message'=>''];

//validation
try{
    $email = $user->ValidateEmail($_GET['email']);
    $SelUser = $user->FindById('user_email',$email);
    $img=$_FILES['image'];
    $image->Upload($img,$email);
    $output['flag']= 1;
}catch(Exception $e){
    $output['message']= $e->getMessage();
}
$_SESSION['id_admin'] = $SelUser['user_id'];
include "SendMail.php";
echo json_encode($output);

?>

