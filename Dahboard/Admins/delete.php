<?php
include "../database/DBClass.php";
use DbClass\Table;

if(!isset($_GET['admin_id'])){
    header("location: ../Admin.php");
}
$id = $_GET['admin_id'];
$delAdmin = new Table('admins');
$delAdmin->Delete('admin_id',$id);
header("location: ../Admin.php");

?>