<?php
   
    if(isset($_POST['submit']))
    {
        $email-$_POST['email'];
        $subject=$_POST['subject'];
        $msg=$_POST['msg'];
        require 'phpmailer/PHPMailerAutoload.php';
        require 'phpmailer/class.phpmailer.php';
        require 'phpmailer/class.smtp.php';
        $mail = new PHPMailer;

        $mail->isSMTP();    //send using SMTP
        $mail->Host='smtp.gmail.com';   //set the SMTP server to send through gmail.com
        $mail->Port= 587;   //SMTP Port
        //$mail->SMTPDebug=3;
        $mail->SMTPAuth=true;   //Enable SMTP Aunthentication
        $mail->SMTPSecure='tls';    //Enable TLS Encryption
        $mail->Username='jaishreeram0619@gmail.com';    //SMTP UserName
        $mail->Password='Certificate@123456';   //SMTP Password

        $mail->setFrom("jaishreeram0619@gmail.com"); //FROM
        $mail->addAddress($email); //To
        $mail->addReplyTo("jaishreeram0619@gmail.com"); //ReplyTo 

        $mail->isHTML(true);
        $mail->Subject=$subject;
        $mail->Body=$msg;

        if(!$mail->send())
        {
            echo "<script>alert('Unsuccessful');</script>".$mail->ErrorInfo; 
            
        }
        else
        {
           echo "<script>alert('Mail sent successfully');</script>";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>
</head>
<body>
    <div align='center'>
        <h2>
            Send Email
        </h2>
    </div>
    <div align='center'>
        EmailID &nbsp;<input type="email" name="email" placeholder="Enter your mail"><br><br>
        
    </div>
    <div align='center'>
        Subject &nbsp;<input type="text" name="subject" placeholder="Enter your subject"><br><br>
        
    <div align='center'>
        Message &nbsp;<input type="textarea" id="msg" name="msg" placeholder="Write your message"><br><br>
       
    </div>
    <div>
        <form>
            <input type="submit" name="submit" id="submit" value="Send Mail" style=" background-color:green; color:aliceblue; border:2px solid black; border-radius:10px; width:10%; height:20%; font-size:small;"/><br><br>
         </form>
    </div>

</body>
</html>

