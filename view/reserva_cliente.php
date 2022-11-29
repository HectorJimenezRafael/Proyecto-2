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
                <label>Nombre</label>
                <input type="text" name="Nombre">
            </p>
            <p>
                <label>Apellido</label>
                <input type="text" name="Apellido">
            </p>
            <p>
            <label>Correo</label>
                <input type="email" name="correo">
            </p>
            <p>
            <label>Teléfono</label>
                <input type="tel" name="phone">
                
            </p>
            <p>
            <label>Personas</label>
                <select name="personas" id="personas">
<option value="2">2</option>
<option value="4">4</option>
<option value="6">6</option>
<option value="8">8</option>
                </select>
                
            </p>
            <p>
            <label>Fecha</label>
                <input type="date" name="fecha">
                
            </p>
            <p>
            <label>Lugar</label>
            <select name="lugar" id="lugar">
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

$sql="SELECT * FROM tbl_horas;";

$query = $pdo->prepare($sql);

$query->execute();

$resultado = $query->fetchAll(PDO::FETCH_ASSOC);


?>

            <p>
            <label>Hora</label>
            <select name="hora" id="hora">
            <?php
foreach ($resultado as $uwu ) {
  ?>
  <option value="<?php echo $uwu['id']; ?>"><?php echo $uwu['hora']; ?></option>
 
  <?php
}
?>
</select>
                
            </p>
            <!-- <p class="block">
              
               <label>Message</label> 
                <textarea name="message" rows="2"></textarea>
            </p> -->
            <p class="block">
                <button type="submit" >
                    Send
                </button>
            </p>
            
           
        </form>
        <p class="block">
           
           <button>
           <a href="login.php">Volver</a>
           </button>
           
       </p>
    </div>
    <div class="contact-info">
       
       <img class="logo_res" src="../assets/img/logo.png" alt="">
       <br>
       <br>
       <br>
       <img class="imagen_res" src="../assets/img/restaurante.webp" alt="">
    </div>
</div>

</div>




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
    icon: 'error',
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

</html>