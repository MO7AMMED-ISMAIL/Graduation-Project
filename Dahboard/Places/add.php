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

$places = new Table('Places');
//validation
$name = $places->inputData($_POST['name']);
$description = $places->inputData($_POST['description']);

//insert user
$DataInsert = [
    'place_name'=>$name,
    'place_description'=>$description,
    
];
$places->Create($DataInsert);
header("location: ../place.php");


?>