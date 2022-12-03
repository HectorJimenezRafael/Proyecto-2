<?php
require_once '../include/connection.php';

echo $hoy=date("Y-m-d");


$sql="SELECT * FROM `tbl_reserva_online` ro INNER JOIN tbl_horas h on ro.hora_res_o=h.id WHERE h.hora=CURRENT_TIME AND ro.dia=:hoy; ";

// $sql="SELECT * FROM `tbl_reserva_online` WHERE hora_res_o=15 AND dia=:hoy ; ";

$query=$pdo->prepare($sql);
$query->bindParam(":hoy", $hoy);
$query->execute();
$hay_reserva=$query->fetchAll(PDO::FETCH_ASSOC);

if (count($hay_reserva)>1) {
    

        foreach ($hay_reserva as $mesa) {
           
             $id_mesa=$mesa['id_mesa'];
             $ocupacion=$mesa['ocupacion_res_o'];
             try {
             $pdo->beginTransaction();
    
             $sql="UPDATE tbl_recurso SET id_estado=2 WHERE id=:id";
             $query=$pdo->prepare($sql);
    
             $query->bindParam(":id",  $id_mesa);
             $query->execute();
    
    
             $sql2="INSERT INTO tbl_reserva ( `id_usuario`, `id_recurso`, `data_ini`, `num_clientes`,`finalizado`) 
             VALUES (2,:mesa,current_timestamp,:ocupacion,0)";
             $query=$pdo->prepare($sql2);
             $query->bindParam(":mesa",  $id_mesa);
             $query->bindParam(":ocupacion",  $ocupacion);
             $query->execute();
    
    
             $pdo->commit();
    
             echo"consulta";
            } catch (Exception $e) {
                $pdo->rollBack();
                echo $e->getMessage();
            }
        }
        
} else {
   echo "no hay reservas en este instante";
}
