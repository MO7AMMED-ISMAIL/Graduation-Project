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
$posts = new Table('posts');
//validation
try{
    $title = $posts->inputData($_POST['title']);
    $content = $posts->inputData($_POST['content']);
}catch(Exception $e){
    $_SESSION['err'] = $e->getMessage();
    header("location: ../Post.php?add=Post");
    exit();
}
//insert post
$DataInsert = [
    'post_title'=>$title,
    'post_content'=>$content,
    'users_id'=>$_SESSION['Admin_id'],
];
$posts->Create($DataInsert);

header("location: ../Post.php");
exit();

?>