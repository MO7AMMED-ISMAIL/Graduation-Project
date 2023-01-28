<?php
include "../database/DBClass.php";
use DbClass\Table;

if(!isset($_GET['visitor_id'])){
    header("location: ../Visitor.php");
}
$id = $_GET['visitor_id'];
$delAdmin = new Table('visitors');
$delAdmin->Delete('visitor_id',$id);
header("location: ../Visitor.php");

?>