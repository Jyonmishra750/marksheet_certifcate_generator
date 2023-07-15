<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
if(isset($_POST['submit']))
{
    $roll=$_POST['roll'];
    $year=$_POST['year']; 
    $branch=$_POST['branch'];
    $semester=$_POST['semester'];
    $subject=$_POST['subject'];
    $mark=$_POST['mark'];
    $sql="INSERT INTO  tblresult(id,year,Branch,Semester,SubjectName,marks) VALUES(:roll,:year,:branch,:semester,:subject,:mark)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':roll',$roll,PDO::PARAM_STR);
    $query->bindParam(':year',$year,PDO::PARAM_STR);
    $query->bindParam(':branch',$branch,PDO::PARAM_STR);
    $query->bindParam(':semester',$semester,PDO::PARAM_STR);
    $query->bindParam(':subject',$subject,PDO::PARAM_STR);
    $query->bindParam(':mark',$mark,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if(!$lastInsertId)
    {
    $msg="Result Added successfully";
    }
    else 
    {
    $error="Something went wrong. Please try again";
    }
    
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Add Result </title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
        <link rel="stylesheet" href="css/prism/prism.css" media="screen">
        <link rel="stylesheet" href="css/select2/select2.min.css">
        <link rel="stylesheet" href="css/main.css" media="screen">
        <script src="js/modernizr/modernizr.min.js"></script>
        
            
    </head>

    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
            <?php include('includes/topbar-teacher.php'); ?>
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    <!-- ========== LEFT SIDEBAR ========== -->
                    <?php include('includes/leftbar-teacher.php'); ?>
                    <!-- /.left-sidebar -->

                    <div class="main-page">

                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Add Result</h2>

                                </div>

                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="/teacher/dashboard-teacher.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li>Result</li>
                                        <li class="active">Add Result</li>
                                    </ul>
                                </div>

                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">

                                        <div class="panel-body">
                                            <?php if ($msg) { ?>
                                                <div class="alert alert-success left-icon-alert" role="alert">
                                                    <strong>Well done!</strong><?php echo htmlentities($msg); ?>
                                                </div><?php } else if ($error) { ?>
                                                <div class="alert alert-danger left-icon-alert" role="alert">
                                                    <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                                </div>
                                            <?php } ?>
                                            <form class="form-horizontal" method="post" >
                                            <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Roll Number</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="roll" class="form-control" id="default"  placeholder="Roll Number" required="required" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Year</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="year" class="form-control year" id="default"  placeholder="Year" required="required" >
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label ">Branch</label>
                                                    <div class="col-sm-10">
                                                        <select name="branch" class="form-control branch branch" id="default"  required="required" >
                                                        <option value="">Select Branch</option>
                                                                    <?php $sql = "SELECT * from branch";
                                                                        $query = $dbh->prepare($sql);
                                                                        $query->execute();
                                                                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                                        if($query->rowCount() > 0)
                                                                        {
                                                                           foreach($results as $result)
                                                                        {   ?>
                                                                    <option value="<?php echo ($result->Branch); ?>"><?php echo ($result->Branch); ?> </option>
                                                                    <?php }} ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label ">Semester</label>
                                                    <div class="col-sm-10">
                                                    <select name="semester" class="form-control" id="default" required="required">
                                                            <option value="">Select Semester</option>
                                                                    <?php $sql = "SELECT * from semester";
                                                                        $query = $dbh->prepare($sql);
                                                                        $query->execute();
                                                                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                                        if($query->rowCount() > 0)
                                                                        {
                                                                           foreach($results as $result)
                                                                        {   ?>
                                                                    <option value="<?php echo ($result->semester_name); ?>"><?php echo ($result->semester_name); ?> </option>
                                                                    <?php }} ?>
                                                            </select>
                                                    </div>
                                                </div>

                                            
                                                            
                                                       
                                                   
                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Subject</label>
                                                    <div class="col-sm-10">
                                                        <select name="subject" class="form-control " id="default"  required="required" >
                                                        <option value="">Select Subject</option>
                                                                    <?php $sql = "SELECT * from tblsubjects";
                                                                        $query = $dbh->prepare($sql);
                                                                        $query->execute();
                                                                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                                        if($query->rowCount() > 0)
                                                                        {
                                                                           foreach($results as $result)
                                                                        {   ?>
                                                                    <option value="<?php echo ($result->SubjectName); ?>"><?php echo ($result->SubjectName); ?> </option>
                                                                    <?php }} ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Enter Mark</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" name="mark" class="form-control year" id="default"  placeholder="Enter Your Mark" required>
                                                    </div>
                                                </div>
                                                

                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button type="submit" name="submit" id="submit" class="btn btn-primary" >Declare Result</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                        </div>
                    </div>
                    <!-- /.content-container -->
                </div>
                <!-- /.content-wrapper -->
            </div>
            <!-- /.main-wrapper -->
            <script src="js/jquery/jquery-2.2.4.min.js"></script>
            <script src="js/bootstrap/bootstrap.min.js"></script>
            <script src="js/pace/pace.min.js"></script>
            <script src="js/lobipanel/lobipanel.min.js"></script>
            <script src="js/iscroll/iscroll.js"></script>
            <script src="js/prism/prism.js"></script>
            <script src="js/select2/select2.min.js"></script>
            <script src="js/main.js"></script>
            <script>
                $(function($) {
                    $(".js-states").select2();
                    $(".js-states-limit").select2({
                        maximumSelectionLength: 2
                    });
                    $(".js-states-hide").select2({
                        minimumResultsForSearch: Infinity
                    });
                });
            </script>
    </body>

    </html>
<?PHP } ?>