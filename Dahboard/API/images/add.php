<?php
    include "../header.php";
    include "../../database/DBClass.php";
    use DbClass\Table;
    $user = new Table('users');
    $image = new Table('images');
    $output = ['flag'=>0 , 'message'=>""];
    
    
    try{
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['email']) && isset($_FILES['img'])){
                $email = $user->ValidateEmail($_POST['email']);
                $SelUser = $user->FindById('user_email',$email);
                if(!empty($SelUser)){
                    if(isset($_FILES['img'])){
                        $img = $_FILES['img'];
                        $dir = "../../uploads/";
                        $imdUploas = UploadImage($img , $email , $dir);
                        if($imdUploas === true){
                            $output['flag'] = 1;
                            $output['message'] = "image in upload";
                        }else{
                            $output['message'] = $imdUploas;
                        }
                    }
                }
            }
        }
    }catch(Exception $e){
        $output['message']= $e->getMessage();
    }
    echo json_encode($output);

    function UploadImage($images , $email , $dir){
        $dirFile = $dir;
        $allowTypes = array('jpg','png','jpeg','gif');
        $fileName = basename($images["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $newImage = uniqid().".".$fileType;
        $targetFilePath = $dirFile . $newImage;
        if($images['size'] < 1000000){
            if(in_array($fileType, $allowTypes)){
                if(move_uploaded_file($images["tmp_name"],$targetFilePath)){
                    $arr = [
                        "image_path"=>$newImage,
                        "email_user"=>$email
                    ];
                    global $image;
                    $image->Create($arr);
                    return true;
                }
            }else{
                return "You Must Upload Image";
            }
        }else{
            return "images is So bigger";
        }
    }
?>