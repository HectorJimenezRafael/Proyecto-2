<?php
require_once ('../model/mesa.php');

$mesa=Mesas::getMediaMinutos();

echo json_encode($mesa[0]);