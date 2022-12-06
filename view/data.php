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
     <!-- LINK BOOTSTRAP -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- HOJA DE ESTILOS CSS -->
    <link rel='stylesheet' type='text/css' media='screen' href='../assets/css/reserva.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../assets/css/data.css'>  
    <link rel='stylesheet' type='text/css' media='screen' href='../assets/css/styles_reserva.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../assets/css/reserva.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../assets/css/data.css'>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <!-- Icono en pestaña -->
    <link rel="shortcut icon" href="../assets/img/logo.png" />
    <!-- Iconos Font Awesome -->
    <script src="https://kit.fontawesome.com/2b5286e1aa.js" crossorigin="anonymous"></script>
    <!-- JS -->
    <script type="text/javascript" src="../assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- SWEET ALERTS -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <li class="logo"><img src="../assets/img/logo.png" width="40px"></li>
    <li class="item"><a href="../include/cerrar_sesion.php"><i class="fa-solid fa-right-from-bracket"></i></a></li>
    <?php
    if  ($_SESSION['usuario_tipo']==1)  {
      ?>
 <li class="item button"><a href="reserva.php"><i class="fa-solid fa-house"></i></a></li>
     <?php
    } else if ($_SESSION['usuario_tipo']==2) {
      ?>
      <li class="item button"><a href="incidencias.php"><i class="fa-solid fa-circle-exclamation"></i></a></li>
      <?php
    }
    ?>
   


    <li class="item button"><a href="./data.php"><i class="fa-solid fa-calculator"></i></a></li>
    <li class="item button"><a href="./mapa.php"><i class="fa-solid fa-map"></i></a></li>
    <li class="toggle"><a href="#"><i class="fas fa-bars"></i></a></li>
  </ul>
</nav>


<h1 style="text-align:center;margin-top:20px"> <b class="tituloMesas">ESTADÍSTICAS</b>  <i class="fa-solid fa-ranking-star"></i></h1>



<div class="datos">
    <div class="media">
        <div class="media-container"><p id='avgMin' class="text-data">AVG</p></div>
        <div class="media-container"><p id='avgDinero' class="text-data">Ganancias</p></div>
    </div>
    <div class="genera"><p id='mediaTiempoDinero' class="text-data">Ganancias</p></div>
</div>



<div id=filtro class="filtro row-c">
    <div class="column-3">
        <input class="numero-clientes" type="text" id="recurso" placeholder="Nombre del Recurso"> 
    </div>
    <div class="column-3">
        <select class="custom-select" name=lugar id=lugar>
        <option value="%">Todos</option>
        </select>
    </div>
        <div class="fechas">
            <p> Fecha Ini  <input type="datetime-local" id="data_ini" /></p>
        </div>
        <div class="fechas">
            <p> Fecha Fin  <input type="datetime-local" id="data_fin"/></p>
        </div>
    <div class="column-3">
        <button class="boton_buscar" onclick="getReservas()" style="margin-bottom: 20px;">
        <div class="sin_encima">
        Buscar     <i class="fa-solid fa-magnifying-glass"></i>
        </div>
        <div class="encima">
        Buscar  <i class="fa-solid fa-magnifying-glass-plus"></i>
        </div>
        </button>
    </div>
    </div>
</div>

<div class="main-container">
    <table class="div-table ">
        <thead>
            <tr>
                <th>Nombre Recurso <i class="fa-solid fa-globe"></i></th>
                <th>Lugar <i class="fa-solid fa-map-location-dot"></i></th>
                <th>Num Clientes <i class="fa-solid fa-users-viewfinder"></i></th>
                <th>Ganancias <i class="fa-solid fa-sack-dollar"></i></th>
                <th>Veces Ocupadas <i class="fa-solid fa-arrow-up-9-1"></i></th>
                <th>Media Min <i class="fa-solid fa-clock"></i></th>
            </tr>
        </thead>
        <tbody id='tabla-body'>

        </tbody>
    </table>
</div>
<script src="../assets/js/alert-server.js"></script>
<script src="../assets/js/validaciones.js"></script>
<script src="../assets/js/stats.js"></script>
<script src="../assets/js/reserva_online.js"></script>
<script>
getData();
getReservas();
</script>
<script src="../assets/js/nav.js"></script>
<br>
    <br>
    <br>
    <!-- pie de página -->
    <div class="flex">
        <footer class="pie-pagina">
            <div class="grupo-1">
                <div class="box_f">
                    <figure class="flex">
                        <a href="#">
                            <img src="../assets/img/logo.png" class="logo_f" alt="">
                            
                        </a>
                    </figure>
                </div>
                <div style="text-align:center;" class="box_f ">
                
                   <h2>El éxito depende de que puedas transmitir tus valores al equipo </h2>
                 
                   <img  src="../assets/img/team_work.png " class="team_work" alt="">

                </div>
                <div class="box_f ">
                    <h2 style="text-align:center;">GUÍA DEL PROYECTO</h2>
                    
                    <div  style="text-align:center;" class="red-social">
                        <a href="https://github.com/SergioMerino2021/P1_Reserva_de_taules/blob/Raul/README.md" ><i class="fa-brands fa-github"></i></a> 
                       
                      
                    </div>
                </div>
            </div>
            <div class="grupo-2">
                <small>&copy; 2022 <b>DAW</b> - Todos los Derechos Reservados.</small>
            </div>
        </footer>
    </div>
</body>
</html>