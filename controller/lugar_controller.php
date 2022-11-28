<?php
require_once ('../model/mesa.php');

$lugares=Mesas::getLugares();

echo json_encode($lugares);