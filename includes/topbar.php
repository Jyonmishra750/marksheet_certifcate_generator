<?php
session_start();
error_reporting(0);
include('includes/config.php');
$conn = mysqli_connect('localhost','root','','niis_db'); 
?>



<nav class="navbar top-navbar bg-white box-shadow">
            	<div class="container-fluid">
                    <div class="row">
                        <div class="navbar-header no-padding">
                			<a class="navbar-brand" href="dashboard.php">
                			    GENCERT-NIIS | Admin
                			</a>
                            <span class="small-nav-handle hidden-sm hidden-xs"><i class="fa fa-outdent"></i></span>
                			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                				<span class="sr-only">Toggle navigation</span>
                				<i class="fa fa-ellipsis-v"></i>
                			</button>
                            <button type="button" class="navbar-toggle mobile-nav-toggle" >
                				<i class="fa fa-bars"></i>
                			</button>
                		</div>
                        <!-- /.navbar-header -->

						<?php
							// $ps_count=mysqli_query($conn, "SELECT COUNT(status) as total FROM student WHERE status='pending';");
							// $pt_count=mysqli_query($conn, "SELECT COUNT(status) as total FROM teacher WHERE status='pending';");
							// $pr=mysqli_fetch_assoc($ps_count);
							
						?>


                		<div class="collapse navbar-collapse" id="navbar-collapse-1">
                			<ul class="nav navbar-nav" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                <li class="hidden-sm hidden-xs"><a href="#" class="user-info-handle"><i class="fa fa-user"></i></a></li>
                                <li class="hidden-sm hidden-xs"><a href="#" class="full-screen-handle"><i class="fa fa-arrows-alt"></i></a></li>
                       
                				<li class="hidden-xs hidden-xs"><!--<a href="#">My Tasks</a> </li> -->
								
                			</ul>
                            <!-- /.nav navbar-nav -->

                			<ul class="nav navbar-nav navbar-right" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
									<!-- <li><a href="requests.php" class="text-center"><i class="fa fa-users fa-lg" aria-hidden="true"></i><sub style="font-weight:bold; font-size:larger; color:red;"><?php //echo $pr['total'];?></sub></a></li> -->
									<!--<li><a href="notifications.php" class="text-center"><i class="fa fa-bell">Notifications</i></a></li>-->
                					<li><a href="logout.php" class="color-danger text-center"><i class="fa fa-sign-out"></i> Logout</a></li>
                			</ul>
                            <!-- /.nav navbar-nav navbar-right -->
                		</div>
                		<!-- /.navbar-collapse -->
                    </div>
                    <!-- /.row -->
            	</div>
            	<!-- /.container-fluid -->
            </nav>
			