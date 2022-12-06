<!DOCTYPE html>
<html lang="en">
<head>
<meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Restaurante DAW</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- Fuente -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa+Ink:wght@700&family=Montserrat:ital@0;1&display=swap" rel="stylesheet">
    <!-- Enlace al CSS -->
    <link rel='stylesheet' type='text/css' media='screen' href='../assets/css/styles.css'>
    <!-- Icono en pestaña -->
    <link rel="shortcut icon" href="../assets/img/logo.png" />
    <!-- Iconos Font Awesome -->
    <script src="https://kit.fontawesome.com/2b5286e1aa.js" crossorigin="anonymous"></script>
    <!-- JS -->
    <script type="text/javascript" src="../assets/js/script.js"></script>

    <!-- SWEET ALERTS -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body class="log-body">

<?php
session_start();
session_destroy();
?>
<!-- Fondo Login -->
<ul class="background">
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
</ul>
<!-- Fin Fondo -->
<div class="logo">
</div>
 <div class="container">
 <img src="../assets/img/img_login.png">
    <div id="login">
    <form class="form-login" action="../controller/login_controller.php" method="post">
    <fieldset class="clearfix">
    <small id="error_nombre" class="alerts"><b><i class="fa-solid fa-circle-exclamation"></i> Error en el campo correo </b></small> 
<p><span class="fontawesome-user"></span><input class="casilla log-input" type="text" id="usuario_nombre" name="usuario_nombre" placeholder="Introduce tu correo" required></p>

<small id="error_contra" class="alerts"><b><i class="fa-solid fa-circle-exclamation"></i> Error en el campo contraseña </b></small>
<p><span class="fontawesome-lock"></span><input class="casilla log-input" type="password" id="contra_usu" name="contra_usu" placeholder="Introduce la contraseña" required></p>





<button class="boton-ini" onclick="validar_inicio()"  type="submit" value="Sign In">

<div class="sin_encima">
Sign in  <i class="fa-solid fa-martini-glass-empty"></i>
</div>

<div class="encima">
Sign in  <i class="fa-solid fa-martini-glass"></i>
</div>

</button>

</fieldset>



</form>
<a href="reserva_cliente.php">
<button  class="boton-ini"> Reserva cliente</button>
</a>

</div>
</body>
<script src="../assets/js/reserva_online.js"></script>
<!-- SWEET ALERTS -->

<!-- Nombre, contra o ambas incorrectas -->
<?php
if (isset($_GET['error'])) {
if ($_GET['error']=='true') {
    ?>
    <script>
Swal.fire({
    background:'#486b7c',
    color:'white',
    icon: 'error',
    title: 'UPS...',
    text: 'Correo o contraseña incorrectas'


})

    </script>
    <?php
}
}

?>

</html>