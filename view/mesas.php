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
   <link rel="stylesheet" href="../assets/css/cruds.css">
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

    // if ($_SESSION['admin']!=1) {
    //   echo "<script>window.location.href = '../view/inicio.php?en=no';</script>";
    // }
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
                <div class="card" style="border-radius: 30px;">
                    <div class="card-header  titulo2" style="background-color: #8eb9d6;border-radius: 30px 30px 0px 0px;">
                        <h3  class="text-center">Mesas <i class="fa-solid fa-chair"></i></h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" id="frm" enctype="multipart/form-data">
                        <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="hidden" name="idp" id="idp" value="">
                                <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="form-control">
                            </div>
                            <br>
                            <?php
                            require_once '../include/connection.php';
                            $sql="SELECT * FROM tbl_lugar;";

                            $query = $pdo->prepare($sql);

                            $query->execute();

                            $lugares = $query->fetchAll(PDO::FETCH_ASSOC);


                            ?>
                            <div class="form-group">
                                <label for="lugar">Lugar</label>
                               <br>
                                <select name="lugar" id="lugar" class="select-css">
                                <?php
                                foreach ($lugares as $lugar ) {
                                    ?>
                              <option value=<?php echo $lugar['id']; ?>><?php echo $lugar['lugar_recurso'];  ?> </option>
                               <?php
                                }
                                ?>
                                   
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                            <label for="capacidad">Capacidad</label>
                            <br>
                                <select name="capacidad" id="capacidad"  class="select-css-n">
                                    <option value="2">2</option>
                                    <option value="4">4</option>
                                    <option value="6">6</option>
                                    <option value="8">8</option>
                                </select>
                            </div>
                            <br>
                            <label for="imagen" >
                            Imagen <i class="fas fa-cloud-upload-alt"></i> 
                            </label>
                            <input type="file" name="imagen" id="imagen" class="subir" >
                            <br>
                            <!-- <input type="file" name="imagen" id="imagen" placeholder="nombre" class="form-control"> -->
                            
                         
                          <br>
                            <div class="form-group" style="text-align: center;">
                            
                                <input type="button" value="Registrar" id="registrar" class="btn btn-primary btn-block boton_in">
                            </div>
                        </form>
                        <br>
                        <div class="form-group" style="text-align: center;">
                                <input type="button" onclick="reiniciar()" value="Reiniciar" id="reiniciar" class="btn btn-primary btn-block boton_in">
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="container_table">
                <div class="row" style="width:100%;">
                    <div class="col-lg-6 ml-auto" style="width:100%;text-align:center;">
                    <button class="boton_in" id="boton_buscar" onclick="mostrar()">  Buscar <i class="fa-solid fa-magnifying-glass"></i></button>
                   
                        <form action="" method="post" id="busqueda">
                            <div class="form-group2">
                                
                              <div style="display: flex;gap:15px;margin-top:10px;width:100%;">
                                <input style="display: none;" type="text" name="buscar_nombre" id="buscar_nombre" placeholder="Nombre..." class="form-control">
                                <p id="titulo_lugar" style="margin-top: 10px;font-size: 20px;color:white;display: none;">Lugar </p>
                                <select style="display: none;" name="buscar_lugar" id="buscar_lugar" >
                                <option value="">Indiferente</option>
                                <?php
                                foreach ($lugares as $lugar ) {
                                    ?>
                              <option value=<?php echo $lugar['id']; ?>><?php echo $lugar['lugar_recurso'];  ?> </option>
                               <?php
                                }
                                ?>
                                </select>
                                <p id="titulo_capacidad" style="margin-top: 10px;font-size: 20px;color:white;display: none;">Capacidad </p>
                                <select style="display: none;" name="buscar_capacidad" id="buscar_capacidad">
                                    <option value="">Indiferente</option>
                                    <option value="2">2</option>
                                    <option value="4">4</option>
                                    <option value="6">6</option>
                                    <option value="8">8</option>
                                </select>
                              
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
                <br>
                <br>
                <div class="scroll">
                <table class="table table-hover   "  >
                    <thead class="bg-info" >
                        <tr>
                        <th>ID</th>
                            <th>Nombre</th>
                            <th>Lugar</th>
                            <th>Capacidad</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody class="table-info"id="resultado">

                    </tbody>
                    </div>
                </table>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/mesas.js"></script>
    <script src="../assets/js/reserva_online.js"></script>

</body>
</html>
