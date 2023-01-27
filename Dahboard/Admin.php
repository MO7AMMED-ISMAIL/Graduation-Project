<?php
    session_start();
    $current = 'Admin';
    $id = 1 ;
    include "include/sidebar.php";
    include "include/navbar.php";
    include "database/DBClass.php";
    use DbClass\Table;
    $admins = new Table('admins');
    $row = ['admin_id','admin_name','admin_email','admin_phone','role_title'];
    $cond = ['roles_id'=>'role_id'];
    $result = $admins->InnerJoin('roles',$row,$cond);
    
    if(isset($_GET['add']) == 'Admin'){
        include "Admins/AddForm.php";  
    }
    elseif(isset($_GET['edit'])){
        $AdminId = $_GET['edit'];
        $SelAdmin = $admins->FindById('admin_id',$AdminId);
        include "Admins/EditForm.php";
    }else{
        include "Admins/table.php";
    }
    
    include "include/footer.php";
?>

