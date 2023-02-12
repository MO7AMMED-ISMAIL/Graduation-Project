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
$Mes = new Table('messages');
//validation
try{
    $content = $Mes->inputData($_POST['content']);
    $email = $Mes->ValidateEmail($_POST['email']);
}catch(Exception $e){
    $_SESSION['err'] = $e->getMessage();
    header("location: ../Message.php?add=Post");
    exit();
}
//insert post
$DataInsert = [
    'mes_content'=>$content,
    'mes_from'=>$_SESSION['Admin_email'],
    'mes_to'=>$email
];
$Mes->Create($DataInsert);

header("location: ../Message.php");
exit();

?>