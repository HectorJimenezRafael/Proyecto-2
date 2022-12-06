<?php
require_once '../include/connection.php';

if (empty($_POST['Nombre']) || empty($_POST['Apellido']) || empty($_POST['phone']) || empty($_POST['correo']) || empty($_POST['hora']) || empty($_POST['fecha']) || empty($_POST['personas']) || empty($_POST['lugar'])      ) {
    
    ?>
    <script>location.href = '../view/reserva_cliente.php?mesas=vacio'</script>
 <?php
} else if (!(is_numeric($_POST['phone'])) || strlen($_POST['phone'])!=9 || !filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
    ?>
    <script>location.href = '../view/reserva_cliente.php?mesas=for'</script>
 <?php
} else {



    $dia=$_POST['fecha'];

    $fecha_actual= date("Y-m-d");
if ($dia<$fecha_actual) {
    ?>
    <script>location.href = '../view/reserva_cliente.php?mesas=edate'</script>
 <?php
} else {
      
$nombre=$_POST['Nombre'];

$apellido=$_POST['Apellido'];
$correo=$_POST['correo'];

$telefono=$_POST['phone'];

// ---------
$hora=$_POST['hora'];




$capacidad=$_POST['personas'];

$lugar=$_POST['lugar'];

$sql= "SELECT * FROM tbl_recurso recurso WHERE NOT EXISTS (SELECT ro.id_mesa FROM tbl_reserva_online ro
 WHERE ro.id_mesa=recurso.id AND ro.hora_res_o=:hora AND ro.dia=:dia) AND recurso.capacidad=:capacidad AND recurso.id_lugar=:lugar LIMIT 1";

$query=$pdo->prepare($sql);

$query->bindParam(":hora", $hora);

$query->bindParam(":dia", $dia);

$query->bindParam(":capacidad", $capacidad);

$query->bindParam(":lugar", $lugar);

$query->execute();

$resultado=$query->fetchAll(PDO::FETCH_ASSOC);

// echo count($resultado);



if (count($resultado)==1) {
    foreach ($resultado as $mesa) {
        // echo $id_mesa=$mesa['id'];
       $id_mesa=$mesa['id'];
    }

//     echo $hora;
// $sql="SELECT `id` FROM `tbl_horas` WHERE hora=:tiempo";
// $query=$pdo->prepare($sql);

// $query->bindParam(":tiempo", $hora);
// $query->execute();

// $hora_entrada=$query->fetchAll(PDO::FETCH_ASSOC);
// var_dump($hora_entrada);
// foreach($hora_entrada as $entrada){
//  echo  $id_salida=$entrada['id'];
// }

    $sql="INSERT INTO `tbl_reserva_online`( `nombre_res_o`, `apellido_res_o`, `correo_res_o`, `telefono_res_o`, `id_mesa`, 
    `id_lugar`, `dia`, `hora_res_o`, `ocupacion_res_o`,`id_hora_res_o_final`) 
    VALUES (:nombre,:apellido,:correo,:telefono,:mesa,:lugar,:dia,:hora,:ocupacion,:salida)";

    $query=$pdo->prepare($sql);
    
    $query->bindParam(":nombre", $nombre);

    $query->bindParam(":apellido", $apellido);

    $query->bindParam(":correo", $correo);

    $query->bindParam(":telefono", $telefono);

    $query->bindParam(":mesa", $id_mesa);

    $query->bindParam(":hora", $hora);

    $query->bindParam(":dia", $dia);

    $query->bindParam(":ocupacion", $capacidad);

    $query->bindParam(":lugar", $lugar);

    $query->bindParam(":salida",  $hora);

    $query->execute();

    ?>
    <script>location.href = '../view/reserva_cliente.php?mesas=si'</script>
 <?php

} else {
    ?>
    <script>location.href = '../view/reserva_cliente.php?mesas=no'</script>
 <?php
}
}
  
}



