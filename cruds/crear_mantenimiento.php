<?php
require_once '../include/connection.php';

if (empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['telefono']) || empty($_POST['correo'])    ) {
    
    echo "vacio";
} else if (!(is_numeric($_POST['telefono'])) || strlen($_POST['telefono'])!=9 || !filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
    echo "mal_formato";
}else if (isset($_POST)) {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $pass="qweQWE123";
    
    $pass = hash('sha256', $pass);
    
    if (empty($_POST['idp'])){
$query = $pdo->prepare("SELECT * FROM `tbl_usuarios` WHERE telefono=:telefono OR correo=:correo ");
$query->bindParam(":telefono", $telefono);
$query->bindParam(":correo", $correo);
$query->execute();
$resultado=$query->fetchAll(PDO::FETCH_ASSOC);

if (count($resultado)==0) {
    $query = $pdo->prepare("INSERT INTO tbl_usuarios (usuario_nombre, Apellido,usuario_tipo,telefono,correo,usuario_password) VALUES (:nombre, :apellido,2,:telefono,:correo,:pass)");
    $query->bindParam(":nombre", $nombre);
    $query->bindParam(":apellido", $apellido);
    $query->bindParam(":telefono", $telefono);
    $query->bindParam(":correo", $correo);
    $query->bindParam(":pass", $pass);
    $query->execute();
    // $pdo = null;
    echo "ok";
} else {
    echo "repetido";
}
       
    }else{
        
        $id = $_POST['idp'];

        $query = $pdo->prepare("UPDATE tbl_usuarios SET usuario_nombre = :nombre, Apellido = :apellido,telefono=:telefono, correo=:correo WHERE id = :id");
        $query->bindParam(":nombre", $nombre);
        $query->bindParam(":apellido", $apellido);
        $query->bindParam(":telefono", $telefono);
        $query->bindParam(":correo", $correo);
        
        $query->bindParam("id", $id);
        $query->execute();
        $pdo = null;
        echo "modificado";
    }
    
}
