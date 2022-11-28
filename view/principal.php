
<?php
session_start();
if($_SESSION['usuario_tipo']==1){
        echo "<script>window.location.href = '../view/reserva.php';</script>";
      } else {
        echo "<script>window.location.href = '../view/incidencias.php';</script>";
      }


