<?php
include "../database/DBClass.php";
use DbClass\Table;

if(!isset($_GET['place_id'])){
    header("location: ../Place.php");
}
$id = $_GET['place_id'];
$delPlace = new Table('places');
$delPlace->Delete('place_id',$id);
header("location: ../Place.php");

?>