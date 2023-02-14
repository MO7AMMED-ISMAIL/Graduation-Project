<?php
include "../../database/DBClass.php";
include "../header.php";
use DbClass\Table;
$tasks = new Table('tasks');
$output = ["flag"=>'0' , 'message'=>''];
try{
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if($_GET['email']){
            $email = $_GET['email'];
            $cond = "task_to".'='."'$email'";
            $task = $tasks->FindAll($cond);
            $output['flag']= 1;
            $output['message'] = "data is Selected";
            $output['data']= $task;
        }
    }else{
        $output['message']= $e->getMessage();
    }
}catch(Exception $e){
    $output['message']= "cant updated this Get";
}
echo json_encode($output);
?>

