<?php
session_start();
error_reporting(0);
include('includes/config.php');
$conn = mysqli_connect('localhost','root','','niis_db');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{

        
    $email=$_SESSION['email'];
    $sql = "SELECT * from teacher WHERE Email='$email';";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);

    if($query->rowCount() > 0)
    {
        foreach($results as $result)
        {  

    
        }
    }
//$emailid=$_SESSION['alogin'];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Teacher Update Profile</title>
        <link rel="stylesheet" href="css/bootstrap.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
        <script type="text/javascript"></script>
         <style>
            .errorWrap 
            {
                padding: 10px;
                margin: 0 0 20px 0;
                background: #fff;
                border-left: 4px solid #dd3d36;
                -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
                box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            }
            .succWrap
            {
                padding: 10px;
                margin: 0 0 20px 0;
                background: #fff;
                border-left: 4px solid #5cb85c;
                -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
                box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            }
        </style>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">
            <?php include('includes/topbar-teacher.php');?>   
            <div class="content-wrapper">
                <div class="content-container">
<?php include('includes/leftbar-teacher.php');?>                   
 <!-- /.left-sidebar -->

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Update Profile</h2>
                                </div>
                                
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="/teacher/dashboard-teacher.php"><i class="fa fa-home"></i> Home</a></li>
            						
            							<li class="active">Update Profile</li>
            						</ul>
                                </div>
                               
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                             

                              

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h4>Teacher Update Profile</h4>
                                                    <h5><small>*Note: After updating your emailid you have to login again with your new Email id and password</small></h5>
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
  
                                            <div class="panel-body">

                                                <form action="/service/update-teacher-profile_database.php" name="updateprofile" method="POST" enctype="multipart/form-data">

                                                <div class="form-group has-success">
                                                        <label for="success" class="control-label">Teacher ID</label>
                                                		<div class="">
                                                            <input type="text" name="teacherid" class="form-control" required="required" id="success" value="<?php //echo htmlentities($result->id);?>">
                                                      
                                                		</div>
                                                </div>
                                               
                                                <div class="form-group has-success">
                                                        <label for="success" class="control-label">Name</label>
                                                		<div class="">
                                                            <input type="text" name="chngname" class="form-control" required="required" id="success" value="<?php echo htmlentities($result->FullName);?>">
                                                      
                                                		</div>
                                                </div>
                                                <div class="form-group has-success">
                                                        <label for="success" class="control-label">User Name</label>
                                                		<div class="">
                                                            <input type="text" name="chngusername" value="<?php echo htmlentities($result->UserName);?>" class="form-control" required="required" id="success">
                                                      
                                                		</div>
                                                </div>
                                                <div class="form-group has-success">
                                                        <label for="success" class="control-label">Email</label>
                                                		<div class="">
                                                        <input type="text" name="chngemailid" value="<?php echo htmlentities($result->Email);?>" class="form-control" required="required" id="success">
                                                      
                                                	</div>
                                                    
                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Mobile No</label>
                                                        <div class="">
                                                            <input type="text" name="chngmob" value="<?php echo htmlentities($result->MobileNo);?>" required="required" maxlength="10" class="form-control" id="success">
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group has-success">
                                                        <label for="success" class="control-label">Branch</label>
                                                        <div class="">
                                                            <select name="branch" class="form-control" id="default">
                                                            <option value=""><?php /*echo htmlentities($result->Branch);?></option>
                                                                    <?php $sql = "SELECT * from branch";
                                                                        $query = $dbh->prepare($sql);
                                                                        $query->execute();
                                                                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                                        if($query->rowCount() > 0)
                                                                        {
                                                                           foreach($results as $result)
                                                                        {   ?>
                                                                    <option value="<?php echo ($result->Branch); ?>"><?php echo ($result->Branch); ?> </option>
                                                                    <?php }}*/ ?>
                                                            </select>
                                                        </div>
                                                    </div>  -->
                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Update Profile Picture</label>
                                                        <div class="">
                                                            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="form-control" id="success">
                                                            <input type="hidden" name="image_old" value="<?php echo "uploaded_images_teacher/".$result->image;?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success">

                                                        <div class="">
                                                            <button type="submit" name="updateteacher" class="btn btn-success btn-labeled">Update<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                    </div>


                                                    
                                                </form>

                                              
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-8 col-md-offset-2 -->
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
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>



        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
<?php  } ?>
