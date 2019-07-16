<?php

header('Content-Type: text/html; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-alloworigin, access-control-allow-methods, access-control-allow-headers');
header('Content-Type: text/html; charset=utf-8');

require('../../lib/conn_cdpcm.php');
$dbconn = pg_connect($conn_) or die('Could not connect');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // $content = file_get_contents('php://input');
    // $dat = json_decode($content, true); 
    $disea_gr = $_POST['disea_gr'];
    $disea_sgrp = $_POST['disea_sgrp'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $std_area = $_POST['std_area'];
    $objective = $_POST['objective'];
    $cost_design = $_POST['cost_design'];
    $abstracts = $_POST['abstracts'];
    $year_pub = $_POST['year_pub'];
    $orig_link = $_POST['orig_link'];
    $std_year = $_POST['std_year'];
    $std_design = $_POST['std_design'];
    $samp_area = $_POST['samp_area'];
    $samp_size = $_POST['samp_size'];
    $samp_meth = $_POST['samp_meth'];
    $missing = $_POST['missing'];
    $pub_type = $_POST['pub_type'];
    // $activity0=$_POST['activity0'];  
    // $activity1=$_POST['activity1']; 
    $srvofftype = $_POST['srvOffType'];
    $activity1 = $_POST['grpName'];
    $activity1 = $_POST['item'];
    $type_cost0 = $_POST['type_cost0'];
    $type_cost1 = $_POST['type_cost1'];
    $perspect = $_POST['perspect'];
    $time_unit = $_POST['time_unit'];
    $perso_unit = $_POST['perso_unit'];
    $cost_thb = $_POST['cost_thb'];
    $remark = $_POST['remark'];

    // $srvofftype = $_POST['srvofftype'];
    // $sr_group = $_POST['sr_group'];
    // $gr_name = $_POST['gr_name'];
    // $itemid = $_POST['itemid'];
    // $item = $_POST['item'];
    // $itemcode = $_POST['itemcode'];
    // $unit = $_POST['unit'];
    // $rvu = $_POST['rvu'];
    // $genhos = $_POST['genhos'];
    // $commhos = $_POST['commhos'];

    $sql = "INSERT INTO data_tab (disea_gr,disea_sgrp,title,author,std_area,objective,cost_design,abstract,year_pub,orig_link,std_year,std_design,samp_area,samp_size,samp_meth,missing,pub_type,activity0,activity1,type_cost0,type_cost1,perspect,time_unit,perso_unit,cost_thb,remark,srvofftype) 
        VALUES ('$disea_gr','$disea_sgrp','$title','$author','$std_area','$objective','$cost_design','$abstracts',$year_pub,'$orig_link','$std_year','$std_design','$samp_area','$samp_size','$samp_meth','$missing','$pub_type','$activity0','$activity1','$type_cost0','$type_cost1','$perspect','$time_unit','$perso_unit',$cost_thb,'$remark','$srvofftype')";

    print($sql);
    // $result = pg_query($sql);    

    if ($result) {
        echo json_encode(
            ['status' => 'ok', 'message' => $sql]
        );
    } else {
        echo json_encode(
            ['status' => 'error', 'message' => 'เกิดข้อผิดพลาดในการบันทึกข้อมูล']
        );
    }
}
pg_close($dbconn);
