<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
{   header("Location: index.php"); }else{
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Teacher | Dashboard</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/toastr/toastr.min.css" media="screen" >
        <link rel="stylesheet" href="css/icheck/skins/line/blue.css" >
        <link rel="stylesheet" href="css/icheck/skins/line/red.css" >
        <link rel="stylesheet" href="css/icheck/skins/line/green.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">
              <?php include('includes/topbar-teacher.php');?>
            <div class="content-wrapper">
                <div class="content-container">

                    <?php include('includes/leftbar-teacher.php');?>  

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-sm-6">
                                    <h2 class="title">Dashboard</h2>
                                  
                                </div>
                                <!-- /.col-sm-6 -->
                            </div>
                            <!-- /.row -->
                      
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">
                                <div class="row">
                                
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-primary" href="/teacher/manage-student-teacher.php">
                                            <?php 
                                                $sql1 ="SELECT id from student ";
                                                $query1 = $dbh -> prepare($sql1);
                                                $query1->execute();
                                                $results1=$query1->fetchAll(PDO::FETCH_OBJ);
                                                $totalstudents=$query1->rowCount();
                                            ?>

                                            <span class="number counter"><?php echo htmlentities($totalstudents);?></span>
                                            <span class="name">Registered Students</span>
                                            <span class="bg-icon"><i class="fa fa-users"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->





                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                                        <a class="dashboard-stat bg-danger" href="/teacher/manage-subject-teacher.php">
                                            
                                            <?php 
                                                $sql ="SELECT id from  tblsubjects ";
                                                $query = $dbh -> prepare($sql);
                                                $query->execute();
                                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                $totalsubjects=$query->rowCount();
                                            ?>
                                            <span class="number counter"><?php echo htmlentities($totalsubjects);?></span>
                                            <span class="name">Subjects Listed</span>
                                            <span class="bg-icon"><i class="fa fa-ticket"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->







                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top:1%;">
                                        <a class="dashboard-stat bg-warning" href="/teacher/manage-branch-teacher.php">
                                            <?php 
                                                $sql2 ="SELECT id from  Branch ";
                                                $query2 = $dbh -> prepare($sql2);
                                                $query2->execute();
                                                $results2=$query2->fetchAll(PDO::FETCH_OBJ);
                                                $totalBranch=$query2->rowCount();
                                            ?>
                                            <span class="number counter"><?php echo htmlentities($totalBranch);?></span>
                                            <span class="name">Total Branch listed</span>
                                            <span class="bg-icon"><i class="fa fa-bank"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->







                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  style="margin-top:1%">
                                        <!-- <a class="dashboard-stat bg-success" href="manage-result-teacher.php">
                                            <?php 
                                                /*$sql3="SELECT  distinct StudentId from  tblresult ";
                                                $query3 = $dbh -> prepare($sql3);
                                                $query3->execute();
                                                $results3=$query3->fetchAll(PDO::FETCH_OBJ);
                                                $totalresults=$query3->rowCount();
                                            ?>

                                            <span class="number counter"><?php echo htmlentities($totalresults);*/?></span>
                                            <span class="name">Results Declared</span>
                                            <span class="bg-icon"><i class="fa fa-file-text"></i></span>
                                        </a> -->
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->





                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->
                        <br>
                        <section class="py-5"  >
            <div class="container my-5">
                <div class="row justify-content-center" >
                    <div class="col-lg-6">
                        <h2>Notifications</h2>
                        <hr  color="#000" />
                        <marquee direction="up" scrollamount="3" style="color: blue;" onmouseover="this.stop();" onmouseout="this.start();">
                            <ul>
                                <?php $sql = "SELECT * from tblnotification";
                                $query = $dbh->prepare($sql);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $cnt=1;
                                if($query->rowCount() > 0)
                                {
                                foreach($results as $result)
                                {   ?>                      
                                <li><a href="notifications.php?nid=<?php echo htmlentities($result->Id);?>"><?php echo htmlentities($result->subject);?></li>
                                <br>
                                <?php }} ?>
                            </ul>
                   
                        </marquee>

                    </div>
                </div>
            </div>
        </section>                                   


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
        <script src="js/main.js"></script>
        <script src="js/production-chart.js"></script>
        <script src="js/traffic-chart.js"></script>
        <script src="js/task-list.js"></script>
        <script>
            $(function(){

                // Counter for dashboard stats
                $('.counter').counterUp({
                    delay: 10,
                    time: 1000
                });
                <?php

                    $email=$_POST['email'];
                    $sql5 = "SELECT * from teacher WHERE Email='$email'";
                    $query5 = $dbh->prepare($sql5);
                    $query5->execute();
                    $results=$query5->fetchAll(PDO::FETCH_OBJ);

                    if($query5->rowCount() > 0)
                    {
                        foreach($results as $result)
                        {  
                            
                        }
                    }
                ?>
                // Welcome notification
                toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": false,
                  "positionClass": "toast-bottom-right",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "timeOut": "2000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"

                  
                }
                toastr["success"]("<h6>Hello! <?php echo htmlentities($result->FullName);?> </h6>Welcome to Your Profile!");

            });
        </script>
    </body>
</html>
<?php } ?>
