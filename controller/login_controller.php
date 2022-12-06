<?php

require_once '../include/connection.php';




$nombre=$_POST['usuario_nombre'];
$pass=$_POST['contra_usu'];


// encriptamos la contraseña
$pass = hash('sha256', $pass);




$sql= "SELECT * FROM tbl_usuarios WHERE correo=? and usuario_password=? and usuario_tipo=1;";

$stmt=$pdo->prepare($sql);

$stmt->bindParam(1,$nombre);

$stmt->bindParam(2,$pass);

$stmt->execute();

$resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($resultado as $usu) {
    $nom_usu=$usu['usuario_nombre'];
    $id_usu=$usu['id'];
    $tipo_usu=$usu['usuario_tipo'];
    $es_admin=$usu['admin'];
}
// var_dump($resultado);

  $entra_camarero=count($resultado);


if ($entra_camarero==0) {
    $sql= "SELECT * FROM tbl_usuarios WHERE correo=? and usuario_password=? and usuario_tipo=2;";

    $stmt=$pdo->prepare($sql);
    
    $stmt->bindParam(1,$nombre);
    
    $stmt->bindParam(2,$pass);
    
    $stmt->execute();
    
    $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($resultado as $usu) {
        $nom_usu=$usu[' usuario_nombre'];
        $id_usu=$usu['id'];
        $tipo_usu=$usu['usuario_tipo'];
        $es_admin=$usu['admin'];
    }
   $entra_mantenimiento=count($resultado);
}


if ( $entra_camarero >0  ) {
    session_start();
   

    $_SESSION['usuario_nombre'] = $nom_usu;

    $_SESSION['usuario_id'] =  $id_usu;

    $_SESSION['usuario_tipo'] = $tipo_usu;

    $_SESSION['admin'] = $es_admin;

    ?>
    <script>location.href = '../view/inicio.php'</script>
 <?php
  
}else if ($entra_mantenimiento>0) {
    session_start();
   

    $_SESSION['usuario_nombre'] = $nom_usu;

    $_SESSION['usuario_id'] =  $id_usu;

    $_SESSION['usuario_tipo'] = $tipo_usu;

    ?>
    <script>location.href = '../view/incidencias.php'</script>
 <?php
  
} else {
    ?>
    <script>location.href = '../view/login.php?error=true'</script>
 <?php
} 
