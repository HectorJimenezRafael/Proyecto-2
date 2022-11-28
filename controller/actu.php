<?php
require_once ('../model/mesa.php');

$mesa=$_POST['id_mesa'];

$borrar_mesa=Mesas::borrar_mesa($mesa,$sitios);

echo json_encode([$borrar_mesa]);