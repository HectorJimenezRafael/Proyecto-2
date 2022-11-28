<?php


require_once("../include/connection.php");
require_once ('../model/mesa.php');

$lugar=$_POST['lugar_c'];



$lugar=mysqli_real_escape_string($conexion,$lugar);


if(Mesas::camposlugarvacios($lugar) !== FALSE){

        echo "<script>location.href='crear.php?campos=false'</script>";
        exit();
    }




    

$sql="SELECT * FROM tbl_lugar ";

$resultado=mysqli_query($conexion, $sql);
$error=false;
foreach ($resultado as $lugar_indi ) {
  

  if ($lugar_indi['lugar_recurso']==$lugar) {
        $error=true;
  }
}

if ($error==false) {
       $sql= "INSERT INTO `tbl_lugar`( `lugar_recurso`) VALUES  (?)";

        $stmt = mysqli_stmt_init($conexion);
        
        mysqli_stmt_prepare($stmt,$sql);

        mysqli_stmt_bind_param($stmt,"s",$lugar);

        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);


echo "<script>location.href='crear.php?crear=truel'</script>";
} else {
        
echo "<script>location.href='crear.php?crear=error'</script>";
}

