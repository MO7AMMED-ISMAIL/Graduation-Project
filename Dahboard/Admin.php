<?php
    session_start();
    if(!isset($_SESSION['Admin_id'])){
        header("location: Auth/LoginForm.php");
    }
    $current = 'Admin';
    $id = 1 ;
    include "include/sidebar.php";
    include "include/navbar.php";
    //include "database/DBClass.php";
    use DbClass\Table;
    $admins = new Table('users');
    $images= new Table('images');
    $cond = "user_role".'='."'0'";
    $result = $admins->FindAll($cond);
    if(isset($_GET['add']) == 'Admin'){
        include "Admins/AddForm.php";  
    }
    elseif(isset($_GET['edit'])){
        $AdminId = $_GET['edit'];
        $SelAdmin = $admins->FindById('user_id',$AdminId);
        include "Admins/EditForm.php";
    }else{
        include "Admins/table.php";
    }
    
    include "include/footer.php";
?>
