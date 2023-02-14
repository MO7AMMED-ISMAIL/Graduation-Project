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

$update = new Table('tasks');  
//validation
try{
    $id = $update->inputData($_POST['id']);
    $email = $update->inputData($_POST['email']);
    $content = $update->inputData($_POST['content']);
}catch(Exception $e){
    $_SESSION['err'] = $e->getMessage();
    header("location: ../Task.php?edit=$id");
}
//update
$DataUpdate = [
    "task_content"=>$content,
    "task_to"=>$email
];
$updat = $update->Update($DataUpdate,'task_id',$id);
header("location: ../Task.php");
exit();


?>
