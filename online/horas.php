<?php
require_once '../include/connection.php';

 $hoy=date("Y-m-d");
if (!empty($_POST['fecha'])) {
    $fecha=$_POST['fecha'];
}


if ($fecha==$hoy) {
    $sql="SELECT * FROM tbl_horas WHERE hora>CURRENT_TIME;";

$query = $pdo->prepare($sql);

$query->execute();

$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resultado);
} else {
    $sql="SELECT * FROM tbl_horas ;";

$query = $pdo->prepare($sql);

$query->execute();

$resultado = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($resultado);
}


