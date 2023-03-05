<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require '../../Auth/vendor/autoload.php';
    $output = [];
    function SendMail($email , $username){
        $Code = rand(1000,9999);
        try {
            $mail = new PHPMailer(true);
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER; //Show error
            $mail->Host       = 'smtp.example.com'; 
            $mail->SMTPAuth   = true; 
            $mail->Username   = 'aspsmailer@gmail.com'; // your email 
            $mail->Password   = 'kncuaijsbvgucocs'; // your password
            $mail->Port       = 456;
            //Recipients
            $mail->setFrom('aspsmailer@gmail.com', 'ASPS Team');
            $mail->addAddress($email); 
            //Content
            $mail->isHTML(true); 
            $mail->Subject = 'login in my system to vrify your indinety';
            $mail->Body    = 'Hello '.$username.'!<br><h3>Here is your Verification code ^_^</h3><br><h1>'.$Code.'</h1>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            if($mail->send()){
                $output['code']= $Code;
                return $output;
            }else{
                return false;
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        
    }
    
?>