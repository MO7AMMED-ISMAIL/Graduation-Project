<?php
include "../database/DBClass.php";
use DbClass\Table;

if(!isset($_GET['id'])){
    header("location: ../Admin.php");
}
$id = $_GET['id'];
$delAdmin = new Table('admins');
$delAdmin->Delete($id);
header("location: ../Admin.php");
?>