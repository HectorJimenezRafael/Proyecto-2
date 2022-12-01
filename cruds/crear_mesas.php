<?php
require_once '../include/connection.php';
if (isset($_POST)) {

    $nombre = $_POST['nombre'];
    $capacidad = $_POST['capacidad'];
    $lugar = $_POST['lugar'];
    // $imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
   
    
    if (empty($_POST['idp'])){
        $query = $pdo->prepare("INSERT INTO `tbl_recurso`( `nombre_mesa`, `id_lugar`, `id_estado`, `capacidad`) VALUES (:nombre,:lugar,1,:capacidad)");
        $query->bindParam(":nombre", $nombre);
        $query->bindParam(":lugar", $lugar);
        $query->bindParam(":capacidad", $capacidad);
       
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
