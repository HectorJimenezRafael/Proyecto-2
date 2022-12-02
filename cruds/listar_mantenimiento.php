<?php
require_once '../include/connection.php';
//$consulta=null;
// $_POST['buscar_nombre']="S";
// if (!empty($_POST['buscar_nombre'])) {
//     $flitro_nombre=$_POST['buscar_nombre'];
// } else {
//     $flitro_nombre="";
// }

// if (!empty($_POST['buscar_apellido'])) {
//     $flitro_apellido=$_POST['buscar_apellido'];
// } else {
//     $flitro_apellido="";
// }
// $_POST['buscar_nombre']="S";

if(!empty($_POST['buscar_nombre'])  ){

    $flitro_nombre=$_POST['buscar_nombre'];
    $flitro_apellido=$_POST['buscar_apellido'];
    $flitro_correo=$_POST['buscar_correo'];
    $flitro_telefono=$_POST['buscar_telefono'];

    $consulta = $pdo->prepare("SELECT * FROM tbl_usuarios WHERE usuario_tipo=2 AND usuario_nombre LIKE '%".$flitro_nombre."%' AND Apellido LIKE '%".$flitro_apellido."%'  AND correo LIKE '%".$flitro_correo."%' AND telefono LIKE '".$flitro_telefono."%' ");


    $consulta->execute();
} else if (!empty($_POST['buscar_apellido']) ) {
    $flitro_nombre=$_POST['buscar_nombre'];
    $flitro_apellido=$_POST['buscar_apellido'];
    $flitro_correo=$_POST['buscar_correo'];
    $flitro_telefono=$_POST['buscar_telefono'];

    $consulta = $pdo->prepare("SELECT * FROM tbl_usuarios WHERE usuario_tipo=2 AND usuario_nombre LIKE '%".$flitro_nombre."%' AND Apellido LIKE '%".$flitro_apellido."%' AND correo LIKE '%".$flitro_correo."%' AND telefono LIKE '".$flitro_telefono."%'");


    $consulta->execute();

} else if (!empty($_POST['buscar_correo']) ) {
    $flitro_nombre=$_POST['buscar_nombre'];
    $flitro_apellido=$_POST['buscar_apellido'];
    $flitro_correo=$_POST['buscar_correo'];
    $flitro_telefono=$_POST['buscar_telefono'];

    $consulta = $pdo->prepare("SELECT * FROM tbl_usuarios WHERE usuario_tipo=2 AND usuario_nombre LIKE '%".$flitro_nombre."%' AND Apellido LIKE '%".$flitro_apellido."%' AND correo LIKE '%".$flitro_correo."%' AND telefono LIKE '".$flitro_telefono."%'");


    $consulta->execute();

} else if (!empty($_POST['buscar_telefono']) ) {
    $flitro_nombre=$_POST['buscar_nombre'];
    $flitro_apellido=$_POST['buscar_apellido'];
    $flitro_correo=$_POST['buscar_correo'];
    $flitro_telefono=$_POST['buscar_telefono'];

    $consulta = $pdo->prepare("SELECT * FROM tbl_usuarios WHERE usuario_tipo=2 AND usuario_nombre LIKE '%".$flitro_nombre."%' AND Apellido LIKE '%".$flitro_apellido."%' AND correo LIKE '%".$flitro_correo."%' AND telefono LIKE '".$flitro_telefono."%'");


    $consulta->execute();

}else if(empty($_POST['buscar_nombre']) && empty($_POST['buscar_apellido']) && empty($_POST['buscar_correo']) && empty($_POST['buscar_telefono'])){
    //echo 'hola';
    $consulta = $pdo->prepare("SELECT * FROM tbl_usuarios WHERE usuario_tipo=2");
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
