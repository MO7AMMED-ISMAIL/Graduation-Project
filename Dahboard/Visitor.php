<?php
    session_start();
    $current = 'Visitor';
    $id = 1;
    include "include/sidebar.php";
    include "include/navbar.php";
    include "database/DBClass.php";
    use DbClass\Table;

    $visitors = new Table('visitors');
    $row = ['visitor_id','visitor_name','visitor_email','visitor_phone','role_title'];
    $cond = ['roles_id'=>'role_id'];
    $result = $visitors->InnerJoin('roles',$row,$cond);
    
    if(isset($_GET['add']) == 'Visitor'){
        include "Visitors/AddForm.php";
    }
    elseif(isset($_GET['edit'])){
        $VisitorId = $_GET['edit'];
        $SelVisitor = $visitors->FindById('visitor_id',$VisitorId);
        include "Visitors/EditForm.php";
    }else{
        include "Visitors/table.php";
    }
    include "include/footer.php";
?>
