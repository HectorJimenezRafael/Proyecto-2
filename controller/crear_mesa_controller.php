<?php

require_once ('../model/mesa.php');
// require_once '../include/func.php';

$nombre_me=$_POST['nombre_me'];
$lugar=$_POST['lugar'];
$estado=$_POST['estado'];
$capacidad=$_POST['capacidad'];



$mesa_creada==Mesas::crearMesa($nombre_me,$lugar,$estado,$capacidad);



echo json_encode([$mesa_creada]);