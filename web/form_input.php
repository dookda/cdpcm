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
                            <a class="has-arrow" href="index.html" aria-expanded="false">
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

                    <!-- <h1>You are Administrator </h1>
                    <p><strong>hi</strong> :&nbsp; -->

                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body wizard-content">
                            <h4 class="card-title">กรอกข้อมูล</h4>
                            <h6 class="card-subtitle">(บรรยายรายละเอียดของข้อมูลที่จะให้กรอก) </h6>
                            <form action="#" class="validation-wizard wizard-circle" id="inputData">
                                <!-- Step 1 -->
                                <h6>Study background</h6>
                                <section>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="disea_gr">โรค (Disease) :</label>
                                                <select class="custom-select form-control required" id="disea_gr" name="disea_gr">
                                                    <option value="">เลือก</option>
                                                    <option value="NATI">NATI</option>
                                                    <option value="CD">CD</option>
                                                    <option value="SALT">SALT</option>
                                                    <option value="EnOcc">EnOcc</option>
                                                    <option value="ไม่ระบุ">ไม่ระบุ</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="disea_sgrp">DISEA_SGRP :</label>
                                                <select class="custom-select form-control required" id="disea_sgrp" name="disea_sgrp">
                                                    <option value="">เลือก</option>
                                                    <option value="DM">DM</option>
                                                    <option value="HT">HT</option>
                                                    <option value="Stroke">Stroke</option>
                                                    <option value="CVD">CVD</option>
                                                    <option value="CKD">CKD</option>
                                                    <option value="Smoking">Smoking</option>
                                                    <option value="Injury">Injury</option>
                                                    <option value="Drowning">Drowning</option>
                                                    <option value="Dengue">Dengue</option>
                                                    <option value="Malaria">Malaria</option>
                                                    <option value="Diarrhea">Diarrhea</option>
                                                    <option value="Hepatitis">Hepatitis</option>
                                                    <option value="Immunization">Immunization</option>
                                                    <option value="Hand Food and Mouth">Hand Food and Mouth</option>
                                                    <option value="STI">STI</option>
                                                    <option value="AIDs">AIDs</option>
                                                    <option value="Leprosy">Leprosy</option>
                                                    <option value="TB">TB</option>
                                                    <option value="ไม่ระบุ">ไม่ระบุ</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="title">ชื่อการศึกษา (Study title) :</label>
                                                <input type="text" class="form-control required" id="title" name="title">
                                            </div>
                                            <div class="form-group">
                                                <label for="author">ผู้ศึกษา (Author’s name) :</label>
                                                <input type="text" class="form-control required" id="author" name="author">
                                            </div>
                                            <div class="form-group">
                                                <label for="std_area">จังหวัดที่ศึกษา (Study area) :</label>
                                                <input type="text" class="form-control required" id="std_area" name="std_area">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="objective">วัตถุประสงค์ของการศึกษา (Objective of study) :</label>
                                                <input type="text" class="form-control required" id="objective" name="objective">
                                            </div>
                                            <div class="form-group">
                                                <label for="cost_design">COST_Design :</label>
                                                <select class="custom-select form-control required" id="cost_design" name="cost_design">
                                                    <option value="">เลือก</option>
                                                    <option value="Cost Minimize Analysis (CMA)">Cost Minimize
                                                        Analysis (CMA)</option>
                                                    <option value="Cost Effectiveness Analysis (CEA)">Cost
                                                        Effectiveness Analysis (CEA)</option>
                                                    <option value="Cost Utility Analysis (CUA)">Cost Utility
                                                        Analysis (CUA)</option>
                                                    <option value="Cost Benefit Analysis (CBA)">Cost Benefit
                                                        Analysis (CBA)</option>
                                                    <option value="Unit Cost">Unit Cost</option>
                                                    <option value="Decision Analysis Model">Decision Analysis Model
                                                    </option>
                                                    <option value="ไม่ระบุ">ไม่ระบุ</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="abstracts">บทคัดย่อ (Abstract) :</label>
                                                <textarea type="shortDescription" class="form-control required" rows="10" id="abstracts" name="abstracts"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- Step 2 -->
                                <h6>Details of study</h6>
                                <section>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="year_pub">ปีที่ตีพิมพ์ (Publish year) :</label>
                                                <select class="custom-select form-control required" id="year_pub" name="year_pub">
                                                    <option value="">เลือก</option>
                                                    <option value="2017">2017 (2560)</option>
                                                    <option value="2016">2016 (2559)</option>
                                                    <option value="2015">2015 (2558)</option>
                                                    <option value="2014">2014 (2557)</option>
                                                    <option value="2013">2013 (2556)</option>
                                                    <option value="2012">2012 (2555)</option>
                                                    <option value="2011">2011 (2554)</option>
                                                    <option value="2010">2010 (2553)</option>
                                                    <option value="2009">2009 (2552)</option>
                                                    <option value="2008">2008 (2551)</option>
                                                    <option value="2007">2007 (2550)</option>
                                                    <option value="2006">2006 (2549)</option>
                                                    <option value="2005">2005 (2548)</option>
                                                    <option value="2004">2004 (2547)</option>
                                                    <option value="2003">2003 (2546)</option>
                                                    <option value="2002">2002 (2545)</option>
                                                    <option value="2001">2001 (2544)</option>
                                                    <option value="2000">2000 (2543)</option>
                                                    <option value="1999">1999 (2542)</option>
                                                    <option value="1998">1998 (2541)</option>
                                                    <option value="9999">ไม่ระบุ</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="orig_link">Oiginal source (Web link, if available) :</label>
                                                <input type="text" class="form-control required" id="orig_link" name="orig_link">
                                            </div>
                                            <div class="form-group">
                                                <label for="std_year">ปีที่ศึกษา (Study year) :</label>
                                                <input type="text" class="form-control required" id="std_year" name="std_year">
                                            </div>
                                            <div class="form-group">
                                                <label for="std_design">รูปแบบการศึกษา (Study design) :</label>
                                                <select class="custom-select form-control required" id="std_design" name="std_design">
                                                    <option value="">เลือก</option>
                                                    <option value="Retrospective">Retrospective</option>
                                                    <option value="Prospective">Prospective</option>
                                                    <option value="Cross-sectional">Cross-sectional</option>
                                                    <option value="Case-control">Case-control</option>
                                                    <option value="Cohort">Cohort</option>
                                                    <option value="Systematic Review">Systematic Review</option>
                                                    <option value="ไม่ระบุ">ไม่ระบุ</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="samp_area">พื้นที่ศึกษา (Study area) :</label>
                                                <input type="text" class="form-control required" id="samp_area" name="samp_area">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="samp_size">ขนาดตัวอย่าง (Sample size) :</label>
                                                <input type="text" class="form-control required" id="samp_size" name="samp_size">
                                            </div>
                                            <div class="form-group">
                                                <label for="samp_meth">วิธีการสุ่มตัวอย่าง (Sampling method) :</label>
                                                <input type="text" class="form-control required" id="samp_meth" name="samp_meth">
                                            </div>
                                            <div class="form-group">
                                                <label for="missing">Missing data :</label>
                                                <input type="text" class="form-control required" id="missing" name="missing">
                                            </div>
                                            <div class="form-group">
                                                <label for="pub_type">แหล่งที่เผยแพร่ (Publish type) :</label>
                                                <select class="custom-select form-control required" id="pub_type" name="pub_type">
                                                    <option value="">เลือก</option>
                                                    <option value="International Journal">International Journal
                                                    </option>
                                                    <option value="National Journal">National Journal</option>
                                                    <option value="Regional Journal">Regional Journal</option>
                                                    <option value="Thesis/Dissertation">Thesis/Dissertation</option>
                                                    <option value="Official Report">Official Report</option>
                                                    <option value="Research Report">Research Report</option>
                                                    <option value="ไม่ระบุ">ไม่ระบุ</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- Step 3 -->
                                <h6>Cost of study</h6>
                                <section>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="activity0">ชื่อกลุ่มประเภทการให้บริการ :</label>
                                                <input type="text" class="form-control required" id="activity0" name="activity0">
                                            </div>
                                            <div class="form-group">
                                                <label for="activity1">รายการการให้บริการ :</label>
                                                <input type="text" class="form-control required" id="activity1" name="activity1">
                                            </div>
                                            <div class="form-group">
                                                <label for="type_cost0">ที่มาต้นทุน (Direct/Indirect) :</label>
                                                <input type="text" class="form-control required" id="type_cost0" name="type_cost0">
                                            </div>
                                            <div class="form-group">
                                                <label for="type_cost1">Sub type of costing :</label>
                                                <input type="text" class="form-control required" id="type_cost1" name="type_cost1">
                                            </div>
                                            <div class="form-group">
                                                <label for="perspect">มุมมองของต้นทุน (Customer/Provider/Purchaser/Society) :</label>
                                                <select class="custom-select form-control required" id="perspect" name="perspect">
                                                    <option value="">เลือก</option>
                                                    <option value="Customer">Customer</option>
                                                    <option value="Provider">Provider</option>
                                                    <option value="Purchaser">Purchaser</option>
                                                    <option value="Society">Society</option>
                                                    <option value="ไม่ระบุ">ไม่ระบุ</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="time_unit">หน่วยเวลาที่วัด (Time unit of cost analysis) :</label>
                                                <select class="custom-select form-control required" id="time_unit" name="time_unit">
                                                    <option value="">เลือก</option>
                                                    <option value="Day">Day</option>
                                                    <option value="Week">Week</option>
                                                    <option value="Month">Month</option>
                                                    <option value="3-Months">3-Months</option>
                                                    <option value="4-Months">4-Months</option>
                                                    <option value="6-Months">6-Months</option>
                                                    <option value="Year">Year</option>
                                                    <option value="Time">Time</option>
                                                    <option value="Unit">Unit</option>
                                                    <option value="ไม่ระบุ">ไม่ระบุ</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="perso_unit">หน่วยรับบริการ (Customer unit (person/group/Oth) :</label>
                                                <select class="custom-select form-control required" id="perso_unit" name="perso_unit">
                                                    <option value="">เลือก</option>
                                                    <option value="Person">Person</option>
                                                    <option value="Group">Group</option>
                                                    <option value="ไม่ระบุ">ไม่ระบุ</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="cost_thb">ราคาต้นทุน (บาท) :</label>
                                                <input type="number" step="any" class="form-control required" id="cost_thb" name="cost_thb">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="perso_unit">หน่วยให้บริการสาธารณสุข :</label>
                                                <select class="custom-select form-control required" id="srvofftype" name="srvofftype">
                                                    <option value="">เลือก</option>
                                                    <option value="Hospital">Hospital</option>
                                                    <option value="HealthCenter">HealthCenter</option>
                                                    <option value="Logistics">Logistics</option>
                                                    <option value="Hospital(Comm)">Hospital(Comm)</option>
                                                    <option value="Hospital(General)">Hospital(General)</option>
                                                    <option value="ไม่ระบุ">ไม่ระบุ</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="perso_unit">กลุ่มประเภทการให้บริการ :</label>
                                                <select class="custom-select form-control required" id="sr_group" name="sr_group">
                                                    <option value="">เลือก</option>
                                                    <option value="กลุ่มที่ 1">กลุ่มที่ 1</option>
                                                    <option value="กลุ่มที่ 2">กลุ่มที่ 2</option>
                                                    <option value="กลุ่มที่ 3">กลุ่มที่ 3</option>
                                                    <option value="กลุ่มที่ 4">กลุ่มที่ 4</option>
                                                    <option value="กลุ่มที่ 5">กลุ่มที่ 5</option>
                                                    <option value="กลุ่มที่ 6">กลุ่มที่ 6</option>
                                                    <option value="กลุ่มที่ 7">กลุ่มที่ 7</option>
                                                    <option value="กลุ่มที่ 8">กลุ่มที่ 8</option>
                                                    <option value="กลุ่มที่ 9">กลุ่มที่ 9</option>
                                                    <option value="กลุ่มที่ 10">กลุ่มที่ 10</option>
                                                    <option value="กลุ่มที่ 11">กลุ่มที่ 11</option>
                                                    <option value="กลุ่มที่ 12">กลุ่มที่ 12</option>
                                                    <option value="กลุ่มที่ 13">กลุ่มที่ 13</option>
                                                    <option value="กลุ่มที่ 14">กลุ่มที่ 14</option>
                                                    <option value="กลุ่มที่ 15">กลุ่มที่ 15</option>
                                                    <option value="กลุ่มที่ 16">กลุ่มที่ 16</option>
                                                    <option value="ไม่ระบุ">ไม่ระบุ</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="perso_unit">ชื่อกลุ่มประเภทการให้บริการ :</label>
                                                <select class="custom-select form-control required" id="gr_name" name="gr_name">
                                                    <option value="">เลือก</option>
                                                    <option value="ค่าห้องและค่าอาหาร">ค่าห้องและค่าอาหาร</option>
                                                    <option value="ค่าบริการโลหิตและส่วนประกอบของโลหิต">
                                                        ค่าบริการโลหิตและส่วนประกอบของโลหิต</option>
                                                    <option value="ค่าตรวจวินิจฉัยทางเทคนิคการแพทย์และพยาธิวิทยา">
                                                        ค่าตรวจวินิจฉัยทางเทคนิคการแพทย์และพยาธิวิทยา</option>
                                                    <option value="ค่าตรวจวินิจฉัยและรักษาทางรังสีวิทยา">
                                                        ค่าตรวจวินิจฉัยและรักษาทางรังสีวิทยา</option>
                                                    <option value="ค่าตรวจวินิจฉัยโดยวิธีพิเศษอื่นๆ">
                                                        ค่าตรวจวินิจฉัยโดยวิธีพิเศษอื่นๆ</option>
                                                    <option value="ค่าอุปกรณ์ของใช้และเครื่องมือทางการแพทย์">
                                                        ค่าอุปกรณ์ของใช้และเครื่องมือทางการแพทย์</option>
                                                    <option value="ค่าทำหัตถการและวิสัญญี">ค่าทำหัตถการและวิสัญญี
                                                    </option>
                                                    <option value="ค่าบริการทางการพยาบาล">ค่าบริการทางการพยาบาล
                                                    </option>
                                                    <option value="ค่าบริการทางทันตกรรม">ค่าบริการทางทันตกรรม
                                                    </option>
                                                    <option value="ค่าบริการทางกายภาพบำบัดและทางเวชกรรมฟื้นฟู">
                                                        ค่าบริการทางกายภาพบำบัดและทางเวชกรรมฟื้นฟู</option>
                                                    <option value="ค่าบริการฝังเข็มและค่าบริการการให้การบำบัดของผู้ประกอบโรคศิลปะอื่น">
                                                        ค่าบริการฝังเข็มและค่าบริการการให้การบำบัดของผู้ประกอบโรคศิลปะอื่น
                                                    </option>
                                                    <option value="ค่าบริการด้านการสร้างเสริมสุขภาพและป้องกันโรค">
                                                        ค่าบริการด้านการสร้างเสริมสุขภาพและป้องกันโรค</option>
                                                    <option value="ต้นทุนบริการเภสัชกรรม">ต้นทุนบริการเภสัชกรรม
                                                    </option>
                                                    <option value="ต้นทุนสถานีอนามัย">ต้นทุนสถานีอนามัย</option>
                                                    <option value="ต้นทุน Logistic of Vaccine">ต้นทุน Logistic of
                                                        Vaccine</option>
                                                    <option value="ค่าต้นทุนที่ไม่ใช่ทางการแพทย์ (Non-Med)">
                                                        ค่าต้นทุนที่ไม่ใช่ทางการแพทย์ (Non-Med)</option>
                                                    <option value="ไม่ระบุ">ไม่ระบุ</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="perso_unit">ลำดับรหัสกลุ่มบริการ :</label>
                                                <select class="custom-select form-control required" id="itemid" name="itemid">
                                                    <option value="">เลือก</option>
                                                    <option value="Person">Person</option>
                                                    <option value="Group">Group</option>
                                                    <option value="ไม่ระบุ">ไม่ระบุ</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="perso_unit">รายการการให้บริการ :</label>
                                                <select class="custom-select form-control required" id="item" name="item">
                                                    <option value="">เลือก</option>
                                                    <option value="Person">Person</option>
                                                    <option value="Group">Group</option>
                                                    <option value="ไม่ระบุ">ไม่ระบุ</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="perso_unit">รหัสรายการ :</label>
                                                <select class="custom-select form-control required" id="itemcode" name="itemcode">
                                                    <option value="">เลือก</option>
                                                    <option value="Person">Person</option>
                                                    <option value="Group">Group</option>
                                                    <option value="ไม่ระบุ">ไม่ระบุ</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="perso_unit">หน่วยนับ :</label>
                                                <select class="custom-select form-control required" id="unit" name="unit">
                                                    <option value="">เลือก</option>
                                                    <option value="ครั้ง">ครั้ง </option>
                                                    <option value="วัน">วัน </option>
                                                    <option value="Test">Test </option>
                                                    <option value="ยูนิต">ยูนิต </option>
                                                    <option value="set">set </option>
                                                    <option value="Test ">Test  </option>
                                                    <option value="ราย">ราย </option>
                                                    <option value="ชิ้น">ชิ้น </option>
                                                    <option value="Slide">Slide </option>
                                                    <option value="สี">สี </option>
                                                    <option value="ครั้ง">ครั้ง </option>
                                                    <option value="film">film </option>
                                                    <option value="ภาพ">ภาพ </option>
                                                    <option value="50 ml.">50 ml. </option>
                                                    <option value="15 ml.">15 ml. </option>
                                                    <option value="Vial">Vial </option>
                                                    <option value="Field">Field </option>
                                                    <option value="Course">Course </option>
                                                    <option value="Area">Area </option>
                                                    <option value="ครั้ง/คืน">ครั้ง/คืน </option>
                                                    <option value="ต่อเส้น/ต่อครั้ง">ต่อเส้น/ต่อครั้ง </option>
                                                    <option value="limb ">limb  </option>
                                                    <option value="ต่อเส้น/ต่อครั้ง ">ต่อเส้น/ต่อครั้ง  </option>
                                                    <option value="ครั้ง/ข้าง">ครั้ง/ข้าง </option>
                                                    <option value="ตลอดการรักษา">ตลอดการรักษา </option>
                                                    <option value="ชั่วโมง">ชั่วโมง </option>
                                                    <option value="8 ชม.">8 ชม. </option>
                                                    <option value="ครั้ง/วัน">ครั้ง/วัน</option>
                                                    <option value="เครื่อง">เครื่อง </option>
                                                    <option value="ครั้ง ">ครั้ง  </option>
                                                    <option value="ครั้งแรก">ครั้งแรก </option>
                                                    <option value="ครั้งต่อไปของข้างเดียวกัน">
                                                        ครั้งต่อไปของข้างเดียวกัน </option>
                                                    <option value="สาขา">สาขา </option>
                                                    <option value="ครั้ง (visit)">ครั้ง (visit) </option>
                                                    <option value="แผล">แผล </option>
                                                    <option value="เข็ม">เข็ม </option>
                                                    <option value="ซี่">ซี่ </option>
                                                    <option value="ตำแหน่ง">ตำแหน่ง </option>
                                                    <option value="Arch">Arch </option>
                                                    <option value="ช่อง">ช่อง </option>
                                                    <option value="ทั้งปาก">ทั้งปาก </option>
                                                    <option value="Qualdant">Qualdant </option>
                                                    <option value="?ตำแหน่ง">?ตำแหน่ง </option>
                                                    <option value="Unit">Unit </option>
                                                    <option value="คู่">คู่ </option>
                                                    <option value="คน/ครั้ง/กลุ่ม">คน/ครั้ง/กลุ่ม </option>
                                                    <option value="เดือนละ">เดือนละ </option>
                                                    <option value="45 นาที">45 นาที </option>
                                                    <option value="ใบสั่ง">ใบสั่ง </option>
                                                    <option value="visit ">visit  </option>
                                                    <option value="คน">คน </option>
                                                    <option value="ร้าน">ร้าน </option>
                                                    <option value="Dose">Dose</option>
                                                    <option value="ไม่ระบุ">ไม่ระบุ</option>
                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <label for="cost_thb">ค่าต้นทุนต่อหนึ่งหน่วยต้นทุนสัมพัทธ์ :</label>
                                                <input type="number" step="any" class="form-control required" id="rvu" name="rvu">
                                            </div>

                                            <div class="form-group">
                                                <label for="cost_thb">ค่าต้นทุนต่อหนึ่งหน่วยบริการใน รพ.ทั่วไป/รพ.ศูนย์ :</label>
                                                <input type="number" step="any" class="form-control required" id="genhos" name="genhos">
                                            </div>

                                            <div class="form-group">
                                                <label for="cost_thb">ค่าต้นทุนต่อหนึ่งหน่วยบริการใน รพ.ชุมชน :</label>
                                                <input type="number" step="any" class="form-control required" id="commhos" name="commhos">
                                            </div>

                                            <div class="form-group">
                                                <label for="remark">หมายเหตุ :</label>
                                                <textarea type="text" class="form-control required" rows="4" id="remark" name="remark"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </form>
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
    <script src="../assets/plugins/moment/min/moment.min.js"></script>
    <script src="../assets/plugins/wizard/jquery.steps.min.js"></script>
    <script src="../assets/plugins/wizard/jquery.validate.min.js"></script>
    <!-- Sweet-Alert  -->
    <script src="../assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>