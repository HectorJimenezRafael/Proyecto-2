<?php
require_once '../include/connection.php';
//$consulta=null;


if((!empty($_POST['buscar_nombre']))){
    $flitro_nombre=$_POST['buscar_nombre'];
  
    $consulta = $pdo->prepare("SELECT `id`, `lugar_recurso`, `img_lugar` FROM `tbl_lugar`  WHERE lugar_recurso LIKE '%".$flitro_nombre."%'");
    $consulta->execute();
} 
else{
    //echo 'hola';
    $consulta = $pdo->prepare("SELECT `id`, `lugar_recurso`, `img_lugar` FROM `tbl_lugar`  ");
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