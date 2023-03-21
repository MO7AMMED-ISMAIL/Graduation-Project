<?php
    if(isset($_GET['edit'])){
        $_SESSION['token'] = bin2hex(random_bytes(32));
        $_SESSION['token_expire'] = time() + 3600 ;
    }else{
        exit();
    }
?>


<div class="row">
    <div class="col-lg-12">
        <div class="p-5">
            <div class="text-center">
                <h2 class="h4 text-gray-900 mb-4">Update Post</h2>
            </div>
            <form action="Posts/update.php" method="post" class="user" enctype="multipart/form-data">
            <div class="form-group">
                    <input type="hidden" class="form-control form-control-user" name="token" value="<?=$_SESSION['token']?>">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form-control-user" name="id" value="<?=$PostID?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Enter User Name..." name="title" value="<?=$SelPost['post_title']?>" id="username">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="content" rows="3" id="area" placeholder="Enter Content Post" style="border-radius: 15px;"><?=$SelPost['post_content']?></textarea>
                </div>
                <div class="form-group">
                    <input style="border-radius: 20px; height: 45px;" type="file" class="form-control" name="img" id="image" onchange="fileValid()"> 
                </div>
                <div id="imagePreview" style="text-align: center;"></div>
                <button class="btn btn-primary btn-user btn-block" type="submit">Update</button>
            </form>
            <hr>
                <?php
                    if(isset($_SESSION['err'])){
                        echo "<div class='alert alert-danger' role='alert' id='error'>".$_SESSION['err']."</div>";
                        unset($_SESSION['err']);
                    }
                ?>
        </div>
    </div>
</div>
