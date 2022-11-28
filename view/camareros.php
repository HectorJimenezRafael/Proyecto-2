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

    if ($_SESSION['admin']!=1) {
      echo "<script>window.location.href = '../view/inicio.php?en=no';</script>";
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
<br>
<div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3  class="text-center">Camareros</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" id="frm">
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="hidden" name="idp" id="idp" value="">
                                <input type="text" name="nombre" id="nombre" placeholder="nombre" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Apellido</label>
                                <input type="text" name="apellido" id="apellido" placeholder="apellido" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Teléfono</label>
                                <input type="text" name="telefono" id="telefono" placeholder="teléfono" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Correo</label>
                                <input type="text" name="correo" id="correo" placeholder="correo" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Contraseña</label>
                                <input type="text" name="passwd" id="passwd" placeholder="contraseña" class="form-control">
                            </div>
                          
                            <div class="form-group">
                                <input type="button" value="Registrar" id="registrar" class="btn btn-primary btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-6 ml-auto">
                        <form action="" method="post" id="busqueda">
                            <div class="form-group">
                                <label style="font-size: 20px; text-align:center" for="buscar_nombre">Buscar <i class="fa-solid fa-magnifying-glass"></i></label>
                                <input type="text" name="buscar_nombre" id="buscar_nombre" placeholder="Buscar Nombre" class="form-control">
                                <br>
                                <input type="text" name="buscar_apellido" id="buscar_apellido" placeholder="Buscar Apellido" class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-hover table-resposive">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Opciones</th>
                            
                        </tr>
                    </thead>
                    <tbody id="resultado">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="../assets/js/camareros.js"></script>

</body>
</html>