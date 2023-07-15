<?php
session_start();
error_reporting(0);
include('includes/config.php');
$conn = mysqli_connect('localhost','root','','niis_db');
//$rollid=$_SESSION['rollid'];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Student Requests</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css"/>
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
          <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        .succWrap{
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        .approve{
            background-color:green; 
            color:aliceblue; 
            border:2px solid black; 
            border-radius:10px; 
            width:93%; 
            font-size:small;
        }
        .reject{
            background-color:red; 
            color:aliceblue; 
            border:2px solid black; 
            border-radius:10px; 
            width:93%; 
            font-size:small;
        }
        </style>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
   <?php include('includes/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">
<?php include('includes/leftbar.php');?>  

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Manage Student Requests</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="/admin/dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li>Student</li>
            							<li class="active">Manage Requests</li>
            						</ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                             

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>View Requests Info</h5>
                                                </div>
                                            </div>
<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Well done!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                            <div class="panel-body p-20">

                                                <table id="example" class="table-striped table-bordered table-condensed" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            
                                                            <th>Roll No.</th>
                                                            <th>Name</th>
                                                            <th>Email ID</th>
                                                            <th>Mobile No</th>
                                                            <th>DOB</th>
                                                            <th>Branch</th>
                                                            <th>Role</th>
                                                            <th>Gender</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            
                                                            <th>Roll No.</th>
                                                            <th>Name</th>
                                                            <th>Email ID</th>
                                                            <th>Mobile No</th>
                                                            <th>DOB</th>
                                                            <th>Branch</th>
                                                            <th>Role</th>
                                                            <th>Gender</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        <?php 
                                                            $sql = "SELECT * FROM student WHERE status='pending' ORDER BY id DESC ; ";
                                                            $query = $dbh->prepare($sql);
                                                            $query->execute();
                                                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                            $cnt=1;
                                                            if($query->rowCount() > 0)
                                                            {
                                                                foreach($results as $result)
                                                                {  ?>
                                                                    <tr>
                                                                        
                                                                        <td><?php echo htmlentities($result->id);?></td>
                                                                        <td><?php echo htmlentities($result->student_name);?></td>
                                                                        <td><?php echo htmlentities($result->Email);?></td>
                                                                        <td><?php echo htmlentities($result->MobileNo);?></td>
                                                                        <td><?php echo htmlentities($result->DOB);?></td>
                                                                        <td><?php echo htmlentities($result->Branch);?></td>
                                                                        <td><?php echo htmlentities($result->role);?></td>
                                                                        <td><?php echo htmlentities($result->Gender);?></td>
                                                                        <td><?php echo htmlentities($result->status);?></td>
                                                                        <td>
                                                                            <form action="admin/student-requests.php" method="post">
                                                                                <input type="submit" name="approvestudent" class="approve" value="Approve" /><br><br>
                                                                                <input type="submit" name="denystudent" class="reject" value="Reject" />
                                                                            </form>
                                                                        </td>
                                                                    </tr>

                                                                    <?php $cnt=$cnt+1;
                                                                }
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>




                                                <?php

                                                    if(isset($_POST['approvestudent']))
                                                    {
                                                        //$rollid=$_POST['rollid'];
                                                        $status='approved';
                                                        $sqlapp=mysqli_query($conn, "UPDATE `student` SET status = '$status' WHERE id='$result->id'; ");

                                                        if($sqlapp)
                                                        {
                                                            echo '<script>alert("User Approved")</script>';
                                                            echo "<script>window.location.href ='/admin/student-requests.php'</script>";
                                                        }
                                                        else
                                                        {
                                                            echo '<script>alert("Something went wrong!!!")</script>';
                                                            echo "<script>window.location.href ='/admin/student-requests.php'</script>";
                                                        }


                                                    }
                                                ?>

                                                <?php

                                                    if(isset($_POST['denystudent']))
                                                    {
                                                        //$rollid=$_POST['rollid'];
                                                        $status='rejected';
                                                        $sqlrej=mysqli_query($conn, "UPDATE `student` SET status = '$status' WHERE id='$result->id'; ");
                                                        if($sqlrej)
                                                        {
                                                            echo '<script>alert("User Rejected")</script>';
                                                            echo "<script>window.location.href ='/admin/student-requests.php'</script>";
                                                        }
                                                        else
                                                        {
                                                            echo '<script>alert("Something went wrong!!!")</script>';
                                                            echo "<script>window.location.href ='/admin/student-requests.php'</script>";
                                                        }


                                                    }

                                                    ?>
                                         
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-6 -->

                                                               
                                                </div>
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

                                </div>
                                <!-- /.row -->

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
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>
        <script src="js/DataTables/datatables.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $('#example').DataTable();

                $('#example2').DataTable( {
                    "scrollY":        "300px",
                    "scrollCollapse": true,
                    "paging":         false
                } );

                $('#example3').DataTable();
            });
        </script>
    </body>
</html>


