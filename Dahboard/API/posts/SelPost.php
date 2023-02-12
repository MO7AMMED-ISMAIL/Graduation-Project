<?php
    include "../../database/DBClass.php";
    include "../header.php";
    use DbClass\Table;
    $posts = new Table('posts');
    $output = ["flag"=>'0' , 'message'=>''];
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if($_GET['id']){
            try{
                $posts = $posts->FindById('post_id',$_GET['id']);
                $output['flag']= 1;
                $output['message']= "Post is Selected";
                $output['data'] = $posts;
            }catch(Exception $e){
                $output['message']= $e->getMessage();
            }
        }
    }
    echo json_encode($output);
?>