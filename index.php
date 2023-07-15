<?php
    error_reporting(0);
    include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Welcome To NIIS Institute of Info Science and Management</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">GENCERT-NIIS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <li class="nav-item"><a class="nav-link active" href="admin/admin-login.php">Admin</a></li>
                    <li class="nav-item"><a class="nav-link active" href="teacher/teacher-login.php">Teacher</a></li>
                    <li class="nav-item"><a class="nav-link active" href="student/student-login.php">Student</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header - set the background image for the header in the line below-->
    <header class="py-5 bg-image-full" style="background-image: url('images/niiscollege.jpg')">

    </header>
    <!-- Content section-->
    <section class="py-5">
        <div class="container my-4">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2>News and Updates</h2>
                    <hr color="#000" />
                    <marquee direction="up" scrollamount="3" onmouseover="this.stop();" onmouseout="this.start();">
                        <ul>
                            <?php $sql = "SELECT * from tblnotice";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {   ?>
                                    <li><a href="notice-details.php?nid=<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->noticeTitle); ?></li>
                            <?php }
                            } ?>

                        </ul>
                        <ul>
                            <?php $sql = "SELECT * from tblnoticeteacher";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {   ?>
                                    <li><a href="teacher/notice-details-teacher.php?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->noticeTitle); ?></li>
                            <?php }
                            } ?>

                        </ul>
                    </marquee>

                </div>
            </div>
        </div>
    </section>


    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container" style="color: white; text-align:center;">
            <h3 style="color: brown;">Contact Us</h3>
            <br>
            <span>Mob no. :</span><span>&nbsp;7606097028</span><br>
            <span>Telephone no. :</span><span>&nbsp;0620-752054</span><br>
            <span>E-mail:</span><span>&nbsp;jaishreeram0619@gmail.com</span><br>
            <span>Sarada Vihar, Madanpur, Bhubaneswar, Khurda, Odisha, 752054</span><br>
            <br><br>
            <p>Copyright &copy; GENCERT-NIIS <?php echo date('Y'); ?> </p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>