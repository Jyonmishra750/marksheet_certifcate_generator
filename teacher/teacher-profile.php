<?php
    session_start();
    error_reporting(0);
    include('includes/config.php');
    $conn = mysqli_connect('localhost','root','','niis_db');
    //include('teacher-login.php');
    if(strlen($_SESSION['alogin'])=="")
    {   header("Location: index.php"); }
    else{ 
?>
        
<?php

    $email=$_SESSION['email'];
    $sql = "SELECT * from teacher WHERE Email='$email';";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);

    if($query->rowCount() > 0)
    {
        foreach($results as $result)
        {  
        
 }} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teacher | Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/toastr/toastr.min.css" media="screen">
    <link rel="stylesheet" href="css/icheck/skins/line/blue.css">
    <link rel="stylesheet" href="css/icheck/skins/line/red.css">
    <link rel="stylesheet" href="css/icheck/skins/line/green.css">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>
    <style>
        .img {
            display: block;
            
            border-radius: 10%;
            margin:10px 0 10px 10px;
            width: 150px;
            height: 150px;
            
        }
        .profile{
            
            display: flex;
        }
        .profile-headings {
            font-size:16px;
            font-weight:600;
            font-family:sans-serif;
            margin-left:70px;
            
            
        }
        .profile-data{
            margin-right:500px;
            float:right;
            align-items:left;
            font-weight:normal;
        }
        
        h1{
            margin-left: 30px;
            font-weight: bold;
            font-family:sans-serif;
        }
        .profile-photo{
            
            width:200px;
        }
        
        .btn-primary{
            border-radius:45%;
            background-color: #eb344c;
        }
        .name{
            font-size:24px;
            font-weight:bold;
            font-family:sans-serif;
            margin-right:420px;
            line-height:4rem;
        }
        .button1{
            margin-top:20px;
            cursor:pointer;
            background-color:#50276e;
            color:white;
            font-size:15px;
            border:none;
            border-radius:5px;
            
            text-align:center;
            color: whitesmoke;
        }
        .button1:hover
        {
            background-color: yellowgreen;
        }
        .button2{
            margin-top:20px;
            cursor:pointer;
            background-color: red;
            color:white;
            font-size:15px;
            border:none;
            border-radius:5px;
            
            text-align:center;
            color: whitesmoke;
        }
        
        .button2:hover
        {
            background-color: yellowgreen;
        }
        .personal-info{
            font-weight:bold;
        }
        #edit{
            color: whitesmoke;
        }
    </style>
</head>

<body class="top-navbar-fixed">
    <div class="main-wrapper">
        <?php include('includes/topbar-teacher.php');?>
        <div class="content-wrapper">
            <div class="content-container">

                <?php include('includes/leftbar-teacher.php');?>
                <div ><h1>Teacher Profile </h1></div>
                                                
                    <section class="section">
                        <div class="container-fluid">
                                <table id="example" class="display table table-striped " cellspacing="0"
                                    width="100%">
                                    <tbody>
                                       <tr>
                                            <td colspan="2x" class="profile">
                                                <div class="profile">
                                                <div class="profile-photo">
                                                    <div class="card">
                                                    <img src="<?php echo "uploaded_images_teacher/".$result->image;?>" alt="<?php echo htmlentities($result->UserName);?>" class="img"> 
                                                    </div>
                                                    
                                                </div>
                                                <div class="profile-name">
                                                        <div class="name">
                                                            <?php echo htmlentities($result->FullName);?>
                                                        </div>
                                                        <div class="">
                                                            <?php echo htmlentities($result->Email);?>
                                                        </div>
                                                        <div class="">
                                                            <?php echo htmlentities($result->UserName);?>
                                                        </div>
                                                        <div>
                                                            <button  name="button"  class="button1"><a href="update-teacher-profile.php" ><i class="fa fa-edit" id="edit">&nbsp;Edit Profile</i></a></button>
                                                            <button  name="button"  class=" button2"><a href="change-password-teacher.php" ><i class="fa fa-server" id="edit">&nbsp;Change Password</i></a></button>
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                                
                                            </td>
                                        </tr>
                                        <tr><td class="personal-info">Personal Information</td></tr>
                                        <tr>
                                            <td>
                                                <div class="profile-headings">UserName:- <div class="profile-data"><?php echo htmlentities($result->UserName);?></div></div>
                                                <div class="profile-headings">ID:-<div class="profile-data"><?php echo htmlentities($result->id);?></div></div>
                                                <div class="profile-headings">DOB:-<div class="profile-data"><?php echo htmlentities($result->DOB);?></div></div>
                                                <div class="profile-headings">Gender:-<div class="profile-data"><?php echo htmlentities($result->Gender);?></div></div>
                                                <div class="profile-headings">Branch:-<div class="profile-data"><?php echo htmlentities($result->Branch);?></div></div>
                                                <div class="profile-headings">Mobile No:-<div class="profile-data"><?php echo htmlentities($result->MobileNo);?></div></div>
                                                
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
  
                            </div>
                        <!-- /.container-fluid -->
                    </section>
                    <!-- /.section -->

                </div>
                <!-- /.main-page -->


            </div>
            <!-- /.content-container -->
        </div>
        <!-- /.content-wrapper -->

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
    <script src="js/prism/prism.js"></script>
    <script src="js/waypoint/waypoints.min.js"></script>
    <script src="js/counterUp/jquery.counterup.min.js"></script>
    <script src="js/amcharts/amcharts.js"></script>
    <script src="js/amcharts/serial.js"></script>
    <script src="js/amcharts/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="js/amcharts/plugins/export/export.css" type="text/css" media="all" />
    <script src="js/amcharts/themes/light.js"></script>
    <script src="js/toastr/toastr.min.js"></script>
    <script src="js/icheck/icheck.min.js"></script>

    <!-- ========== THEME JS ========== -->




    
</body>

</html>
<?php } ?>