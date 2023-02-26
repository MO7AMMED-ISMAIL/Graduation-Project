<?php
include "../database/DBClass.php";
use DbClass\Table;

if(!isset($_GET['task_id'])){
    header("location: ../Task.php");
}
$id = $_GET['task_id'];
$delTask = new Table('tasks');
$delTask->Delete('task_id',$id);
header("location: ../Task.php");
exit();
?>