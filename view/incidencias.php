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
    <script type="text/javascript" src="../assets/js/incidencias.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- SWEET ALERTS -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <title>Incidencias</title>

</head>
<body>

<?php
session_start();
    if (!isset($_SESSION['usuario_id'])) {
        echo "<script>window.location.href = '../view/login.php';</script>";
    }
    if($_SESSION['usuario_tipo']!=2){
      echo "<script>window.location.href = '../view/login.php';</script>";
    }
    //$_SESSION['usuario_tipo']==2
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

<h1 style="text-align:center;margin-top:10px"> <b>INCIDENCIAS</b>  <i class="fa-solid fa-triangle-exclamation"></i></h1>
    


<div id="container-incidencias">


</div>


<!-- Modal -->
<div id="modal1" class="Myoverlay">
  <input type="hidden" id="user" value=<?php echo $_SESSION['usuario_id']; ?> />
  <div class="Mymodal">
  <a class="cancel" href="#"><i class="fa-solid fa-circle-xmark"></i></a>
    <h2 id=titulo></h2>
    <div class="content" id=content>
    <p>Click outside the modal to close.</p>
    </div>
  </div>
</div>



<script>info_get_mesas_rotas()</script>
<script src="../assets/js/validaciones.js"></script>
<script src="../assets/js/reserva_online.js"></script>
<br>
    <br>
    <br>
    <!-- pie de p??gina -->
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
                
                   <h2>El ??xito depende de que puedas transmitir tus valores al equipo </h2>
                 
                   <img  src="../assets/img/team_work.png " class="team_work" alt="">

                </div>
                <div class="box_f ">
                    <h2 style="text-align:center;">GU??A DEL PROYECTO</h2>
                    
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