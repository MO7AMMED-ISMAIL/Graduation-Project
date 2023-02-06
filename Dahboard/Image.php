<?php
    session_start();
    $current = 'Places';
    $id = 1;
    include "include/sidebar.php";
    include "include/navbar.php";
    use DbClass\Table;
    $users = new Table('users');
    $result = $images->FindAll();
    
    
    include "Places/table.php";
    
    include "include/footer.php";
?>
