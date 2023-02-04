<?php
    session_start();
    $current = 'User';
    $id = 1;
    include "include/sidebar.php";
    include "include/navbar.php";
    include "database/DBClass.php";
    use DbClass\Table;
    $users = new Table('users');
    $cond = "user_role".'='."'1'";
    $result = $users->FindAll($cond);
    
    if(isset($_GET['add']) == 'User'){
        include "Users/AddForm.php";
    }
    elseif(isset($_GET['edit'])){
        $UserId = $_GET['edit'];
        $SelUser = $users->FindById('user_id',$UserId);
        include "Users/EditForm.php";
    }else{
        include "Users/table.php";
    }
    include "include/footer.php";
?>
