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
$task = new Table('tasks');
//validation
try{
    $content = $task->inputData($_POST['content']);
    $email = $task->ValidateEmail($_POST['email']);
}catch(Exception $e){
    $_SESSION['err'] = $e->getMessage();
    header("location: ../Task.php?add=Post");
    exit();
}
//insert post
$DataInsert = [
    'task_content'=>$content,
    'task_from'=>$_SESSION['Admin_email'],
    'task_to'=>$email
];
$task->Create($DataInsert);
header("location: ../Task.php");
exit();

?>