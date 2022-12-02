<?php
require_once '../include/connection.php';
if (isset($_POST)) {

    $nombre = $_POST['nombre'];
    $capacidad = $_POST['capacidad'];
    $lugar = $_POST['lugar'];
    $nombre_img = $_FILES['imagen']['name']; //obtenemos el nombre de la imagen
    $archivo = $_FILES['imagen']['tmp_name'];//archivo
    $ruta="../assets/img/mesas";
    $ruta=$ruta."/".$nombre_img;

    move_uploaded_file($archivo,$ruta);
    
    if (empty($_POST['idp'])){
        $query = $pdo->prepare("INSERT INTO `tbl_recurso`( `nombre_mesa`, `id_lugar`, `id_estado`, `capacidad`,`img_recurso`) VALUES (:nombre,:lugar,1,:capacidad,:ruta)");
        $query->bindParam(":nombre", $nombre);
        $query->bindParam(":lugar", $lugar);
        $query->bindParam(":capacidad", $capacidad);
        $query->bindParam(":ruta", $ruta);
       
        $query->execute();
        // $pdo = null;
        echo "ok";
    }else{
        $id = $_POST['idp'];
        $query = $pdo->prepare("UPDATE `tbl_recurso` SET nombre_mesa = :nombre, id_lugar = :lugar, capacidad=:capacidad WHERE id = :id");
        $query->bindParam(":nombre", $nombre);
        $query->bindParam(":lugar", $lugar);
        $query->bindParam(":capacidad", $capacidad);
        $query->bindParam("id", $id);
        $query->execute();
        // $pdo = null;
        echo "modificado";
    }
    
}
