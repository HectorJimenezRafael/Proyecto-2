<!DOCTYPE html>
<html lang="en">
<head>
<meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Restaurante DAW</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
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
</head>
<body>

<?php
session_start();
    if (!isset($_SESSION['usuario_id'])) {
        echo "<script>window.location.href = '../view/login.php';</script>";
    }
    ?>

<nav>
  <ul class="menu">
    <li class="logo"><img src="../assets/img/logo.png" width="40px"></li>
    <li class="item"><a href="../include/cerrar_sesion.php"><i class="fa-solid fa-right-from-bracket"></i></a></li>
      <li class="item button"><a href="incidencias.php"><i class="fa-solid fa-circle-exclamation"></i></a></li>
    <li class="item button"><a href="./datos_incidencias.php"><i class="fa-solid fa-calculator"></i></a></li>
    <li class="item button"><a href="./mapa.php"><i class="fa-solid fa-map"></i></a></li>
    <li class="toggle"><a href="#"><i class="fas fa-bars"></i></a></li>
  </ul>
</nav>


<h1 style="text-align:center;margin-top:10px"> <b>Mantenimineto</b>  <i class="fa-solid fa-utensils"></i></h1>




    


<div class="main-container">
    <table class="div-table ">
        <thead>
            <tr>
                <th>Camarero</th>
                <th>Mantenimiento</th>
                <th>Fecha Ini</th>
                <th>Fecha Fin</th>
                <th>Problema</th>
                <th>Soluci??n</th>
                <th>Coste</th>
                <th>Mesa</th>
                <th>Lugar</th>
            </tr>
        </thead>
        <tbody id='tabla-body'>

        </tbody>
    </table>
</div>





<script src="../assets/js/nav.js"></script>
<script src="../assets/js/incidencias.js"></script>
<script>getIncidenciasResol()</script>


</body>
</html>