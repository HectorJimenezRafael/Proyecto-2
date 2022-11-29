
<?php

session_start();
require_once '../include/connection.php';


if ($_SESSION['admin']!=1) {
    if (empty($_POST['correo']) || empty($_POST['contra_antigua']) || empty($_POST['contra_nueva'])) {
        ?>
        <script>location.href = '../view/cambiar_con.php?vacio=true'</script>
     <?php
    
    }
    
    $correo=$_POST['correo'];
   
    $contra_antigua=$_POST['contra_antigua'];

    $contra_antigua = hash('sha256', $contra_antigua);

    $contra_nueva=$_POST['contra_nueva'];

    $sql= "SELECT * FROM tbl_usuarios WHERE correo=:correo and usuario_password=:pass;";

    $stmt=$pdo->prepare($sql);

    $stmt->bindParam(":correo",$correo);

$stmt->bindParam(":pass",  $contra_antigua);

    $stmt->execute();

$resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($resultado as $usu) {
    $nom_usu=$usu['usuario_nombre'];
    $id_usu=$usu['id'];
    $tipo_usu=$usu['usuario_tipo'];
    $es_admin=$usu['admin'];
}


$corresponde=count($resultado);

if ($corresponde==1) {
    $contra_nueva= hash('sha256', $contra_nueva);

    $sql="UPDATE tbl_usuarios SET usuario_password=:nueva_pass WHERE id=:id";
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam(":nueva_pass", $contra_nueva);
    $stmt->bindParam(":id",  $id_usu);
    $stmt->execute();
    ?>
    <script>location.href = '../view/cambiar_con.php?good=true'</script>
 <?php
} else {
    ?>
        <script>location.href = '../view/cambiar_con.php?mal=true'</script>
     <?php
}

    



} elseif ($_SESSION['admin']==1) {
     if (empty($_POST['correo']) || empty($_POST['contra_nueva'])) {
        ?>
        <script>location.href = '../view/cambiar_con.php?vacio=true'</script>
     <?php
    
    }

    $correo=$_POST['correo'];

    $contra_nueva=$_POST['contra_nueva'];
 

    $sql= "SELECT * FROM tbl_usuarios WHERE correo=:correo";
    $stmt=$pdo->prepare($sql);

    $stmt->bindParam(":correo",$correo);

    $stmt->execute();

    $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($resultado as $usu) {
        $nom_usu=$usu['usuario_nombre'];
        $id_usu=$usu['id'];
        $tipo_usu=$usu['usuario_tipo'];
        $es_admin=$usu['admin'];
    }

    $corresponde=count($resultado);

    if ($corresponde==1) {
        $contra_nueva= hash('sha256', $contra_nueva);
    
        $sql="UPDATE tbl_usuarios SET usuario_password=:nueva_pass WHERE id=:id";
        $stmt=$pdo->prepare($sql);
        $stmt->bindParam(":nueva_pass", $contra_nueva);
        $stmt->bindParam(":id",  $id_usu);
        $stmt->execute();
        ?>
        <script>location.href = '../view/cambiar_con.php?good=true'</script>
     <?php
    } else {
        ?>
            <script>location.href = '../view/cambiar_con.php?mal=true'</script>
         <?php
    }
}


