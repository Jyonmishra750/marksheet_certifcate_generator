<?php

    session_start();
    error_reporting(0);
    include('includes/config.php');
    $conn = mysqli_connect('localhost','root','','niis_db');
    //$rollid=$_GET['rollid'];
    if(isset($_POST['updateteacher']))
    {
        $teacherid=$_POST['teacherid'];
        $fullname=$_POST['chngname'];
        $username=$_POST['chngusername'];
        $emailid=$_POST['chngemailid'];
        $mob=$_POST['chngmob'];
        $update_image=$_FILES['update_image']['name'];
        $update_image_size=$_FILES['update_image']['size'];
        $update_image_type=$_FILES['update_image']['type'];
        $update_image_name=$_FILES['update_image']['tmp_name'];
        $update_image_folder="uploaded_images_teacher/".$update_image;
        //$branch=$_POST['branch'];

        
        if(!file_exists($update_image_folder))
        {
            if($update_image_size<5000000)
            {
                $query="UPDATE teacher SET FullName='$fullname', UserName='$username', Email='$emailid', MobileNo='$mob', image='$update_image' WHERE id='$teacherid';";
                $select=mysqli_query($conn, $query);

                if($select)
                {
                    move_uploaded_file($update_image_name,$update_image_folder);
                    echo "<script>alert('Updated Successfully');</script>";
                    echo "<script type='text/javascript'> window.document.location = '/teacher/teacher-login.php'; </script>";
                }
                else
                {
                    echo "<script>alert('Unsuccessfull');</script>";
                    echo "<script type='text/javascript'> window.document.location = '/teacher/update-teacher-profile.php'; </script>";   
                } 
            }
            else
            {
                echo "<script>alert('Image is too large! Image must be less than 5MB');</script>";
                echo "<script type='text/javascript'> window.document.location = '/teacher/update-teacher-profile.php'; </script>";
            }
        
        }
        else
        {
            echo "<script>alert('Profile Photo Already Exists...Check uploaded folder');</script>";
            echo "<script type='text/javascript'> window.document.location = '/teacher/update-teacher-profile.php'; </script>";
        }
    }   
    

?>