<?php
include "../database/DBClass.php";
use DbClass\Table;

if(!isset($_GET['user_id'])){
    header("location: ../Admin.php");
}
$id = $_GET['user_id'];
$delUser = new Table('users');
$delUser->Delete('user_id',$id);
header("location: ../User.php");

?>