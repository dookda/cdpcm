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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css" />

    <!-- google icon and font -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit:100i,300,400,500">

    <!-- Leafletjs -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />

    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>

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
                            <a class="has-arrow" href="./../index.html" aria-expanded="false">
                                <i class="mdi mdi-file-find"></i>
                                <span class="hide-menu">หน้าหลัก</span>
                            </a>
                        </li>
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

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <select id="selFld"></select> -->
                                        <div id="countChart" style="width: 100%; height: 400px; margin: 0 auto"></div>
                                        <!-- <div id="chart2" style="width: 100%; height: 400px; margin: 0 auto"></div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <select id="selFld"></select> -->
                                        <div id="sumChart" style="width: 100%; height: 400px; margin: 0 auto"></div>
                                        <!-- <div id="chart2" style="width: 100%; height: 400px; margin: 0 auto"></div> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <label for="sel1">แผนที่:</label>
                                        <p></p>
                                        <!-- <select class="form-control" id="selDisea">
                                            <option value="Stroke">Stroke</option>
                                            <option value="Smoking">Smoking</option>
                                            <option value="HT">HT</option>
                                            <option value="Alcohol">Alcohol</option>
                                            <option value="CVD">CVD</option>
                                            <option value="DM">DM</option>
                                        </select> -->
                                        <div id="mapid" style="width:100%; height:800px;">
                                        </div>
                                        <script>
                                            var mymap = L.map('mapid').setView([13.40, 100.50], 6);

                                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                                maxZoom: 18,
                                                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                                            }).addTo(mymap);

                                            // Add Overlay WMS GeoServer
                                            var pct_sci = L.tileLayer.wms('http://www3.cgistln.nu.ac.th/geoserver/gistdata/wms?', {
                                                layers: 'gistdata:province',
                                                format: 'image/png',
                                                version: '1.3.0',
                                                transparent: true,
                                                tiled: false,
                                                opacity: 0.9
                                                //attribution: '&copy; <a href="http://www.gistnu.com">GISTNU</a>'
                                            }).addTo(mymap);
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <footer class="footer"> © 2018 สำนักงานป้องกันควบคุมโรคที่ 2 จังหวัดพิษณุโลก </footer>
        </div>
    </div>

    <!-- <script src="../assets/plugins/jquery/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap.min.js"></script>
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="js/app_report.js"></script>
</body>

</html>