<?php
require_once ('../model/mesa.php');
require_once '../include/func.php';
$id=$_POST['id'];
$coste=$_POST['coste'];
$user = $_POST['user'];

if(errorID($user) || errorID($id)){
    
    echo json_encode(['ok'=>'ID invalido']);
    die();
}

if(errorCoste($coste)){
    
    echo json_encode(['ok'=>'Coste invalido']);
    die();
}
$mesa=Mesas::editReservaMesaPedido($id,$coste,$user);

echo json_encode(['ok'=>true,'data'=>$mesa]);