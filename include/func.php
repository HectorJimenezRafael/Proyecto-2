
<?php


function validar($nombre, $pass, $conexion)
{
    $nombre = $conexion -> real_escape_string($nombre);
    $pass = $conexion -> real_escape_string($pass);




    $stmt = "SELECT ".USUARIO['pass_usu']." FROM ".USUARIO['tabla']." WHERE ".USUARIO['nombre_usu']." = '$nombre';";

    $account_password = mysqli_fetch_assoc(mysqli_query($conexion, $stmt))[USUARIO['pass_usu']];

    // echo "$account_password";

    if ($pass == $account_password) {
        return true;
    }
    return false;
}

function iniciar_sesion($nombre, $conexion)
{
    $nombre = $conexion -> real_escape_string($nombre);
    $nombre = trim(strip_tags($nombre));

    $stmt = "SELECT *  FROM tbl_usuarios WHERE usuario_nombre = '$nombre'";

    $registro_usuario = mysqli_fetch_assoc(mysqli_query($conexion, $stmt));

    session_start();
   

    $_SESSION['usuario_nombre'] = $registro_usuario['usuario_nombre'];

    $_SESSION['usuario_id'] = $registro_usuario['id'];

    $_SESSION['usuario_tipo'] = $registro_usuario['usuario_tipo'];
    

}


function errorTexto($text){
    if(!preg_match("/^[A-Za-z0-9 -]*$/",$text)){
        $error=true;
    }else{
        $error=false;
    }
    return $error;
    
}

function errorID($id){
    if(is_numeric($id) && $id>0 && $id != ''){
        $error=false;
    }else{
        $error=true;
    }  
    return $error;
}



function errorCoste($num){
    if(is_numeric($num) && $num>=0 && $num != ''){
        $error=false;
    }else{
        $error=true;
    }  
    return $error;
}

function errorCliente($num){
    if(is_numeric($num) && $num>0 && $num != ''){
        $error=false;
    }else{
        $error=true;
    }  
    return $error;
}