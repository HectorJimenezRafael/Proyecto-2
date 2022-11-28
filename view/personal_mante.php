<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$filtro_nombre="";
$filtro_apellido="";
?>

<form action="" method="get">

<input type="text" name="filtro_nombre">
<br>
<input type="text" name="filtro_apellido">
<br>
<input type="submit" name="filtro" value="Filtrar">
</form>
<?php
if (isset($_GET['filtro'])) {
   
    $filtro_nombre=$_GET['filtro_nombre'];
$filtro_apellido=$_GET["filtro_apellido"];
}
?>

<?php
  require_once("../include/connection.php");

$sql="SELECT * FROM tbl_usuarios WHERE usuario_tipo LIKE '2' AND usuario_nombre LIKE '%$filtro_nombre%' AND Apellido LIKE '%$filtro_apellido%'";

$resultado=mysqli_query($conexion, $sql);

?>
<table>
<?php
foreach ($resultado as $persona) {
  

    ?>
 <?php echo $persona['usuario_nombre'];?>

 <?php echo $persona['Apellido'];?>
 <br>
    <?php

    
}




?>

<br>
<br>

<a href="Crear_man.php">Crear</a>

    
</body>
</html>