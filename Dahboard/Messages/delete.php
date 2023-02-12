<?php
include "../database/DBClass.php";
use DbClass\Table;

if(!isset($_GET['mes_id'])){
    header("location: ../Message.php");
}
$id = $_GET['mes_id'];
$delMes = new Table('messages');
$delMes->Delete('mes_id',$id);
header("location: ../Message.php");
exit();
?>