<?php

require_once ('../model/mesa.php');
require_once '../include/func.php';

$id_mesa    =$_POST['id_mesa'];
$id_usu     =$_POST['user'];
$coste      =$_POST['coste'];
$solucion   = $_POST['solucion'];

if(errorID($id_mesa) || errorID($id_usu)){
    
    echo json_encode(['ok'=>'ID invalido']);
    die();
}

if(errorCoste($coste)){
    
    echo json_encode(['ok'=>'Num Coste invalido']);
    die();
}

if(errorTexto($solucion)){
    echo json_encode(['ok'=>'Texto invalido']);
    die();
}

//echo $id_mesa;// ,$id_usu  ,$coste   ,$solucion;

$mesa_reparada=Mesas::mesa_reparada($id_mesa,$id_usu,$coste,$solucion);

echo json_encode(['ok'=>true,'data'=>$mesa_reparada]);

