<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Registration</title>
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
                                                        <h4>Student Registration Form</h4>
                                                        
                                                    </div>
                                                    <h5><b>Fill Your Information</b></h5>
                                                </div>
                                                <div class="panel-body p-20">

                                                    <form class="form-horizontal" action="/service/student-register-database.php" method="post" enctype="multipart/form-data">
                                                    
                                                    <div class="form-group">
                                                            <label for="name" class="col-sm-2 control-label">Full Name</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="fullname" class="form-control" id="rollid" maxlength="20" required="required" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="username" class="col-sm-2 control-label">Username</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="username" class="form-control" id="rollid" maxlength="20" required="required" autocomplete="off">
                                                            </div>
                                                        </div>                                                        
                                                        <div class="form-group">
                                                            <label for="email" class="col-sm-2 control-label">Email</label>
                                                            <div class="col-sm-10">
                                                                <input type="email" name="emailid" class="form-control" id="email" required="required" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password" class="col-sm-2 control-label">Password</label>
                                                            <div class="col-sm-10">
                                                                <input type="password" name="password" class="form-control" id="rollid" maxlength="40" required="required" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password" class="col-sm-2 control-label">Confirm Password</label>
                                                            <div class="col-sm-10">
                                                                <input type="password" name="cpassword" class="form-control" id="rollid" maxlength="40" required="required" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="rollid" class="col-sm-2 control-label">Roll Number</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="rollid" class="form-control" id="rollid" maxlength="20" required="required" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="rollid" class="col-sm-2 control-label">Mobile Number</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="phone" class="form-control" id="rollid" maxlength="10" required="required" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="dob" class="col-sm-2 control-label">DOB</label>
                                                            <div class="col-sm-10">
                                                               <input type="date"  name="dob" class="form-control" id="date">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="gender" class="col-sm-2 control-label">Gender</label>
                                                            <div class="col-sm-10">
                                                           <input type="radio" name="gender" value="Male" required="required" checked="">Male <input type="radio" name="gender" value="Female" required="required">Female <input type="radio" name="gender" value="Other" required="required">Other
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="branch" class="col-sm-2 control-label">Branch</label>
                                                        <div class="col-sm-10">
                                                            <select name="branch" class="form-control" id="default" required="required">
                                                            <option value="">Select branch</option>
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
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Year Of Admission</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="year" class="form-control" id="default"  placeholder="Year" required="required">
                
                                                        </div>
                                                    </div>
                                                       

                                                        <div class="form-group">
                                                            <label for="gender" class="col-sm-2 control-label">Role</label>
                                                            <div class="col-sm-10">
                                                           <input type="radio" name="role" value="Student" required="required" checked="">Student
                                                           
                                                            </div>
                                                        </div>
                                                                            
                                                        
                                                        <div class="form-group">
                                                            <label for="password" class="col-sm-2 control-label">Upload Image</label>
                                                            <div class="col-sm-10">
                                                
                                                                <input type="file" name="uploadimg" class="form-control" id="uploadimg" accept="image/jpg, image/jpeg, image/png"  required="required" autocomplete="off">
                                                            </div>
                                                        </div> 

                                                        <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10"> 
                                                           
                                                            <button type="submit" name="register" class="btn btn-primary btn-labeled pull-right">REGISTRATION<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                        </div>
                                                    </div>
                                                    <a href="/student/student-login.php">Already Have An account?<i style="color:blue;">SIGN IN</i></a><BR><BR>
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

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
        <script>

        </script>
      
    </body>
</html>
