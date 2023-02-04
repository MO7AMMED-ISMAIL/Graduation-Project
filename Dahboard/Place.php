<?php
    session_start();
    $current = 'Places';
    $id = 1;
    include "include/sidebar.php";
    include "include/navbar.php";
    include "database/DBClass.php";
    use DbClass\Table;
    $places = new Table('places');
    $result = $places->FindAll();
    
    if(isset($_GET['add']) == 'Place'){
        include "Places/AddForm.php";
    }
    elseif(isset($_GET['edit'])){
        $PlaceId = $_GET['edit'];
        $SelPlace = $places->FindById('Place_id',$PlaceId);
        include "Places/EditForm.php";
    }else{
        include "Places/table.php";
    }
    include "include/footer.php";
?>
