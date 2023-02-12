<?php
include "../database/DBClass.php";
use DbClass\Table;

if(!isset($_GET['post_id'])){
    header("location: ../Post.php");
}
$id = $_GET['post_id'];

$delMes = new Table('posts');
$delMes->Delete('post_id',$id);
header("location: ../Post.php");
exit();
?>