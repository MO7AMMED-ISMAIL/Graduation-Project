<?php
    session_start();
    if(!isset($_SESSION['Admin_id'])){
        header("location: Auth/LoginForm.php");
        exit();
    }
    $current = 'Message';
    $id = 1 ;
    include "include/sidebar.php";
    include "include/navbar.php";
    //include "database/DBClass.php";
    use DbClass\Table;
    $messages = new Table('messages');
    $row = ['mes_id','mes_content','mes_from','mes_to','user_id','user_email','user_name'];
    $cond=['mes_from'=>'user_email'];
    $result = $messages->InnerJoin('users',$row,$cond);

    if(isset($_GET['add']) == 'Mes'){
        include "Messages/AddForm.php";  
    }elseif(isset($_GET['edit'])){
        $MesID = $_GET['edit'];
        $SelMes = $messages->FindById('mes_id',$MesID);
        include "Messages/EditForm.php";
    }
    else{
        include "Messages/table.php";
    }
    include "include/footer.php";
?>