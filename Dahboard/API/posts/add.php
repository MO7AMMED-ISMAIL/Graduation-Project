<?php
    include "../../database/DBClass.php";
    include "../header.php";
    use DbClass\Table;
    $posts = new Table('posts');
    $output = ["flag"=>'0' , 'message'=>''];
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['content']) && $_POST['id'] && isset($_POST['title'])){
            try{
                $id = $posts->inputData($_POST['id']);
                $title = $posts->inputData($_POST['title']);
                $content = $posts->inputData($_POST['content']);
                $data = [
                    'post_title'=>$title,
                    'post_content'=>$content,
                    'users_id'=>$id
                ];
                $AddPost = $posts->Create($data);
                $output['flag']= 1;
                $output['message']= "Post is Created";
            }catch(Exception $e){
                $output['message']= $e->getMessage();
            }
        }
    }
    echo json_encode($output);
?>