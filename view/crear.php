<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- LINK BOOTSTRAP -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Fuente -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa+Ink:wght@700&family=Montserrat:ital@0;1&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel='stylesheet' type='text/css' media='screen' href='../assets/css/reserva.css'>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="shortcut icon" href="../assets/img/logo.png" />
    <!-- Iconos Font Awesome -->
    <script src="https://kit.fontawesome.com/2b5286e1aa.js" crossorigin="anonymous"></script>
    <!-- JS -->
    <script type="text/javascript" src="../assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- SWEET ALERTS -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <link rel='stylesheet' type='text/css' media='screen' href='../assets/css/reserva.css'>

    <title>Document</title>
</head>
<body>


<?php
session_start();
    if (!isset($_SESSION['usuario_id'])) {
        echo "<script>window.location.href = '../view/login.php';</script>";
    }


    require_once("../include/connection.php");

    // $sql="SELECT lugar_recurso FROM tbl_lugar;";

    // $stmt = mysqli_stmt_init($conexion);
    // mysqli_stmt_prepare($stmt,$sql);
        
    // // mysqli_stmt_bind_param($stmt,"i",$id);
    // mysqli_stmt_execute($stmt);
    // $consulta = mysqli_stmt_get_result($stmt);

  

   
  //   $resultadoconsulta=mysqli_fetch_all($consulta);

  //  print_r($resultadoconsulta);
  

  //  foreach ($resultadoconsulta as  $item => $value) {


  //   echo "$item $value";

  //  }

 
// $total_lugares=mysqli_num_rows($resultado);


// while($fila=mysqli_fetch_assoc($resultado)){
// echo $fila['lugar'];

// }

  // print_r($listado_lugares);
  


   
    ?>

<nav>
  <ul class="menu">
    <li class="logo"><img src="../assets/img/logo.png" width="40px"></li>
    <li class="item"><a href="../include/cerrar_sesion.php"><i class="fa-solid fa-right-from-bracket"></i></a></li>
    
    <?php
    if  ($_SESSION['usuario_tipo']==1)  {
      ?>

      <li class="item button"><a href="reserva.php"><i class="fa-solid fa-house"></i></a></li>
      <li class="item button"><a href="./data.php"><i class="fa-solid fa-calculator"></i></a></li>
      <li class="item button"><a href="./crear.php"><i class="fa-solid fa-plus"></i></a></li>

     <?php
    } else if ($_SESSION['usuario_tipo']==2) {
      ?>

      <li class="item button"><a href="incidencias.php"><i class="fa-solid fa-circle-exclamation"></i></a></li>
      <li class="item button"><a href="./registro_incidencias.php"><i class="fa-solid fa-laptop-file"></i></a></li>
      <?php
    }
    ?>
   

    <li class="item button"><a href="./mapa.php"><i class="fa-solid fa-map"></i></a></li>
    <li class="toggle"><a href="#"><i class="fas fa-bars"></i></a></li>
  </ul>
</nav>
    

<?php
$sql="SELECT * FROM tbl_lugar;";

$resultado=mysqli_query($conexion, $sql);

// foreach ($resultado as $uwu ) {
//   echo $uwu['lugar_recurso'];
// }





?>

<div style="text-align:center;">

<h1  >CREAR MESA</h1>

<!-- <div id=form_crear>

</div> -->


<form action="crear_mesa_func.php" method="post">
<input type="text" id="nombre_me" name="nombre_me"  placeholder="nombre mesa">
<br>
<!-- <input type="number" id="lugar" name="lugar" placeholder="lugar"> -->
<br>
<input type="hidden" id="estado" name="estado" placeholder="estado" value="1">
<br>
<input type="number" id="capacidad" name="capacidad" placeholder="capacidad">
<br>

<select name="lugar" id="lugar">
<?php
foreach ($resultado as $uwu ) {
  ?>
  <option value="<?php echo $uwu['id']; ?>"><?php echo $uwu['lugar_recurso']; ?></option>
 
  <?php
}
?>
</select>
<br>
<input type="submit" value="CREAR MESA">
</form>


<br>
<br>
<br>
<h1>Crear Zona/Lugar</h1>

<form action="crear_lugar_func.php" method="post">
<input type="text" name="lugar_c" id="lugar_c">
<br>
  <input type="submit" value="CREAR LUGAR">


</form>


<h1>Actulizar sitios</h1>
<?php
$sql="SELECT * FROM tbl_recurso;";

$resultado=mysqli_query($conexion, $sql);

?>
<form action="actua.php" method="post">

<input type="number" name="sitios_n" id="sitios_n">

<select name="mesa_sele" id="mesa_sle">
<?php
foreach ($resultado as $uwu ) {
  ?>
  <option value="<?php echo $uwu['id']; ?>"><?php echo $uwu['nombre_mesa']; ?></option>
 
  <?php
}
?>
</select>
<br>
  <input type="submit" value="ACTULIZA LUGARES">


</form>


</div>


<script src="../assets/js/validaciones.js"></script>
<script src="../assets/js/alert-server.js"></script>

<script src="../assets/js/nav.js"></script>
<script src="../assets/js/crear.js"></script>


<!-- <script>crearMesa()</script> -->
<?php
if (isset($_GET['crear'])) {
if ($_GET['crear']=='truem') {
    ?>
    <script>
    Swal.fire({
    background:'#443E53',
    color:'white',
    icon: 'success',
    title: '',
    text: 'Nueva mesa creada'

})

    </script>
    <?php
}
}
?>

<?php
if (isset($_GET['crear'])) {
if ($_GET['crear']=='truel') {
    ?>
    <script>
    Swal.fire({
    background:'#443E53',
    color:'white',
    icon: 'success',
    title: '',
    text: 'Nuevo lugar creado'

})

    </script>
    <?php
}
}
?>

<?php
if (isset($_GET['crear'])) {
if ($_GET['crear']=='repeme') {
    ?>
    <script>
    Swal.fire({
    background:'#443E53',
    color:'white',
    icon: 'error',
    title: '',
    text: 'Mesa no creada, ya existe'

})

    </script>
    <?php
}
}
?>

<?php
if (isset($_GET['crear'])) {
if ($_GET['crear']=='error') {
    ?>
    <script>
    Swal.fire({
    background:'#443E53',
    color:'white',
    icon: 'error',
    title: '',
    text: 'Lugar no creado, ya existe'

})

    </script>
    <?php
}
}
?>


<?php
if (isset($_GET['campos'])) {
if ($_GET['campos']=='false') {
    ?>
    <script>
    Swal.fire({
    background:'#443E53',
    color:'white',
    icon: 'error',
    title: '',
    text: 'Campos vaciós, error al crear '

})

    </script>
    <?php
}
}
?>


<?php
if (isset($_GET['campos'])) {
if ($_GET['campos']=='mal') {
    ?>
    <script>
    Swal.fire({
    background:'#443E53',
    color:'white',
    icon: 'error',
    title: '',
    text: 'Mesa no creada, formato incorrecto '

})

    </script>
    <?php
}
}
?>

</body>
</html>