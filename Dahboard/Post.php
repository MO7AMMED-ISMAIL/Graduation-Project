<?php
    session_start();
    if(!isset($_SESSION['Admin_id'])){
        header("location: Auth/LoginForm.php");
        exit();
    }
    $current = 'Post';
    $id = 1 ;
    //include "database/DBClass.php";
    include "include/sidebar.php";
    include "include/navbar.php";
    use DbClass\Table;
    $posts = new Table('posts');
    $row = ['post_id','post_title','post_content','user_name','users_id','user_role' , 'post_date','post_img'];
    $cond=['users_id'=>'user_id'];
    $result = $posts->InnerJoin('users',$row,$cond);
    if(isset($_GET['add']) == 'Post'){
        include "Posts/AddForm.php";  
    }elseif(isset($_GET['edit'])){
        $PostID = $_GET['edit'];
        $SelPost = $posts->FindById('post_id',$PostID);
        include "Posts/EditForm.php";
    }elseif(isset($_GET['view'])){
        $PostID = $_GET['view'];
        $SelPost = $posts->FindById('post_id',$PostID);
        include "Posts/table.php";
    }else{
        include "Posts/table.php";
    }
    include "include/footer.php";
?>