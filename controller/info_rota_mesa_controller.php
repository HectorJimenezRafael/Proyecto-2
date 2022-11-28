<?php
require_once ('../model/mesa.php');


$mesas_rotas=Mesas::info_get_mesas_rotas();

echo json_encode($mesas_rotas);