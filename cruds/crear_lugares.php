<?php
require_once '../include/connection.php';

if (empty($_POST['nombre']) ) {
    echo "campos_vacios";
}
else if (isset($_POST)) {


    
    $nombre = $_POST['nombre'];
   
    $nombre_img = $_FILES['imagen']['name']; //obtenemos el nombre de la imagen
    $archivo = $_FILES['imagen']['tmp_name'];//archivo
    $tipo_archivo = $_FILES['imagen']['type'];//guardar el tipo del archivo
    $ruta="../assets/img/mesas";
    $ruta=$ruta."/".$nombre_img;


    
    if (empty($_POST['idp'])){
        if (empty($_FILES['imagen']['name'])) {
            echo "campos_vacios";
        }
        else if ($tipo_archivo=="image/jpeg" || $tipo_archivo=="image/jpg" || $tipo_archivo=="image/png" || $tipo_archivo=="image/gif" || $tipo_archivo=="image/webp") {
            move_uploaded_file($archivo,$ruta);
            $query = $pdo->prepare("INSERT INTO `tbl_lugar`( `lugar_recurso`,`img_lugar`) VALUES (:nombre,:ruta)");
            $query->bindParam(":nombre", $nombre);
            
            $query->bindParam(":ruta", $ruta);
           
            $query->execute();
            // $pdo = null;
            echo "ok";
       
        } else {
            echo "formato_archivo_mal";
        }

          
      
    }else{
        if (empty($_FILES['imagen']['name'])) {
            $id = $_POST['idp'];
            $query = $pdo->prepare("UPDATE `tbl_lugar` SET lugar_recurso = :nombre WHERE id = :id");
            $query->bindParam(":nombre", $nombre);
           
            $query->bindParam("id", $id);
            $query->execute();
            // $pdo = null;
            echo "modificado";
        } else if (!empty($_FILES['imagen']['name'])) {



        
            $id = $_POST['idp'];
            $nombre_img = $_FILES['imagen']['name']; //obtenemos el nombre de la imagen
             $archivo = $_FILES['imagen']['tmp_name'];//archivo
            $ruta="../assets/img/mesas";
            $ruta=$ruta."/".$nombre_img;
            $tipo_archivo = $_FILES['imagen']['type'];//guardar el tipo del archivo
            if ($tipo_archivo=="image/jpeg" || $tipo_archivo=="image/jpg" || $tipo_archivo=="image/png" || $tipo_archivo=="image/gif" || $tipo_archivo=="image/webp") {
                $query = $pdo->prepare("UPDATE `tbl_lugar` SET lugar_recurso = :nombre,img_lugar=:imagen WHERE id = :id");
                $query->bindParam(":nombre", $nombre);
              
                $query->bindParam(":imagen", $ruta);
                $query->bindParam("id", $id);
                $query->execute();
                // $pdo = null;
                echo "modificado";
            } else {
                echo "formato_archivo_mal";
            }
            
        }
     
       
    }
} 

    
