<?php
    session_start();
    if(!isset($_SESSION['Admin_id'])){
        header("location: Auth/LoginForm.php");
        exit();
    }
    $current = 'Task';
    $id = 1 ;
    include "include/sidebar.php";
    include "include/navbar.php";
    //include "database/DBClass.php";
    use DbClass\Table;
    $tasks = new Table('tasks');
    $row = ['task_id','task_content','task_from','task_to','user_id','user_email','user_name','task_date'];
    $cond=['task_from'=>'user_email'];
    $result = $tasks->InnerJoin('users',$row,$cond);

    if(isset($_GET['add']) == 'task'){
        include "Tasks/AddForm.php";  
    }elseif(isset($_GET['edit'])){
        $taskID = $_GET['edit'];
        $SelTask = $tasks->FindById('task_id',$taskID);
        include "Tasks/EditForm.php";
    }
    else{
        include "Tasks/table.php";
    }
    include "include/footer.php";
?>