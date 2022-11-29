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




<div class="content">

<h1 class="logo">Reserva <span>CLIENTE</span></h1>

<div class="contact-wrapper animated bounceInUp">
    <div class="contact-form">
        
        <form action="lol.php" method="POST">
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
                <input type="tel" name="personas">
                
            </p>
            <p>
            <label>Fecha</label>
                <input type="date" name="fecha">
                
            </p>
            <p>
            <label>Lugar</label>
                <input type="text" name="lugar" >
                
            </p>

            <p>
            <label>Hora</label>
                <input type="text" name="lugar" >
                
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
    text: 'Nombre de usuario o contraseña incorrectas'


})

    </script>
    <?php
}
}

?>

</html>