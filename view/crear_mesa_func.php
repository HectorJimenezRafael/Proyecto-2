<?php

// require_once ('../model/mesa.php');


require_once("../include/connection.php");
require_once ('../model/mesa.php');

$nombre_me=$_POST['nombre_me'];
$lugar=$_POST['lugar'];
$estado=$_POST['estado'];
$capacidad=$_POST['capacidad'];


$nombre_me=mysqli_real_escape_string($conexion,$nombre_me);
$lugar=mysqli_real_escape_string($conexion,$lugar);
$estado=mysqli_real_escape_string($conexion,$estado);
$capacidad=mysqli_real_escape_string($conexion,$capacidad);

if(Mesas::camposmesavacios($nombre_me,$lugar,$estado,$capacidad) !== FALSE){

        echo "<script>location.href='crear.php?campos=false'</script>";
        exit();
    }

if (Mesas::validarnumcap($capacidad)!== TRUE) {
        echo "<script>location.href='crear.php?campos=lol'</script>";
        exit();
}

if ($capacidad<=0) {
        echo "<script>location.href='crear.php?campos=mal'</script>";
        exit();
}



$sql="SELECT * FROM tbl_recurso ";

$resultado=mysqli_query($conexion, $sql);
$error=false;
foreach ($resultado as $mesa_nom ) {
  

  if ($mesa_nom['nombre_mesa']==$nombre_me) {
        $error=true;
  }
}

if ($error==false) {
        $sql= "INSERT INTO `tbl_recurso`( `nombre_mesa`, `id_lugar`, `id_estado`, `capacidad`) VALUES  (?,?,?,?)";

        $stmt = mysqli_stmt_init($conexion);
        
        mysqli_stmt_prepare($stmt,$sql);

        mysqli_stmt_bind_param($stmt,"siii",$nombre_me,$lugar,$estado,$capacidad);

        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        echo "<script>location.href='crear.php?crear=truem'</script>";

} else {
        echo "<script>location.href='crear.php?crear=repeme'</script>";
}






       
?>


