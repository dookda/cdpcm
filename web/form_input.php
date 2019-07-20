<?php
    header('Content-Type: text/html; charset=utf-8');
    header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
    session_start();    

    if (isset($_SESSION["UserID"])) {
        // echo "<script>console.log('".$_SESSION["User"]."')</script>";
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
    <link href="../assets/plugins/wizard/steps.css" rel="stylesheet">
    <!--alerts CSS -->
    <link href="../assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/app.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
</head>

<script>
    if (window.File && window.FileReader && window.FileList && window.Blob) {
        function showFile() {
            var preview = document.getElementById('show-text');
            var file = document.querySelector('input[type=file]').files[0];
            var reader = new FileReader()

            var textFile = /text.*/;

            if (file.type.match(textFile)) {
                reader.onload = function(event) {
                    // preview.innerHTML = event.target.result;
                    console.log(event.target.result)
                }
            } else {
                preview.innerHTML = "<span class='error'>It doesn't seem to be a text file!</span>";
            }
            reader.readAsText(file);
        }
    } else {
        alert("Your browser is too old to support HTML5 File API");
    }
</script>

<body class="fix-header card-no-border logo-center">
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
                <span id="headerName">Cost of Disease Prevention and Control Program, Thailand (CDPCM Thailand)</span>
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
                        <!-- <li>
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
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>นำเข้าข้อมูล</h4>
                            <input type="file" onchange="showFile()">
                            </header>
                            <div id="show-text"></div>

                        </div>
                    </div>

                    <form id="inputData" onsubmit="return false">
                        <!-- Step 1 -->
                        <div class="card">
                            <div class="card-body">
                                <h3>Study background</h3>
                                <!-- <section> -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="disea_gr">โรค (Disease) :</label>
                                            <select class="custom-select form-control required" id="disea_gr" name="disea_gr" required>
                                                <option value="">เลือก</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="disea_sgrp">DISEA_SGRP :</label>
                                            <select class="custom-select form-control required" id="disea_sgrp" name="disea_sgrp" required>
                                                <option value="">เลือก</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="title">ชื่อการศึกษา (Study title) :</label>
                                            <input type="text" class="form-control required" id="title" name="title" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="author">ผู้ศึกษา (Author’s name) :</label>
                                            <input type="text" class="form-control required" id="author" name="author" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="std_area">จังหวัดที่ศึกษา (Study area) :</label>
                                            <input type="text" class="form-control required" id="std_area" name="std_area" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="objective">วัตถุประสงค์ของการศึกษา (Objective of study) :</label>
                                            <input type="text" class="form-control required" id="objective" name="objective" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="cost_design">COST_Design :</label>
                                            <select class="custom-select form-control required" id="cost_design" name="cost_design" required>
                                                <option value="">เลือก</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="abstracts">บทคัดย่อ (Abstract) :</label>
                                            <textarea type="shortDescription" class="form-control required" rows="10" id="abstracts" name="abstracts" required></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- </section> -->
                        <!-- Step 2 -->
                        <div class="card">
                            <div class="card-body">
                                <h3>Details of study</h3>
                                <!-- <section> -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="year_pub">ปีที่ตีพิมพ์ (Publish year) :</label>
                                            <select class="custom-select form-control required" id="year_pub" name="year_pub" required>
                                                <option value="">เลือก</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="orig_link">Oiginal source (Web link, if available) :</label>
                                            <input type="text" class="form-control required" id="orig_link" name="orig_link" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="std_year">ปีที่ศึกษา (Study year) :</label>
                                            <input type="text" class="form-control required" id="std_year" name="std_year" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="std_design">รูปแบบการศึกษา (Study design) :</label>
                                            <select class="custom-select form-control required" id="std_design" name="std_design" required>
                                                <option value="">เลือก</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="samp_area">พื้นที่ศึกษา (Study area) :</label>
                                            <input type="text" class="form-control required" id="samp_area" name="samp_area" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="samp_size">ขนาดตัวอย่าง (Sample size) :</label>
                                            <input type="text" class="form-control required" id="samp_size" name="samp_size" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="samp_meth">วิธีการสุ่มตัวอย่าง (Sampling method) :</label>
                                            <input type="text" class="form-control required" id="samp_meth" name="samp_meth" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="missing">Missing data :</label>
                                            <input type="text" class="form-control required" id="missing" name="missing" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="pub_type">แหล่งที่เผยแพร่ (Publish type) :</label>
                                            <select class="custom-select form-control required" id="pub_type" name="pub_type" required>
                                                <option value="">เลือก</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- </section> -->
                        <!-- Step 3 -->

                        <!-- <section> -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h3>Cost of study</h3>
                                        <div class="form-group">
                                            <label for="srvOffType">หน่วยให้บริการสาธารณสุข :</label>
                                            <select class="custom-select form-control required" id="srvOffType" name="srvofftype" required>
                                                <option value="">เลือก</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="activity0">ชื่อกลุ่มประเภทการให้บริการ :</label>
                                            <select class="custom-select form-control required" id="grpName" name="grpname" required>
                                                <option value="">เลือก</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="activity1">รายการการให้บริการ :</label>
                                            <select class="custom-select form-control required" id="item" name="item" required>
                                                <option value="">เลือก</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="type_cost0">ที่มาต้นทุน (Direct/Indirect) :</label>
                                            <select class="custom-select form-control required" id="type_cost0" name="type_cost0" required>
                                                <option value="">เลือก</option>
                                                <option value="Customer">Direct</option>
                                                <option value="Provider">Indirect</option>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="type_cost1">Sub type of costing :</label>
                                            <input type="text" class="form-control required" id="type_cost1" name="type_cost1" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="perspect">มุมมองของต้นทุน (Customer/Provider/Purchaser/Society) :</label>
                                            <select class="custom-select form-control required" id="perspect" name="perspect" required>
                                                <option value="">เลือก</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="time_unit">หน่วยเวลาที่วัด (Time unit of cost analysis) :</label>
                                            <select class="custom-select form-control required" id="time_unit" name="time_unit" required>
                                                <option value="">เลือก</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="perso_unit">หน่วยรับบริการ (Customer unit (person/group/Oth) :</label>
                                            <select class="custom-select form-control required" id="perso_unit" name="perso_unit" required>
                                                <option value="">เลือก</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="cost_thb">ราคาต้นทุน (บาท) :</label>
                                            <input type="number" step="any" class="form-control required" id="cost_thb" name="cost_thb" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="remark">หมายเหตุ :</label>
                                            <textarea type="text" class="form-control required" rows="4" id="remark" name="remark"></textarea>
                                        </div>
                                        <p></p>
                                        <p>
                                            <button type="submit" id="sendForm" class="btn btn-primary">บันทึกข้อมูล</button>
                                            <p></p>
                                    </div>
                                </div>
                            </div>
                    </form>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3>Reference</h3> (ที่มา:โปรแกรมรายการต้นทุนมาตรฐานเพื่อการประเมินเทคโนโลยีด้านสุขภาพ)
                                <div class="form-group">
                                    <label for="unit">หน่วยนับ :</label>
                                    <input type="text" class="form-control required" id="unit">
                                    <!-- <select id="unit" class="custom-select form-control required">
                                        <option value="">เลือก</option>
                                    </select> -->
                                </div>

                                <div class="form-group">
                                    <label for="rvu">ค่าต้นทุนต่อหนึ่งหน่วยต้นทุนสัมพัทธ์ :</label>
                                    <input type="text" class="form-control required" id="rvu">
                                    <!-- <select id="rvu" class="custom-select form-control required">
                                        <option value="">เลือก</option>
                                    </select> -->
                                </div>

                                <div class="form-group">
                                    <label for="genhos">ค่าต้นทุนต่อหนึ่งหน่วยบริการใน รพ.ทั่วไป/รพ.ศูนย์ :</label>
                                    <input type="text" class="form-control required" id="genhos">
                                    <!-- <select id="GenHos" class="custom-select form-control required">
                                        <option value="">เลือก</option>
                                    </select> -->
                                </div>

                                <div class="form-group">
                                    <label for="commhos">ค่าต้นทุนต่อหนึ่งหน่วยบริการใน รพ.ชุมชน :</label>
                                    <input type="text" class="form-control required" id="commhos">
                                    <!-- <select id="CommHos" class="custom-select form-control required">
                                        <option value="">เลือก</option>
                                    </select> -->
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
                <!-- </section> -->
            </div>
        </div>
    </div>
    </div>
    <!-- .right-sidebar -->
    </div>
    <footer class="footer"> © 2019 dpc2 phitsanulok</footer>
    </div>
    </div>

    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/app-input.js"></script>
</body>

</html>