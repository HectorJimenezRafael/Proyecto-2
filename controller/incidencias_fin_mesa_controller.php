<?php
require_once ('../model/mesa.php');


$mesas_rotas=Mesas::getIncidenciasFin();

echo json_encode($mesas_rotas);