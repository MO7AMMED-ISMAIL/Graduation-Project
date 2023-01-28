
<?php
    session_start();
    $current = 'Visitor';
    $id = 1;
    include "include/sidebar.php";
    include "include/navbar.php";
    include "database/DBClass.php";
    use DbClass\Table;
   
    $visitor = new Table('visitors');
    $row = ['visitor_id','visitor_name','visitor_email','visitor_phone','role_title'];
    $cond = ['roles_id'=>'role_id'];
    $result = $visitor->InnerJoin('roles',$row,$cond);

    if(isset($_GET['add']) == 'visitors'){
        include "Visitors/AddForm.php";
    }
    elseif(isset($_GET['edit'])){
        $visitorId = $_GET['edit'];
        $SelectVisitor = $users->FindById('visitor_id',$UserId);
        include "Visitors/EditForm.php";
    }else{
        include "Visitors/table.php";
    }
    include "include/footer.php";

?>
        