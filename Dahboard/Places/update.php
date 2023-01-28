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

$update = new Table('places');  
//validation
$id = $update->inputData($_POST['id']);
$name = $update->inputData($_POST['name']);
$description = $update->inputData($_POST['description']);


//update
$DataUpdate = [
    "place_name"=>$name,
    "place_description"=>$description,
    
];
$updat = $update->Update($DataUpdate,'place_id',$id);
header("location: ../Place.php");



?>