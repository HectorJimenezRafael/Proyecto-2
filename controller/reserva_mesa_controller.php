<?php
require_once ('../model/mesa.php');
require_once '../include/func.php';
$id=$_POST['id'];
$user=$_POST['user'];
$num=$_POST['num_clientes'];
if(errorID($user) || errorID($id)){
    
    echo json_encode(['ok'=>'ID invalido']);
    die();
}

if(errorCliente($num)){
    
    echo json_encode(['ok'=>'Num clientes invalido']);
    die();
}

$mesa=Mesas::setReserva($id,$user,$num);

echo json_encode(['ok'=>true,'data'=>$mesa]);