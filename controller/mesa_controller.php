<?php
require_once ('../model/mesa.php');

$mesas=Mesas::getMesas();

echo json_encode($mesas);