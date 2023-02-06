<?php
    session_start();
    if(!isset($_SESSION['Admin_id'])){
        header("location: Auth/LoginForm.php");
    }
    $current = 'Visitor';
    $id = 1 ;
    include "include/sidebar.php";
    include "include/navbar.php";
    // include "database/DBClass.php";
    use DbClass\Table;
    $visitors = new Table('users');
    $images= new Table('images');

    $cond = "user_role".'='."'2'";
    $result = $visitors->FindAll($cond);

    if(isset($_GET['add']) == 'Visitor'){
        include "Visitors/AddForm.php";  
    }
    elseif(isset($_GET['edit'])){
        $visitorId = $_GET['edit'];
        $SelVisitor = $visitors->FindById('user_id',$visitorId);
        include "Visitors/EditForm.php";
    }else{
        include "Visitors/table.php";
    }
    
    include "include/footer.php";
?>