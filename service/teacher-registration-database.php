<?php
    session_start();
    error_reporting(0);
    include('includes/config.php');
    $conn = mysqli_connect('localhost','root','','niis_db'); 
    $teacherid=$_POST['teacherid'];
    $fullname=$_POST['fullname'];
    $username=$_POST['username'];
    $emailid=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $gender=$_POST['gender'];
    $dob=$_POST['dob'];
    $role=$_POST['role'];
    $branch=$_POST['branch'];
    $image=$_FILES['uploadimage']['name'];
    $image_size_teacher=$_FILES['uploadimage']['size'];
    $image_tmp_name_teacher=$_FILES['uploadimage']['tmp_name'];
    $uploaded_images_teacher="uploaded_images_teacher/".$image;
    if($conn->connect_error){
        die("Error connecting to:".$conn->connect_error);
    }
    if(isset($_POST['registration']))
    {
        $result_t=mysqli_query($conn, "SELECT * FROM  teacher WHERE Email= '$emailid' OR UserName='$username'");
        if(mysqli_num_rows($result_t)>0)
        {
            echo "<script>alert('Email ID/Username already Taken');</script>";
            echo "<script type='text/javascript'> window.document.location = '/teacher/teacher-register-page.php'; </script>";
        }
        else
        {
            if($cpassword===$password)
            {    
                if(!file_exists($uploaded_images_teacher))
                {
                
                    if($image_size_teacher<5000000)
                    {
                    
                        $statement1 = mysqli_query($conn, "INSERT INTO `teacher` (id,FullName,UserName,Email,Password,DOB,Branch,role,Gender,image) values('$teacherid','$fullname','$username','$emailid','$password','$dob','$branch','$role','$gender','$image')");
                    
                    
                        if($statement1)
                        {
                            move_uploaded_file($image_tmp_name_teacher,$uploaded_images_teacher);
                            echo "<script>alert('Request sent successfull. Wait for the admin approval');</script>";
                            echo "<script type='text/javascript'> window.document.location = '/teacher/teacher-login.php'; </script>";
                        }
                    
                    
                    
                    }                
                    else
                    {
                    echo "<script>alert('Image is too large! Image must be less than 5MB');</script>";
                    echo "<script type='text/javascript'> document.location = '/teacher/teacher-register-page.php'; </script>";
                    }

                }
                else
                {
                    echo "<script>alert('Profile Photo Already Exists...Check uploaded folder');</script>";
                    echo "<script type='text/javascript'> window.document.location = '/teacher/teacher-register-page.php'; </script>";
                }
            }
            else
            {
                echo "<script>alert('Password and Confirm Password not matched');</script>";
                echo "<script type='text/javascript'> window.document.location = '/teacher/teacher-register-page.php'; </script>";
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
