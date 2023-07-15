<?php
    session_start();
    error_reporting(0);
    include('includes/config.php');
    $conn = mysqli_connect('localhost','root','','niis_db'); 
    //$emailid=$_POST['email'];

    //require 'phpmailer/includes/Exception.php';
    //require 'phpmailer/includes/PHPMailer.php';
    //require 'phpmailer/includes/SMTP.php';

    
    //use PHPMailer\PHPMailer\PHPMailer;
    //use PHPMailer\PHPMailer\SMTP;
    //use PHPMailer\PHPMailer\Exception;

    if($conn->connect_error){
        die("Error connecting to:".$conn->connect_error);
    }

    if(isset($_POST['appemailstudent']))
    {
        require 'phpmailer/PHPMailerAutoload.php';
        require 'phpmailer/class.phpmailer.php';
        require 'phpmailer/class.smtp.php';

        $mail = new PHPMailer;
        $mail->isSMTP();    //send using SMTP
        $mail->SMTPDebug=2;
        $mail->Host='smtp.gmail.com';   //set the SMTP server to send through gmail.com
        $mail->Port= 587;   //SMTP Port //465
        $mail->SMTPAuth=true;   //Enable SMTP Aunthentication
        $mail->SMTPSecure='tls';    //Enable TLS Encryption
        $mail->Username="jaishreeram0619@gmail.com";    //SMTP UserName
        $mail->Password="jaishreeram@0619";   //SMTP Password

        $mail->setFrom("jaishreeram0619@gmail.com"); //FROM
        /*$mail->addReplyTo("jaishreeram0619@gmail.com"); //ReplyTo 
        $mail->addBCC('jyotinarayanmishra05@gmail.com'); //To

        $mail->Subject='NIIS Institute Of Information Science & Management';
        $mail->Body='Congratulations!! Your application has been approved by NIIS Institute Of Information Science & Management. Now, you can login with your emailID and password to our NIIS WebPortal. Thank You!!!';

        if(!$mail->send())
        {
            echo 'Mailer Error:'.$mail->ErrorInfo;
        }
        else
        {
            echo "<script>alert('Mail sent successfully');</script>";
            echo "<script type='text/javascript'> window.document.location = 'send-email-teacher.php'; </script>";
            
        }*/

        $sql="SELECT * FROM student WHERE status='approved' AND mailstatus='no' ";
        $res=mysqli_query($conn, $sql);
        if(mysqli_num_rows($res)>0)
        {
            $mail->addReplyTo("jaishreeram0619@gmail.com"); //ReplyTo 
            //addCC
            //addBCC
            //Attachments
            //$mail->addAttachment('git-transport.png',"GIT Workflow image"); //Add Attachments

            while($x=mysqli_fetch_assoc($res))
            {
                $mail->addBCC($x['Email']);
            }

            //Content

            $mail->isHTML(true);    //Set Email format to HTML

            $mail->Subject='Update on Form Submission: NIIS Institute Of Information Science & Management';
            $mail->Body='Dear Candidate, Congratulations!!! Your application has been approved by NIIS Institute Of Information Science & Management. Thank you for your interest in our college. Now, you can login to our NIIS WebPortal with your EmailID and Password. Thank You!!!';

            if(!$mail->Send())
            {
                $mailstatus='yes';
                $sqlapp=mysqli_query($conn, "UPDATE `student` SET mailstatus = '$mailstatus' WHERE status='approved'");
                echo "<script>alert('Approval Mail sent Successfull');</script>";
                echo "<script type='text/javascript'> window.document.location = '/admin/send-email-student.php'; </script>";
            }
            else
            {
                echo 'Mailer Error:'.$mail->ErrorInfo;
                //echo "<script>alert('Unsucessfull!! Something went wrong');</script>";
                //echo "<script type='text/javascript'> window.document.location = 'send-email-student.php'; </script>";  
            }

        }
        else
        {
            echo "<script>alert('No Data Found');</script>";
            echo "<script type='text/javascript'> window.document.location = '/admin/send-email-student.php'; </script>"; 
        }

    }
?>