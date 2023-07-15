<div class="left-sidebar bg-black-300 box-shadow ">
                        <div class="sidebar-content">
                            <div class="user-info closed">
                                <img src="http://placehold.it/90/c2c2c2?text=User" alt="John Doe" class="img-circle profile-img">
                                <h6 class="title">Admin</h6>
                                <small class="info">Administrator</small>
                            </div>

                            <!-- /.user-info -->
                        

                            <div class="sidebar-nav">
                                <ul class="side-nav color-gray">
                                    <li class="nav-header">
                                        <span class="">Main Category</span>
                                    </li>
                                    <li>
                                        <a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span> </a>
                                     
                                    </li>

                                    <li class="nav-header">
                                        <span class="">Appearance</span>
                                    </li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-mortar-board"></i> <span>Branches</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            
                                            <li><a href="manage-branch.php"><i class="fa fa fa-server"></i> <span>Manage Branchs</span></a></li>
                                        </ul>
                                    </li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-book"></i> <span>Subjects</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="manage-subjects.php"><i class="fa fa fa-server"></i> <span>Manage Subjects</span></a></li>
                                            <a href="manage-subjectcombination.php"><i class="fa fa-newspaper-o"></i> <span>Manage Subject Combination </span></a></li>
                                        </ul>
                                    </li>
                                    <li class="has-children">
                                        <?php
                                            $ps_count=mysqli_query($conn, "SELECT COUNT(status) as total FROM student WHERE status='pending';");
                                            $ps=mysqli_fetch_assoc($ps_count);
						                ?>
                                        <a href="#"><i class="fa fa-users"></i> <span>Students</span>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <b style="font-weight:bold; font-size:larger; color:red;"><?php echo $ps['total'];?></b> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="manage-students.php"><i class="fa fa fa-server"></i> <span>Manage Students</span></a></li>
                                            <li><a href="student-requests.php"><i class="fa fa fa-server"></i> <span>Student Requests</span>&emsp;<b style="font-weight:bold; font-size:larger; color:red;"><?php echo $ps['total'];?></b></a></li>
                                        </ul>
                                    </li>
                                    <li class="has-children">
                                        <?php
                                            $pt_count=mysqli_query($conn, "SELECT COUNT(status) as total FROM teacher WHERE status='pending';");
                                            $pt=mysqli_fetch_assoc($pt_count);
						                ?>
                                        <a href="#"><i class="fa fa-users"></i> <span>Teachers</span>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <b style="font-weight:bold; font-size:larger; color:red;"><?php echo $pt['total'];?></b><i class="fa fa-angle-right arrow"></i></a>
                                        
                                        <ul class="child-nav">
                                            <li><a href="manage-teachers.php"><i class="fa fa fa-server"></i> <span>Manage Teachers</span></a></li>
                                            <li><a href="teacher-requests.php"><i class="fa fa fa-server"></i> <span>Teacher Requests</span>&emsp;<b style="font-weight:bold; font-size:larger; color:red;"><?php echo $pt['total'];?></b></a></li>
                                        </ul>
                                    </li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-info-circle"></i> <span>Result</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="manage-results.php"><i class="fa fa fa-server"></i> <span>Manage Result</span></a></li>
                                        </ul>        
                                    </li>


                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-bell"></i> <span>Notices</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="add-notice.php"><i class="fa fa-bars"></i> <span>Add Notice</span></a></li>
                                            <li><a href="manage-notices.php"><i class="fa fa fa-server"></i> <span>Manage Notices</span></a></li>   
                                        </ul>        
                                    </li>

                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-envelope"></i> <span>Send EMail</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="send-email-individual-teacher.php"><i class="fa fa fa-server"></i> <span>Send Mail to Individual</span></a></li>
                                            <li><a href="send-email-student.php"><i class="fa fa fa-server"></i> <span>Send Mail to Students</span></a></li>
                                            <li><a href="send-email-teacher.php"><i class="fa fa fa-server"></i> <span>Send Mail to Teachers</span></a></li> 
                                        </ul>        
                                    </li>

                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-bell"></i> <span>Notifications</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                        <li><a href="add-notification-teacher.php"><i class="fa fa fa-bell"></i> <span> Send Notifications</span></a></li>
                                            <li><a href="manage-notifications-teacher.php"><i class="fa fa fa-server"></i> <span>Manage Notifications</span></a></li>   
                                        </ul>        
                                    </li>

                                    <li><a href="change-password.php"><i class="fa fa fa-server"></i> <span> Admin Change Password</span></a></li>
                                           
                            
                            </div>
                            <!-- /.sidebar-nav -->
                        </div>
                        <!-- /.sidebar-content -->
                    </div>