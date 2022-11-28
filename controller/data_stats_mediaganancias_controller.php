<?php
require_once ('../model/mesa.php');

$mesa=Mesas::getMediaGanancias();

echo json_encode($mesa[0]);