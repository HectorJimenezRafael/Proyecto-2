<?php
require_once '../include/connection.php';

$hoy=date("Y-m-d");

$sql="SELECT * FROM `tbl_reserva_online` WHERE hora_res_o=13 AND dia=:hoy ; ";
$query=$pdo->prepare($sql);
$query->bindParam(":hoy", $hoy);
$query->execute();
$resultado=$query->fetchAll(PDO::FETCH_ASSOC);


try {

    foreach ($resultado as $mesa) {
       
         $id_mesa=$mesa['id'];
         $ocupacion=$mesa['ocupacion_res_o'];

         $pdo->beginTransaction();

         $sql="UPDATE tbl_recurso SET id_estado=2 WHERE id=:id";
         $query=$pdo->prepare($sql);

         $query->bindParam(":id",  $id_mesa);
         $query->execute();


         $sql2="INSERT INTO tbl_reserva ( `id_usuario`, `id_recurso`, `data_ini`, `num_clientes`, `finalizado`) 
         VALUES (1,:mesa,current_timestamp(),:ocupacion,0)";
         $query=$pdo->prepare($sql2);
         $query->bindParam(":mesa",  $id_mesa);
         $query->bindParam(":ocupacion",  $ocupacion);
         $query->execute();


         $pdo->commit();


    }
    



} catch (Exception $e) {
    $pdo->rollBack();
    echo $e->getMessage();
}