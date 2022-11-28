<?php
require_once '../include/connection.php';
//$consulta=null;


if((!empty($_POST['buscar_nombre']))){
    $flitro_nombre=$_POST['buscar_nombre'];
    $flitro_apellido=$_POST['buscar_apellido'];
    $consulta = $pdo->prepare("SELECT * FROM tbl_recurso");
    $consulta->execute();
}else{
    //echo 'hola';
    $consulta = $pdo->prepare("SELECT * FROM tbl_recurso");
    $consulta->execute();
}


$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resultado);
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