<?php
require_once ('../model/mesa.php');
require_once '../include/func.php';

$usuario=$_POST['user'];
$recurso=$_POST['id'];
$text=$_POST['problema'];

if(errorID($usuario) || errorID($recurso)){
    
    echo json_encode(['ok'=>'ID invalido']);
    die();
}

if(errorTexto($text)){
    
    echo json_encode(['ok'=>'Caracteres invalidos en PROBLEMA']);
    die();
}

$mesas_rotas=Mesas::setIncidencia($usuario,$recurso,$text);

echo json_encode(['ok'=>true,'data'=>$mesas_rotas]);
