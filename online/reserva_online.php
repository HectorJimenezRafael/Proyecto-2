<?php
require_once '../include/connection.php';


$query = $pdo->prepare("UPDATE `tbl_recurso` SET id_estado='2' WHERE id='13' ");

$query->execute();

echo "consulta";