<?php
    header('Content-Type: text/html; charset=utf-8');
    header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
    session_start();    

    if (isset($_SESSION["UserID"])) {
        // echo "<script>console.log('".$_SESSION["User"]."')</script>";
        echo "<script>var usr = '" . $_SESSION['UserID'] . "'</script>";
    }else{
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap.min.css">

    <!-- google icon and font -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit:100i,300,400,500">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/app.css" rel="stylesheet">

    <!-- You can change the theme colors from here -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
</head>

<body class="fix-header card-no-border">
    <div>
        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
            </svg>
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
                    <span id="headerName">Cost of Disease Prevention and Control Program, Thailand (CDPCM Thailand)
                    </span>

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
                                <a class="has-arrow" href="./../index.html" aria-expanded="false">
                                    <i class="mdi mdi-file-find"></i>
                                    <span class="hide-menu">หน้าหลัก</span>
                                </a>
                            </li>
                            <li>
                                <a class="has-arrow" href="index.php" aria-expanded="false">
                                    <i class="mdi mdi-file-find"></i>
                                    <span class="hide-menu">สืบค้น </span>
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
                        <div class="col-10">
                            <div class="card ">
                                <div class="card-body" style="height: 100px;">
                                    <p>ค้นจากทุกขอบเขตเนื้อหาที่อยู่ในฐานข้อมูล</p>
                                    <input class="form-control" id="myInput" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="card">
                                <div class="card-body" style="height: 100px;">จำนวนข้อมูลที่พบ:
                                    <p>
                                        <h1 class="text-themecolor m-b-0 m-t-0" style="margin-left:40%;"> <span
                                                id='count'></span></h1>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-12 col-lg-12">
                                        <table id="table" class="table table-striped table-bordered display">
                                            <p></p>
                                            <thead>
                                                <tr>
                                                    <!-- <th>รายละเอียดเพิ่มเติม</th> -->
                                                    <th>
                                                        <h6>Id</h6>
                                                    </th>
                                                    <th>
                                                        <h6>Cluster</h6>
                                                    </th>
                                                    <th>
                                                        <h6>โรค</h6>
                                                    </th>
                                                    <th>
                                                        <h6>ชื่อการศึกษา</h6>
                                                    </th>
                                                    <th>
                                                        <h6>ผู้ศึกษา</h6>
                                                    </th>
                                                    <th>
                                                        <h6>จังหวัดที่ศึกษา</h6>
                                                    </th>
                                                    <!-- <th>Objective of study</th> -->
                                                    <th>
                                                        <h6>Economic evaluation model</h6>
                                                    </th>
                                                    <th>
                                                        <h6>ปีที่ตีพิมพ์</h6>
                                                    </th>
                                                    <th>
                                                        <h6>ปีที่ศึกษา</h6>
                                                    </th>
                                                    <th>
                                                        <h6>รูปแบบการศึกษา</h6>
                                                    </th>
                                                    <!-- <th>Study area</th> -->
                                                    <th>
                                                        <h6>ขนาดตัวอย่าง</h6>
                                                    </th>
                                                    <th>
                                                        <h6>วิธีการสุ่มตัวอย่าง</h6>
                                                    </th>
                                                    <!-- <th>Missing data </th> -->
                                                    <th>
                                                        <h6>แหล่งที่เผยแพร่</h6>
                                                    </th>
                                                    <th>
                                                        <h6>ชื่อกลุ่มประเภทการให้บริการ</h6>
                                                    </th>
                                                    <!-- <th>Sub activity</th> -->
                                                    <!-- <th>Type of costing</th> -->
                                                    <!-- <th>Sub type of costing</th> -->
                                                    <th>
                                                        <h6>มุมมองของต้นทุน</h6>
                                                    </th>
                                                    <th>
                                                        <h6>หน่วยเวลาที่วัด</h6>
                                                    </th>
                                                    <th>
                                                        <h6>หน่วยรับบริการ</h6>
                                                    </th>
                                                    <th>
                                                        <h6>ราคาต้นทุน (บาท)</h6>
                                                    </th>
                                                    <!-- <th>Remark</th> -->
                                                </tr>
                                            </thead>
                                            <!-- <tbody>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td>Edinburgh</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td>$320,800</td>
                                            </tr>
                                        </tbody> -->
                                        </table>
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

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="row" id='da'>
                                <!-- <div ></div> -->
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- <script src="../assets/plugins/jquery/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>

    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!-- <script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script> -->
    <!--Custom JavaScript -->
    <script src="js/app_index.js"></script>
</body>

</html>