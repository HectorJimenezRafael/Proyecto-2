<?php
require_once '../include/connection.php';
//$consulta=null;


if((!empty($_POST['buscar_nombre']))){
    $flitro_nombre=$_POST['buscar_nombre'];
    $flitro_capacidad=$_POST['buscar_capacidad'];
    $flitro_lugar=$_POST['buscar_lugar'];
    $consulta = $pdo->prepare("SELECT r.id,r.nombre_mesa,r.capacidad,l.lugar_recurso FROM tbl_recurso r INNER JOIN tbl_lugar l on l.id=r.id_lugar WHERE nombre_mesa LIKE '%".$flitro_nombre."%' AND capacidad LIKE '%".$flitro_capacidad."%' AND id_lugar LIKE '%".$flitro_lugar."%'");
    $consulta->execute();
} else if ((!empty($_POST['buscar_capacidad']))) {
    $flitro_nombre=$_POST['buscar_nombre'];
    $flitro_capacidad=$_POST['buscar_capacidad'];
    $flitro_lugar=$_POST['buscar_lugar'];
    $consulta = $pdo->prepare("SELECT r.id,r.nombre_mesa,r.capacidad,l.lugar_recurso FROM tbl_recurso r INNER JOIN tbl_lugar l on l.id=r.id_lugar WHERE nombre_mesa LIKE '%".$flitro_nombre."%' AND capacidad LIKE '%".$flitro_capacidad."%' AND id_lugar LIKE '%".$flitro_lugar."%' ");
    $consulta->execute();
}  else if ((!empty($_POST['buscar_lugar']))) {
    $flitro_nombre=$_POST['buscar_nombre'];
    $flitro_capacidad=$_POST['buscar_capacidad'];
    $flitro_lugar=$_POST['buscar_lugar'];
    $consulta = $pdo->prepare("SELECT r.id,r.nombre_mesa,r.capacidad,l.lugar_recurso FROM tbl_recurso r INNER JOIN tbl_lugar l on l.id=r.id_lugar WHERE nombre_mesa LIKE '%".$flitro_nombre."%' AND capacidad LIKE '%".$flitro_capacidad."%' AND id_lugar LIKE '%".$flitro_lugar."%' ");
    $consulta->execute();
}
else{
    //echo 'hola';
    $consulta = $pdo->prepare("SELECT r.id,r.nombre_mesa,r.capacidad,l.lugar_recurso FROM tbl_recurso r INNER JOIN tbl_lugar l on l.id=r.id_lugar");
    $consulta->execute();
}


$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

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