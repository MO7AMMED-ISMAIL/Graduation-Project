<?php
    include "../../database/DBClass.php";
    include "../header.php";
    use DbClass\Table;
    $posts = new Table('posts');
    $output = ["flag"=>'0' , 'message'=>''];
    try{
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_GET['post_id']) && $_POST['title'] && $_POST['content']){
                $post = $posts->FindById('post_id',$_GET['post_id']);
                $userId = $post['users_id'];
                if(isset($_GET['user_id']) && $_GET['user_id']== $userId){
                    try{
                        $title = $posts->inputData($_POST['title']);
                        $content = $posts->inputData($_POST['content']);
                        $row = [
                            'post_title'=>$title,
                            'post_content'=>$content
                        ];
                        $value = $_GET['post_id'];
                        $updatePost = $posts->Update($row,'post_id',$value);
                        $output['flag']= 1;
                        $output['message']= "Post is udated";
                    }catch(Exception $e){
                        $output['message']= $e->getMessage();
                    }
                }else{
                    $output['message']= "cant updated this post";
                }
            }
        }else{
            $output['message']='REQUEST METHOD Must be Post';
        }
    }catch(Exception $e){
        $output['message']= $e->getMessage();
    }
    echo json_encode($output);
?>