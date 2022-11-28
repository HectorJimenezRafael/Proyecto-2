<?php


require_once("../include/connection.php");
require_once ('../model/mesa.php');

$nombre=$_POST['nombre'];

$apellido=$_POST['apellido'];

// $nombre=mysqli_real_escape_string($conexion,$nombre);
// $apellido=mysqli_real_escape_string($conexion,$apellido);


$sql= "INSERT INTO `tbl_usuarios`( `usuario_nombre`, `Apellido`,`usuario_tipo`) VALUES ('$nombre','$apellido','2')";



mysqli_query($conexion,$sql);






echo "<script>location.href='crear_man.php?'</script>";