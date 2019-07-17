<?php
header('Content-Type: text/html; charset=utf-8');
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
session_start();

if (!$_SESSION["UserID"]) {
    Header("Location: form_login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>CDPCM</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css" />

    <!-- google icon and font -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit:100i,300,400,500">

    <!-- <link href="../assets/plugins/wizard/steps.css" rel="stylesheet"> -->
    <!--alerts CSS -->
    <!-- <link href="../assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"> -->

    <!-- datatables -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css" /> -->

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/app.css" rel="stylesheet">

    <!-- You can change the theme colors from here -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
</head>

<body class="fix-header card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light" style="margin-left: 10px">

                <div class="d-flex m-t-10 justify-content-start">
                    <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                        <div class="chart-text m-r-10">
                            <img src="../assets/images/logo.png" style="height: 40px;">
                        </div>
                    </div>
                </div>
                <span id="headerName">Cost of Disease Prevention and Control Program, Thailand (CDPCM Thailand) </span>
                <?php
                // echo session_id();
                // echo '<br>';
                // echo $_SESSION["UserID"];
                ?>
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item">
                            <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)">
                                <i class="mdi mdi-menu"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar">
            <div class="scroll-sidebar" style="margin-left: 10px">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li>
                            <a class="has-arrow" href="index.php" aria-expanded="false">
                                <i class="mdi mdi-file-find"></i>
                                <span class="hide-menu">สืบค้น</span>
                            </a>
                        </li>

                        <li>
                            <a class="has-arrow" href="form_input.php" aria-expanded="false">
                                <i class="mdi mdi-library-plus"></i>
                                <span class="hide-menu">เพิ่มข้อมูล</span>
                            </a>
                        </li>
                        <li>
                            <a class="has-arrow" href="form_report.php" aria-expanded="false">
                                <i class="mdi mdi-chart-bar"></i>
                                <span class="hide-menu">รายงาน</span>
                            </a>
                        </li>
                        <li>
                            <a class="has-arrow" href="form_profile.php" aria-expanded="false">
                                <i class="mdi mdi-account-circle"></i>
                                <span class="hide-menu">ข้อมูลส่วนตัว</span>
                            </a>
                        </li>
                        <li>
                            <a class="has-arrow" href="logout.php" aria-expanded="false">
                                <i class="mdi mdi-logout"></i>
                                <span class="hide-menu">logout</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper">
            <div style="padding: 10px">
                <div class="row page-titles">

                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-4">
                                            <img src="https://images.pexels.com/photos/614810/pexels-photo-614810.jpeg?auto=format%2Ccompress&cs=tinysrgb&dpr=1&w=500" alt="" class="img-rounded img-responsive" />
                                        </div>
                                        <div class="col-sm-6 col-md-8">
                                            <h4>
                                                Admin Admin</h4>
                                            <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                                                    </i></cite></small>
                                            <p>
                                                <i class="glyphicon glyphicon-envelope"></i>email@example.com
                                                <br />
                                                <i class="glyphicon glyphicon-globe"></i><a href="http://www.cgi.uru.ac.th">www.jquery2dotnet.com</a>
                                                <br />
                                                <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p>
                                            <!-- Split button -->
                                            <div class="btn-group">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- .right-sidebar -->
            </div>
            <footer class="footer"> © 2018 สำนักงานป้องกันควบคุมโรคที่ 2 จังหวัดพิษณุโลก </footer>
        </div>
    </div>

    <!-- <script src="../assets/plugins/jquery/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <!-- <script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap.min.js"></script>
    <!-- datatables -->
    <!-- <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script> -->

    <!-- slimscrollbar scrollbar JavaScript -->
    <!-- <script src="js/jquery.slimscroll.js"></script> -->
    <!--Wave Effects -->
    <!-- <script src="js/waves.js"></script> -->
    <!--Menu sidebar -->
    <!-- <script src="js/sidebarmenu.js"></script> -->
    <!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!-- <script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script> -->
    <!--Custom JavaScript -->
    <script src="js/app_index.js"></script>
    <!-- <script src="../assets/plugins/moment/min/moment.min.js"></script> -->
    <!-- <script src="../assets/plugins/wizard/jquery.steps.min.js"></script>
    <script src="../assets/plugins/wizard/jquery.validate.min.js"></script> -->
    <!-- Sweet-Alert  -->
    <!-- <script src="../assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script> -->
</body>

</html>