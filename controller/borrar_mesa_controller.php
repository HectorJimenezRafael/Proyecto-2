
<?php
require_once ('../model/mesa.php');

$mesa=$_POST['id_mesa'];
$clientes=$_POST['num_clientes'];

$actu=Mesas::actu_mesa($mesa,$clientes);

echo json_encode([$actu]);
