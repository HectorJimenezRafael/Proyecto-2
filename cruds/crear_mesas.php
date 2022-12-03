<?php
require_once '../include/connection.php';

if (empty($_POST['nombre']) ) {
    echo "campos_vacios";
}
else if (isset($_POST)) {


    
    $nombre = $_POST['nombre'];
    $capacidad = $_POST['capacidad'];
    $lugar = $_POST['lugar'];
    $nombre_img = $_FILES['imagen']['name']; //obtenemos el nombre de la imagen
    $archivo = $_FILES['imagen']['tmp_name'];//archivo
    $tipo_archivo = $_FILES['imagen']['type'];//guardar el tipo del archivo
    $ruta="../assets/img/mesas";
    $ruta=$ruta."/".$nombre_img;
if ($tipo_archivo=="image/jpeg" || $tipo_archivo=="image/jpg" || $tipo_archivo=="image/png" || $tipo_archivo=="image/gif") {
  
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
        if (empty($_FILES['imagen']['name'])) {
            $id = $_POST['idp'];
            $query = $pdo->prepare("UPDATE `tbl_recurso` SET nombre_mesa = :nombre, id_lugar = :lugar, capacidad=:capacidad WHERE id = :id");
            $query->bindParam(":nombre", $nombre);
            $query->bindParam(":lugar", $lugar);
            $query->bindParam(":capacidad", $capacidad);
            $query->bindParam("id", $id);
            $query->execute();
            // $pdo = null;
        } else if (!empty($_FILES['imagen']['name'])) {
            $id = $_POST['idp'];
            $nombre_img = $_FILES['imagen']['name']; //obtenemos el nombre de la imagen
             $archivo = $_FILES['imagen']['tmp_name'];//archivo
            $ruta="../assets/img/mesas";
            $ruta=$ruta."/".$nombre_img;
            $query = $pdo->prepare("UPDATE `tbl_recurso` SET nombre_mesa = :nombre, id_lugar = :lugar, capacidad=:capacidad,img_recurso=:imagen WHERE id = :id");
            $query->bindParam(":nombre", $nombre);
            $query->bindParam(":lugar", $lugar);
            $query->bindParam(":capacidad", $capacidad);
            $query->bindParam(":imagen", $ruta);
            $query->bindParam("id", $id);
            $query->execute();
            // $pdo = null;
        }
     
        echo "modificado";
    }
} else {
    echo "formato_archivo_mal";
}

    
}
