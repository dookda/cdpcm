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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
        integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
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
                            <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                                href="javascript:void(0)">
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
                            <a class="has-arrow" href="index.html" aria-expanded="false">
                                <i class="mdi mdi-file-find"></i>
                                <span class="hide-menu">สืบค้น</span>
                            </a>
                        </li>

                        <!-- <li>
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
                        </li> -->
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
                            <div class="col-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>เพิ่มผู้ใช้งานระบบ</h4><br />
                                        <button id="addUser" class="btn btn-success">เพิ่มผู้ใช้งาน</button>
                                        <hr>
                                        <h4>รายชื่อ user ผู้เข้าใช้งาน</h4>
                                        <!-- <div id="container" style="width: 100%; height: 400px; margin: 0 auto"></div> -->
                                        <table id="user" class="table table-striped table-bordered display"
                                            cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <h6>username</h6>
                                                    </th>
                                                    <th>
                                                        <h6>password</h6>
                                                    </th>
                                                    <th>
                                                        <h6>First name</h6>
                                                    </th>
                                                    <th>
                                                        <h6>Last name</h6>
                                                    </th>
                                                    <th>
                                                        <h6>email</h6>
                                                    </th>
                                                    <th>
                                                        <h6>Delete</h6>
                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>

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

        <!-- add Modal -->
        <div class="modal fade" id="addModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body" style="padding:40px 50px;">
                        <form role="form">
                            <div class="form-group">
                                <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                                <input type="text" class="form-control" id="add_id_user">
                            </div>
                            <div class="form-group">
                                <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                <input type="text" class="form-control" id="add_id_pass">
                            </div>
                            <div class="form-group">
                                <label for="usrname"><span class="glyphicon glyphicon-user"></span> ชื่อ</label>
                                <input type="text" class="form-control" id="add_firstname">
                            </div>
                            <div class="form-group">
                                <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> นามสกุล</label>
                                <input type="text" class="form-control" id="add_lastname">
                            </div>
                            <div class="form-group">
                                <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> email</label>
                                <textarea type="email" class="form-control" id="add_pdesc"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" id="btnAddUsr" class="btn btn-success btn-block"
                                        data-dismiss="modal"><span class="glyphicon glyphicon-off"></span> ตกลง</button>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-danger btn-block" data-dismiss="modal"><span
                                            class="glyphicon glyphicon-remove"></span> ยกเลิก</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- remove modal -->
        <div class="modal fade" id="removeModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body" style="padding:40px 50px;">
                        <form role="form">
                            <h5>คุณต้องการลบ:</h5>
                            id: <span id="rm_id"></span><br>
                            id_user: <span id="rm_id_user"></span><br>
                            firstname: <span id="rm_firstname"></span><br>
                            lastname: <span id="rm_lastname"></span><br>
                            <p></p>
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" id="btnYesDel" class="btn btn-success btn-block"
                                        data-dismiss="modal"><span class="glyphicon glyphicon-ok"></span> ตกลง</button>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-danger btn-block" data-dismiss="modal"><span
                                            class="glyphicon glyphicon-remove"></span> ยกเลิก</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- <script src="../assets/plugins/jquery/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap.min.js"></script>
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="js/app_admin.js"></script>
</body>

</html>