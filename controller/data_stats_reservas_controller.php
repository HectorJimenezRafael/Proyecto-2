<?php
require_once ('../model/mesa.php');
require_once '../include/func.php';


$nombre=$_POST['nombre'];

if($nombre==''){
    $nombre='%';
}

$lugar = $_POST['lugar'];

if($lugar==''){
    $lugar='%';
}

//$_POST['data_fin'] != '' && $_POST['data_ini'] != ''

if(isset($_POST['data_fin']) && isset($_POST['data_ini'])){
    $where = "where tbl_reserva.data_ini >= ? and tbl_reserva.data_fin <= ?";
    $dataIni=$_POST['data_ini'];
    $dataFin=$_POST['data_fin'];
}else{
    $dataIni='';
    $dataFin='';
    $where ='';
}

$mesa=Mesas::getStatsReserva($nombre,$lugar,$where,$dataIni,$dataFin);

echo json_encode(['ok'=>true,'data'=>$mesa]);
