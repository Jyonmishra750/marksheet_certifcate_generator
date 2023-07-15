<?php
    session_start();
    error_reporting(0);
    include('includes/config.php');
    $conn = mysqli_connect('localhost','root','','niis_db'); 
    $fullname=$_POST['fullname'];
    $username=$_POST['username'];
    $emailid=$_POST['emailid'];
    $dob=$_POST['dob'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $rollid=$_POST['rollid'];
    $MobileNo=$_POST['phone'];
    $gender=$_POST['gender'];
    $branch=$_POST['branch'];
    $year=$_POST['year'];
    $role=$_POST['role'];
    $image=$_FILES['uploadimg']['name'];
    $image_size=$_FILES['uploadimg']['size'];
    $image_type=$_FILES['uploadimg']['type'];
    $image_tmp_name=$_FILES['uploadimg']['tmp_name'];
    $uploaded_images="uploaded_images/".$image;
    if($conn->connect_error){
        die("Error connecting to:".$conn->connect_error);
    }
    if(isset($_POST['register']))
    {
        $result_st=mysqli_query($conn, "SELECT * FROM  student WHERE Email= '$emailid' OR UserName='$username'");
        if(mysqli_num_rows($result_st)>0)
        {
            echo "<script>alert('Email ID/Username already Taken');</script>";
            echo "<script type='text/javascript'> window.document.location = '/student/student-register-page.php'; </script>";
        }
        else
        {   
            if($cpassword===$password)
            {
                if(!file_exists($uploaded_images))
                {
                
                    if($image_size<5000000)
                    {
                    
        

                        $statement = mysqli_query($conn, "INSERT INTO `student` (id,student_name,UserName,Email,Password,MobileNo,DOB,Gender,branch,year,role,image) VALUES ('$rollid','$fullname','$username','$emailid','$password','$MobileNo','$dob','$gender','$branch','$year','$role','$image')");
                        
                    
                        if($statement)
                        {
                            move_uploaded_file($image_tmp_name,$uploaded_images);
                            echo "<script>alert('Request sent successfull. Wait for the admin approval');</script>";
                            echo "<script type='text/javascript'> window.document.location = '/student/student-login.php'; </script>";
                        }
                    
                    
                    
                    }                
                    else
                    {
                    echo "<script>alert('Image is too large! Image must be less than 5MB');</script>";
                    echo "<script type='text/javascript'> document.location = '/student/student-register-page.php'; </script>";
                    }

                }
                else
                {
                    echo "<script>alert('Profile Photo Already Exists...Check uploaded folder');</script>";
                    echo "<script type='text/javascript'> window.document.location = '/student/student-register-page.php'; </script>";
                }
            }
            else
            {
                echo "<script>alert('Password and Confirm Password not matched');</script>";
                echo "<script type='text/javascript'> window.document.location = '/student/student-register-page.php'; </script>";
            }
        }
            
            
        
        
    }
    /*$result_st =mysqli_query($conn, "SELECT * FROM `student` WHERE Email='$emailid'");

        if(mysqli_num_rows($result_st)>0)
        {
        }
        else{
            echo "<script>alert('Email ID/Username already Taken');</script>";
            echo "<script type='text/javascript'> window.document.location = 'student-register-page.php'; </script>";
        }*/
?>


