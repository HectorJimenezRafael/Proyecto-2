<?php
require_once ('../model/mesa.php');
require_once '../include/func.php';
$id=$_POST['id'];
if(errorID($id)){
    
    echo json_encode(['ok'=>'ID invalido']);
    die();
}

$mesa=Mesas::getInfoMesas($id);

echo json_encode(['ok'=>true,'data'=>$mesa[0]]);