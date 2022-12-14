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
    
    <link rel='stylesheet' type='text/css' media='screen' href='../assets/css/reserva_cliente.css'>
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

<?php
require_once '../include/connection.php';
$sql="SELECT * FROM tbl_lugar;";

$query = $pdo->prepare($sql);

$query->execute();

$resultado = $query->fetchAll(PDO::FETCH_ASSOC);


?>



<div class="content">

<h1 class="logo">Reserva <span>CLIENTE</span></h1>

<div class="contact-wrapper animated bounceInUp">
    <div class="contact-form">
        
        <form action="../func_online/registrar_online.php" method="POST">
            <p>
                <label>Nombre <i class="fa-solid fa-address-card"></i></label>
                <input type="text" name="Nombre" id="Nombre">
                <span id="error_nombre" style="color:darkgoldenrod;display:none;">Error en el campo nombre <i class="fa-solid fa-circle-exclamation"></i></span>
            </p>
            <p>
                <label>Apellido <i class="fa-solid fa-address-card"></i></label>
                <input type="text" name="Apellido" id=Apellido>
                <span id="error_apellido" style="color:darkgoldenrod;display:none;">Error en el campo apellido <i class="fa-solid fa-circle-exclamation"></i></span>
            </p>
            <p>
            <label>Correo <i class="fa-solid fa-envelope"></i></label>
                <input type="email" name="correo" id="Correo">
                <span id="error_correo" style="color:darkgoldenrod;display:none;">Error en el campo correo <i class="fa-solid fa-circle-exclamation"></i></span>

            </p>
            <p>
            <label>Teléfono <i class="fa-solid fa-phone"></i></label>
                <input type="tel" name="phone" id="Phone">
                <span id="error_phone" style="color:darkgoldenrod;display:none;">Error en el campo teléfono<i class="fa-solid fa-circle-exclamation"></i></span>

            </p>
            <p>
            <label>Personas <i class="fa-solid fa-users"></i></label>
                <select name="personas" id="personas" class="select-css">
<option value="2">2</option>
<option value="4">4</option>
<option value="6">6</option>
<option value="8">8</option>
                </select>
                
            </p>
            <p>
            <?php $hoy= date("Y-m-d"); ?>
            <label>Fecha <i class="fa-solid fa-calendar-days"></i></label>
                <input type="date" min="<?php echo$hoy;?>" name="fecha" id="fecha">
                <span id="error_fecha" style="color:darkgoldenrod;display:none;">Error en el campo fecha<i class="fa-solid fa-circle-exclamation"></i></span>

                
            </p>
            <p>
            <label>Lugar <i class="fa-solid fa-map-location-dot"></i> </label>
            <select name="lugar" id="lugar" class="select-css">
            <?php
foreach ($resultado as $uwu ) {
  ?>
  <option value="<?php echo $uwu['id']; ?>"><?php echo $uwu['lugar_recurso']; ?></option>
 
  <?php
}
?>
</select>
            </p>
            <?php

$sql="SELECT * FROM tbl_horas WHERE hora>CURRENT_TIME;";

$query = $pdo->prepare($sql);

$query->execute();

$resultado = $query->fetchAll(PDO::FETCH_ASSOC);


?>

            <p>
            <label>Hora <i class="fa-solid fa-clock"></i></label>
            <select style="display: none;" name="hora" id="hora" class="select-css">

</select>
                
            </p>
            <!-- <p class="block">
              
               <label>Message</label> 
                <textarea name="message" rows="2"></textarea>
            </p> -->
            <p class="block">
                <button type="submit" onclick='return validar()' >
                    RESERVAR <i class="fa-solid fa-arrows-to-circle"></i>
                </button>
            </p>
            
           
        </form>
        
           
           <button class="boton">
           <a href="login.php">Volver <i class="fa-solid fa-arrow-left-long"></i></a>
           </button>
           
       
    </div>
    <div class="contact-info">
       
       <img class="logo_res" src="../assets/img/logo.png" alt="">
       <br>
       <a class="numeros" style="font-size: 20px;color: #5CA4A9;" href="tel:+34678567876"><i class="fa-solid fa-phone-volume"></i></a>
       <br>
       <br>
       <img class="imagen_res" src="../assets/img/restaurante.webp" alt="">
    </div>
</div>

</div>

<script src="../assets/js/horario.js"></script>
<script src="../assets/js/validar.js"></script>
<script src="../assets/js/reserva_online.js"></script>

</body>

<!-- SWEET ALERTS -->

<!-- MESA DISPONIBLE -->
<?php
if (isset($_GET['mesas'])) {
if ($_GET['mesas']=='si') {
    ?>
    <script>
Swal.fire({
    background:'#486b7c',
    color:'white',
    icon: 'success',
    title: 'RESERVADA REALIZADA',
    text: 'LE ESPERAMOS'


})

    </script>
    <?php
}
}

?>


<!-- MESA NO DISPONIBLE-->
<?php
if (isset($_GET['mesas'])) {
if ($_GET['mesas']=='no') {
    ?>
    <script>
Swal.fire({
    background:'#486b7c',
    color:'white',
    icon: 'error',
    title: 'LO SENTIMOS',
    text: 'No hay más mesas disponibles con estás caracteríticas'


})

    </script>
    <?php
}
}

?>


<!-- CAMPOS VACIOS-->
<?php
if (isset($_GET['mesas'])) {
if ($_GET['mesas']=='vacio') {
    ?>
    <script>
Swal.fire({
    background:'#486b7c',
    color:'white',
    icon: 'error',
    title: 'UPS',
    text: 'Campos no rellenados'


})

    </script>
    <?php
}
}

?>


<!-- Error de formato-->
<?php
if (isset($_GET['mesas'])) {
if ($_GET['mesas']=='for') {
    ?>
    <script>
Swal.fire({
    background:'#486b7c',
    color:'white',
    icon: 'error',
    title: 'ERROR',
    text: 'Formato de los campos incorrecto'


})

    </script>
    <?php
}
}

?>


<!-- Error de fecha-->
<?php
if (isset($_GET['mesas'])) {
if ($_GET['mesas']=='edate') {
    ?>
    <script>
Swal.fire({
    background:'#486b7c',
    color:'white',
    icon: 'error',
    title: 'ERROR',
    text: 'Fecha sobrepasada'


})

    </script>
    <?php
}
}

?>

</html>