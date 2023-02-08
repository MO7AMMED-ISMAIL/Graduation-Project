<?php
session_start();
$code=$_POST['code'];
echo $code;
echo $_SESSION['code'];
if($code==$_SESSION['code']){
	header("location:ResetPassword.php");
}

?>