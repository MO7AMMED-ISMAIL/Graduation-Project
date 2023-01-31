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
                <h2 class="h4 text-gray-900 mb-4">Update Place</h2>
            </div>
            <form action="Places/update.php" method="post" class="user" enctype="multipart/form-data">
                 <div class="form-group">
                    <input type="hidden" class="form-control form-control-user" name="id" value="<?=$PlaceId?>">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form-control-user" name="token" value="<?=$_SESSION['token']?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Enter User Name..." name="name" value="<?=$SelPlace['place_name']?>">
                </div>
                <!-- <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="description" name="description">
                </div> -->
                <textarea class="form-control form-control-user" name="description"><?=$SelPlace['place_description']?> </textarea><br>
                <button class="btn btn-primary btn-user btn-block" type="submit">ADD</button>
            </form>

        </div>
    </div>
</div>
