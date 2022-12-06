<?php
require_once '../include/connection.php';


if(!empty($_POST['buscar_correo'])  ){
    $flitro_dia=$_POST['buscar_dia'];
    $flitro_hora=$_POST['buscar_hora'];
    $flitro_correo=$_POST['buscar_correo'];
    $flitro_telefono=$_POST['buscar_telefono'];
    $consulta = $pdo->prepare("SELECT ro.id,ro.correo_res_o,ro.telefono_res_o,ro.dia,h.hora,ro.id_mesa FROM tbl_reserva_online ro 
    inner join tbl_horas h on h.id=ro.hora_res_o WHERE ro.correo_res_o LIKE '%".$flitro_correo."%' 
    AND ro.telefono_res_o LIKE '%".$flitro_telefono."%' AND ro.dia like '%".$flitro_dia."%' AND h.hora like '%".$flitro_hora."%'  ");
    $consulta->execute();
    
    
} else if(!empty($_POST['buscar_telefono'])  ){
    $flitro_dia=$_POST['buscar_dia'];
    $flitro_hora=$_POST['buscar_hora'];
    $flitro_correo=$_POST['buscar_correo'];
    $flitro_telefono=$_POST['buscar_telefono'];
    $consulta = $pdo->prepare("SELECT ro.id,ro.correo_res_o,ro.telefono_res_o,ro.dia,h.hora,ro.id_mesa FROM tbl_reserva_online ro 
    inner join tbl_horas h on h.id=ro.hora_res_o WHERE ro.correo_res_o LIKE '%".$flitro_correo."%' 
    AND ro.telefono_res_o LIKE '%".$flitro_telefono."%' AND ro.dia like '%".$flitro_dia."%' AND h.hora like '%".$flitro_hora."%' ");
    $consulta->execute();
    
    
}else if(!empty($_POST['buscar_dia'])  ){
    $flitro_dia=$_POST['buscar_dia'];
    $flitro_hora=$_POST['buscar_hora'];
    $flitro_correo=$_POST['buscar_correo'];
    $flitro_telefono=$_POST['buscar_telefono'];
    $consulta = $pdo->prepare("SELECT ro.id,ro.correo_res_o,ro.telefono_res_o,ro.dia,h.hora,ro.id_mesa FROM tbl_reserva_online ro 
    inner join tbl_horas h on h.id=ro.hora_res_o WHERE ro.correo_res_o LIKE '%".$flitro_correo."%' 
    AND ro.telefono_res_o LIKE '%".$flitro_telefono."%' AND ro.dia like '%".$flitro_dia."%' AND h.hora like '%".$flitro_hora."%' ");
    $consulta->execute();
    
    
}else if(!empty($_POST['buscar_hora'])  ){
    $flitro_dia=$_POST['buscar_dia'];
    $flitro_hora=$_POST['buscar_hora'];
    $flitro_correo=$_POST['buscar_correo'];
    $flitro_telefono=$_POST['buscar_telefono'];
    $consulta = $pdo->prepare("SELECT ro.id,ro.correo_res_o,ro.telefono_res_o,ro.dia,h.hora,ro.id_mesa FROM tbl_reserva_online ro 
    inner join tbl_horas h on h.id=ro.hora_res_o WHERE ro.correo_res_o LIKE '%".$flitro_correo."%' 
    AND ro.telefono_res_o LIKE '%".$flitro_telefono."%' AND ro.dia like '%".$flitro_dia."%' AND h.hora like '%".$flitro_hora."%' ");
    $consulta->execute();
    
    
}
 else if(empty($_POST['buscar_dia']) && empty($_POST['buscar_hora']) && empty($_POST['buscar_correo']) && empty($_POST['buscar_telefono'])){
    //echo 'hola';
    $consulta = $pdo->prepare("SELECT ro.id,ro.correo_res_o,ro.telefono_res_o,ro.dia,h.hora,ro.id_mesa FROM tbl_reserva_online ro inner join tbl_horas h on h.id=ro.hora_res_o ");
    $consulta->execute();
    
}


$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
// echo json_encode($resultado);


if (count($resultado)==0) {
   echo"sin_resultados";
}else {
    echo json_encode($resultado);
}

/*foreach ($resultado as $data) {
    echo "<tr>
            <td>" . $data['id'] . "</td>
            <td>" . $data['producto'] . "</td>
            <td>" . $data['precio'] . "</td>
            <td>" . $data['cantidad'] . "</td>
            <td>
                <button type='button' class='btn btn-success' onclick=Editar('" . $data['id'] . "')>Editar</button>
                <button type='button' class='btn btn-danger' onclick=Eliminar('" . $data['id'] . "')>Eliminar</button>
            </td>        
        </tr>";
}*/
