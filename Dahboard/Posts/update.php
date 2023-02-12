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

$update = new Table('posts');  
//validation
try{
    $id = $update->inputData($_POST['id']);
    $title = $update->inputData($_POST['title']);
    $content = $update->inputData($_POST['content']);
}catch(Exception $e){
    $_SESSION['err'] = $e->getMessage();
    header("location: ../Post.php?edit=$id");
}
//update
$DataUpdate = [
    "post_id"=>$id,
    "post_title"=>$title,
    "post_content"=>$content
];
$updat = $update->Update($DataUpdate,'post_id',$id);
header("location: ../Post.php");
exit();


?>
