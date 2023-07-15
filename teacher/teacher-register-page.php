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
        <title>Teacher Registration</title>
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
 <h1 align="center">NIIS Certificate Generation Management System</h1>
                    
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
                                                        <h4>Teacher Registration</h4>
                                                    </div>
                                                </div>
                                                <div class="panel-body p-20">

                                                    <form class="form-horizontal" action="/service/teacher-registration-database.php" method="post" enctype="multipart/form-data">
                                                    
                                                        <div class="form-group">
                                                            <label for="default" class="col-sm-2 control-label">Full Name</label>
                                                    		<div class="col-sm-10">
                                                                <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Full Name"required="required" autocomplete="off">
                                                    		</div>
                                                    	</div>
                                                    	<div class="form-group">
                                                    		<label for="username" class="col-sm-2 control-label">Username</label>
                                                    		<div class="col-sm-10">
                                                    			<input type="text" name="username" class="form-control" id="inputEmail3" placeholder="UserName" required="required">
                                                    		</div>
                                                    	</div>
                                                        <div class="form-group">
                                                            <label for="email" class="col-sm-2 control-label">Email</label>
                                                            <div class="col-sm-10">
                                                                <input type="email" name="email" class="form-control" id="email" placeholder="Email" required="required" autocomplete="off">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="rollid" class="col-sm-2 control-label">Teacher ID</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="teacherid" class="form-control" id="rollid" maxlength="20" required="required" autocomplete="off">
                                                            </div>
                                                        </div>

                                                    	<div class="form-group">
                                                    		<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                                    		<div class="col-sm-10">
                                                    			<input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required="required">
                                                    		</div>
                                                    	</div>
                                                        <div class="form-group">
                                                    		<label for="inputPassword3" class="col-sm-2 control-label">Confirm Password</label>
                                                    		<div class="col-sm-10">
                                                    			<input type="password" name="cpassword" class="form-control" id="inputPassword3" placeholder="Password" required="required">
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
                                                               <input type="date"  name="dob" class="form-control" id="date" required="required">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="gender" class="col-sm-2 control-label">Gender</label>
                                                            <div class="col-sm-10">
                                                                <input type="radio" name="gender" value="Male" required="required" checked="">Male <input type="radio" name="gender" value="Female" required="required">Female <input type="radio" name="gender" value="Other" required="required">Other
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="gender" class="col-sm-2 control-label">Role</label>
                                                            <div class="col-sm-10">
                                                           
                                                           <input type="radio" name="role" value="Teacher" required="required" checked="">Teacher
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="branch" class="col-sm-2 control-label">Branch</label>
                                                            <div class="col-sm-10">
                                                                 <select name="branch" class="form-control" id="default" required="required">
                                                                    <option value="">Select Branch</option>
                                                                        <?php $sql = "SELECT * from branch";
                                                                        $query = $dbh->prepare($sql);
                                                                        $query->execute();
                                                                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                                        if($query->rowCount() > 0)
                                                                        {
                                                                           foreach($results as $result)
                                                                        {   ?>
                                                                    <option value="<?php echo htmlentities($result->Branch); ?>"><?php echo htmlentities($result->Branch); ?></option>
                                                                    <?php }} ?>
                                                                 </select>
                                                            </div>
                                                        </div> 
                                                        <br>

                                                        <div class="form-group">
                                                            <label for="password" class="col-sm-2 control-label">Upload Image</label>
                                                            <div class="col-sm-10">
                                                
                                                                <input type="file" name="uploadimage" class="form-control" id="uploadimg" accept="image/jpg, image/jpeg, image/png"  required="required" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="form-group mt-20">
                                                    		<div class="col-sm-offset-2 col-sm-10">
                                                            
                                                            <button type="submit" name="registration" class="btn btn-primary btn-labeled pull-right">REGISTRATION<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                    		</div>
                                                    	</div>
                                                        <a href="/teacher/teacher-login.php">Already Have An account?<i style="color:blue;">SIGN IN</i></a><BR><BR>
                                                        <a href="index.php"><i class="fa fa-home"></i> Home</a>
                                                    </form>

                                            

                                                 
                                                </div>
                                            </div>
                                            <!-- /.panel -->
                                            <p class="text-muted text-center"><small>NIIS Certificate Generation Management System</small></p>
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
