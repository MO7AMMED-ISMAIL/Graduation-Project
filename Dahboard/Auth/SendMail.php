<?php
    session_start();
    include "../database/DBClass.php";
    use DbClass\Table;
    $admin = new Table('admins');
    try{
        $email = $admin->ValidateEmail($_POST['email']);
        $SelAdmin = $admin->FindById('admin_email',$email);
        
    }catch(Exception $e){
        $_SESSION['err'] = $e->getMessage();
        header("location: forgetPassword.php");
    }
    $gmailUser = $SelAdmin['admin_email']; //mail to send rest password

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/autoload.php';

    try {
        $mail = new PHPMailer(true);

        //$mail->SMTPDebug = SMTP::DEBUG_SERVER; //Show error
        $mail->Host       = 'smtp.example.com'; 
        $mail->SMTPAuth   = true; 
        $mail->Username   = '######'; // your email 
        $mail->Password   = '######'; // your password
        $mail->Port       = 587;
        //Recipients
        $mail->setFrom('your mail', 'Mailer');
        $mail->addAddress('recive mail', 'Joe User'); 
    
        //Content
        $mail->isHTML(true); 
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
?>