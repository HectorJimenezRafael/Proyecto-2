<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Fuente -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa+Ink:wght@700&family=Montserrat:ital@0;1&display=swap" rel="stylesheet">
     <!-- LINK BOOTSTRAP -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- HOJA DE ESTILOS CSS -->
   <link rel="stylesheet" href="../assets/css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <!-- Icono en pestaña -->
    <link rel="shortcut icon" href="../assets/img/logo.png" />
    <!-- Iconos Font Awesome -->
    <script src="https://kit.fontawesome.com/2b5286e1aa.js" crossorigin="anonymous"></script>
    <!-- JS -->
    

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript"  src="../assets/js/nav.js"></script>
    
    <!-- SWEET ALERTS -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
    <title>Document</title>
</head>
<body>
<?php
session_start();
    if (!isset($_SESSION['usuario_id'])) {
        echo "<script>window.location.href = '../view/login.php';</script>";
    }

    if($_SESSION['usuario_tipo']!=1){
      echo "<script>window.location.href = '../view/login.php';</script>";
    }
    ?>


<nav>
  <ul class="menu">
  <li class="logo"><img src="../assets//img/logo.png" width="40px"></li>
  <li class="item button"><a href="./inicio.php"><i class="fa-solid fa-arrow-left"></i></a></li>
    <li class="item"><a href="../include/cerrar_sesion.php"><i class="fa-solid fa-right-from-bracket"></i></a></li>
    
    <?php
    if  ($_SESSION['usuario_tipo']==1)  {
      ?>

      <!-- <li class="item button"><a href="reserva.php"><i class="fa-solid fa-house"></i></a></li>
      <li class="item button"><a href="./data.php"><i class="fa-solid fa-calculator"></i></a></li>
      <li class="item button"><a href="./crear.php"><i class="fa-solid fa-plus"></i></a></li> -->

     <?php
    } else if ($_SESSION['usuario_tipo']==2) {
      ?>

      <!-- <li class="item button"><a href="incidencias.php"><i class="fa-solid fa-circle-exclamation"></i></a></li>
      <li class="item button"><a href="./registro_incidencias.php"><i class="fa-solid fa-laptop-file"></i></a></li> -->
      <?php
    }
    ?>
   

    <!-- <li class="item button"><a href="./mapa.php"><i class="fa-solid fa-map"></i></a></li> -->
    <li class="toggle"><a href="#"><i class="fas fa-bars"></i></a></li>
  </ul>
</nav>

<br>
<?php
if ($_SESSION['admin']!=1) {
    ?>
<br>
<div class="caja">
<form action="../include/update_contra.php" method="post">
<img src="../assets/img/password.png" style="width: 90px;" alt="">
    <br>
<br>
<input type="text"  class="escribir_con"  name="correo" placeholder="Correo">
<br>
<br>
<br>
<input type="text"  class="escribir_con"  name="contra_antigua" placeholder="Contraseña actual">
<br>
<br>
<br>
<input type="text"   class="escribir_con" name="contra_nueva" placeholder="Contraseña nueva">
<br>
<br>
<br>
<button class="boton con" type="submit"><span>Cambiar</span></button>
<!-- <input type="submit" value="Cambiar"> -->

</form>
</div>
<?php
    }
    ?>


<?php
if ($_SESSION['admin']==1) {
    ?>
<br>
<div class="caja">
<form action="../include/update_contra.php" method="post">
    <img src="../assets/img/password.png" style="width: 90px;" alt="">
    <br>
<br>
<input type="text" class="escribir_con" name="correo" placeholder="Correo">
<br>
<br>
<br>
<input type="text"  class="escribir_con"  name="contra_nueva" placeholder="Contraseña nueva">
<br>
<br>
<br>
<button class="boton con" type="submit"><span>Cambiar</span></button>




</form>
</div>
<?php
    }
    ?>





<!-- sweetalert2 -->


 <!-- ACCESO DENEGADO -->
 <?php
if (isset($_GET['en'])) {
if ($_GET['en']=='no') {
    ?>
    <script>
Swal.fire({
    background:'#486b7c',
    color:'white',
    icon: 'error',
    title: 'UPS...',
    text: 'Acceso denegado'


})

    </script>
    <?php
}
}

?>

<!-- campos vacio -->
<?php
if (isset($_GET['vacio'])) {
if ($_GET['vacio']=='true') {
    ?>
    <script>
Swal.fire({
    background:'#486b7c',
    color:'white',
    icon: 'error',
    title: 'UPS...',
    text: 'Campos vacíos'


})

    </script>
    <?php
}
}

?>

<!-- cambio correcto -->
<?php
if (isset($_GET['good'])) {
if ($_GET['good']=='true') {
    ?>
    <script>
Swal.fire({
    background:'#486b7c',
    color:'white',
    icon: 'success',
    title: 'TODO CORRECTO',
    text: 'CAMBIO EJECUTADO'


})

    </script>
    <?php
}
}

?>


<!-- cambio correcto -->
<?php
if (isset($_GET['mal'])) {
if ($_GET['mal']=='true') {
    ?>
    <script>
Swal.fire({
    background:'#486b7c',
    color:'white',
    icon: 'error',
    title: 'UPS',
    text: 'Este correo no se corresponde'


})

    </script>
    <?php
}
}

?>



</body>
</html>