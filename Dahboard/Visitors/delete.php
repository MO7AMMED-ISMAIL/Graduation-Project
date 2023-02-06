<?php
include "../database/DBClass.php";
use DbClass\Table;

if(!isset($_GET['visitor_id'])){
    header("location: ../Visitor.php");
}
$id = $_GET['visitor_id'];
$delVisitor = new Table('users');
$delVisitor->Delete('user_id',$id);
header("location: ../Visitor.php");

?>