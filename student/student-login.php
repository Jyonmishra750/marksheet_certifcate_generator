<?php
session_start();
error_reporting(0);
include('includes/config.php');
$conn = mysqli_connect('localhost','root','','niis_db');
if($_SESSION['alogin']!=''){
    $_SESSION['alogin']='';
}
$emailid = $_POST['emailid'];
$password = $_POST['password'];

if($conn->connect_error){
    die("Error connecting to:".$conn->connect_error);
}
elseif(isset($_POST['login']))
{
        $emailid=$_POST['emailid'];
        $password=($_POST['password']);
        $select1 =mysqli_query($conn,"SELECT * FROM student WHERE Email='$emailid' AND Password='$password'");
        $row=mysqli_fetch_array($select1);

        $status=$row['status'];

        $select2 =mysqli_query($conn,"SELECT * FROM student WHERE Email='$emailid' AND Password='$password'");
        $check_user=mysqli_num_rows($select2);


        if(mysqli_num_rows($select2)>0)
        {
            $_SESSION['status']=$row['status'];
            $_SESSION['emailid']=$row['Email'];
            $_SESSION['password']=$row['Password'];
            if($status=="approved")
            {
                echo "<script type='text/javascript'> document.location = '/student/dashboard-student.php'; </script>"; 
            }
            if($status=="pending")
            {
            
                echo "<script>alert('Your Application is still pending for approval');</script>";
                echo "<script type='text/javascript'> document.location = '/student/student-login.php'; </script>";
            }
        
        }
        else
        {
            echo "<script>alert('Invalid Details');</script>";
        }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Login</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="">
        <div class="main-wrapper">

            <div class="">
                <div class="row">
 <h1 align="center">Student Result Management System</h1>
                    
                         <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <section class="section">
                            <div class="row mt-40">
                                <div class="col-md-10 col-md-offset-1 pt-50">

                                    <div class="row mt-30 ">
                                        <div class="col-md-11">
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <div class="panel-title text-center">
                                                        <h4>Student Login</h4>
                                                    </div>
                                                </div>
                                                <div class="panel-body p-20">

                                                    <form class="form-horizontal" method="post">
                                                    	<div class="form-group">
                                                    		<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                                    		<div class="col-sm-10">
                                                    			<input type="text" name="emailid" class="form-control" id="inputEmail3" placeholder="EmailID">
                                                    		</div>
                                                    	</div>
                                                    	<div class="form-group">
                                                    		<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                                    		<div class="col-sm-10">
                                                    			<input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                    		</div>
                                                    	</div>
                                                    
                                                        <div class="form-group mt-20">
                                                            
                                                    		<div class="col-sm-offset-2 col-sm-10">
                                                            
                                                    			<button type="submit" name="login" class="btn btn-success btn-labeled pull-right">Sign in<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                         
                                                    		</div>
                                                    	</div>
                                                        <a href="/student/student-register-page.php">Don't have any account?<i style="color:blue;">SIGN UP</i></a><BR><BR>
                                                        <a href="index.php"><i class="fa fa-home"></i> Home</a>
                                                    </form>

                                            

                                                 
                                                </div>
                                            </div>
                                            <!-- /.panel -->
                                            <p class="text-muted text-center"><small>Student Result Management System</small></p>
                                        </div>
                                        <!-- /.col-md-11 -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row -->
                        </section>

                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /. -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function(){

            });
        </script>

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
