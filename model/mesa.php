<?php

class Mesas {
    protected $nombre;
    

    //Constructor vacio
    public function __construct(){
    }

    private static function bd(){
        require  "../include/connection.php";
        return $conexion;
    }

    public static function getMesas(){
        $conexion=self::bd();
        require_once '../include/connection.php';
        $sql="SELECT rec.id as id, rec.nombre_mesa as nombre, rec.capacidad as capacidad, est.nombre_estado as estado, lug.lugar_recurso as lugar,rec.coordX as X, rec.coordY as Y,
        rec.scale as scale,rec.img_recurso
        FROM 
        tbl_recurso as rec inner join tbl_estado as est on rec.id_estado=est.id inner join tbl_lugar as lug ON lug.id = rec.id_lugar ORDER BY rec.id_estado,lugar, id asc;";


        // $stmt=$pdo->prepare($sql);

        // $stmt->execute();


        // $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);

        // $resultadodef='echo json_encode($resultado)';

        $stmt = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);
            
       
        mysqli_stmt_execute($stmt);
        $consulta = mysqli_stmt_get_result($stmt);
    
        $resultadoconsulta=mysqli_fetch_all($consulta);

        mysqli_stmt_close($stmt);
        
        return $resultadoconsulta;
    }

    
    public static function getLugares(){
        $conexion=self::bd();

        $where='';

        $sql="SELECT lugar_recurso as lugar FROM tbl_lugar;";

        $stmt = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);
            
        // mysqli_stmt_bind_param($stmt,"i",$id);
        mysqli_stmt_execute($stmt);
        $consulta = mysqli_stmt_get_result($stmt);
    
        $resultadoconsulta=mysqli_fetch_all($consulta);

        mysqli_stmt_close($stmt);
        
        return $resultadoconsulta;
    }

    public static function setReserva($mesa,$user,$num_clientes){
        $conexion=self::bd();

        $estado = 2;
        try{

            $sql3="SELECT b.nombre_estado as estado FROM tbl_recurso as a INNER JOIN tbl_estado as b ON a.id_estado = b.id where a.id = ?";
            $stmt3 = mysqli_stmt_init($conexion);
            mysqli_stmt_prepare($stmt3,$sql3);
            mysqli_stmt_bind_param($stmt3,"i",$mesa);
            mysqli_stmt_execute($stmt3);
            $consulta = mysqli_stmt_get_result($stmt3);
    
            $resultadoconsulta=mysqli_fetch_all($consulta);
            mysqli_stmt_close($stmt3);

            if($resultadoconsulta[0][0] == 'ocupado'){
                return 'ocupado';
            };
            
            $finalizado=0;
            $sql="INSERT INTO tbl_reserva (id_usuario, id_recurso,data_ini,num_clientes,finalizado) values (?,?,current_timestamp(),?,?)";
            $stmt = mysqli_stmt_init($conexion);
            mysqli_stmt_prepare($stmt,$sql);
            mysqli_stmt_bind_param($stmt,"iiii",$user,$mesa,$num_clientes,$finalizado);
            mysqli_stmt_execute($stmt);
            $id=mysqli_insert_id($conexion);
            mysqli_stmt_close($stmt);

            $sql2="UPDATE tbl_recurso SET id_estado = ? WHERE id = ?";
            $stmt2 = mysqli_stmt_init($conexion);
            mysqli_stmt_prepare($stmt2,$sql2);
            mysqli_stmt_bind_param($stmt2,"ii",$estado,$mesa);
            mysqli_stmt_execute($stmt2);
            
            mysqli_stmt_close($stmt2);




            $ok=$id;
        }catch(Exception $e){
            $ok=false;
        }
    
        return $ok;
    }

    public static function getInfoMesas($id){
        $conexion=self::bd();

        $sql="SELECT rec.id as id, rec.nombre_mesa as nombre, rec.capacidad as capacidad, est.nombre_estado as estado, lug.lugar_recurso as lugar
        FROM 
        tbl_recurso as rec inner join tbl_estado as est on rec.id_estado=est.id inner join tbl_lugar as lug ON lug.id = rec.id_lugar where rec.id = ?;";

        $stmt = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);
            
        mysqli_stmt_bind_param($stmt,"i",$id);
        mysqli_stmt_execute($stmt);
        $consulta = mysqli_stmt_get_result($stmt);
    
        $resultadoconsulta=mysqli_fetch_all($consulta);

        mysqli_stmt_close($stmt);
        
        return $resultadoconsulta;
    }


    public static function actu_mesa($mesa,$sitios){
       

        $sql="UPDATE tbl_recurso SET `capacidad`=$mesa WHERE `id`=$sitios";
     
            
      
      
    }

    public static function getFiltroMesa($lugar,$cantidad){
        $conexion=self::bd();

        $sql="SELECT rec.id as id, rec.nombre_mesa as nombre, rec.capacidad as capacidad, est.nombre_estado as estado, lug.lugar_recurso as lugar
        FROM 
        tbl_recurso as rec inner join tbl_estado as est on rec.id_estado=est.id inner join tbl_lugar as lug ON lug.id = rec.id_lugar where lug.lugar_recurso like ? and  ? <= rec.capacidad ORDER BY rec.id_estado asc";

        $stmt = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);
            
        mysqli_stmt_bind_param($stmt,"si",$lugar,$cantidad);
        mysqli_stmt_execute($stmt);
        $consulta = mysqli_stmt_get_result($stmt);
    
        $resultadoconsulta=mysqli_fetch_all($consulta);

        mysqli_stmt_close($stmt);
        
        return $resultadoconsulta;
    }


    public static function editReservaMesaPedido($id, $coste,$usuario){
        $conexion=self::bd();

        $finalizadoWhere=0;
        $finalizado=1;
        $sql="UPDATE tbl_reserva SET precio = ?, data_fin = current_timestamp(),finalizado = ? WHERE id_recurso = ? and precio = 0 and id_usuario = ? and finalizado = ?;";

        $stmt = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt,"diiii",$coste,$finalizado,$id,$usuario,$finalizadoWhere);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        

        $estado = 1;

        $sql2="UPDATE tbl_recurso SET id_estado = ? WHERE id = ?";
        $stmt2 = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt2,$sql2);
        mysqli_stmt_bind_param($stmt2,"ii",$estado,$id);
        mysqli_stmt_execute($stmt2);
        
        mysqli_stmt_close($stmt2);

        return true;
    }



    //Data reservas
    public static function getMediaMinutos(){
        $conexion=self::bd();

        $sql="select avg(TIMESTAMPDIFF(SECOND,data_ini,data_fin)/60) as media_min from tbl_reserva;";

        $stmt = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);
            
        mysqli_stmt_execute($stmt);
        $consulta = mysqli_stmt_get_result($stmt);
    
        $resultadoconsulta=mysqli_fetch_all($consulta);

        mysqli_stmt_close($stmt);
        
        return $resultadoconsulta;
    }

    public static function getMediaGanancias(){
        $conexion=self::bd();

        $sql="select avg(precio) as media from tbl_reserva;";

        $stmt = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);
            
        mysqli_stmt_execute($stmt);
        $consulta = mysqli_stmt_get_result($stmt);
    
        $resultadoconsulta=mysqli_fetch_all($consulta);

        mysqli_stmt_close($stmt);
        
        return $resultadoconsulta;
    }

    public static function getStatsReserva($nombre,$lugar,$where,$dataIni,$dataFin){
        $conexion=self::bd();

        $sql="SELECT tbl_recurso.nombre_mesa ,tbl_reserva.id_recurso as 'id reserva', avg(tbl_reserva.precio) as 'media precio' , 
        count(tbl_reserva.id) as 'num reservas', sum(tbl_reserva.num_clientes) as 'num cli', tbl_lugar.lugar_recurso as 'lugar',
        avg(TIMESTAMPDIFF(SECOND,tbl_reserva.data_ini,tbl_reserva.data_fin)/60)
        FROM tbl_reserva INNER JOIN tbl_recurso ON tbl_reserva.id_recurso=tbl_recurso.id INNER JOIN tbl_lugar ON tbl_recurso.id_lugar=tbl_lugar.id
        $where
        group by tbl_reserva.id_recurso having tbl_lugar.lugar_recurso like ? and tbl_recurso.nombre_mesa like ?;";

        $stmt = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);
        if($where == ''){
            mysqli_stmt_bind_param($stmt,"ss",$lugar,$nombre); 
        }else{
            mysqli_stmt_bind_param($stmt,"ssss",$dataIni,$dataFin,$lugar,$nombre); 
        }
        
        mysqli_stmt_execute($stmt);
        $consulta = mysqli_stmt_get_result($stmt);

        $resultadoconsulta=mysqli_fetch_all($consulta);

        mysqli_stmt_close($stmt);

        return $resultadoconsulta;
    }



    // INCIDENCIAS FUNCIONES

    public static function get_mesas_rotas(){
        $conexion=self::bd();

        $sql="SELECT * from tbl_recurso where id_estado = 3";
        $stmt = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);

        mysqli_stmt_execute($stmt);
        $consulta = mysqli_stmt_get_result($stmt);

        $resultadoconsulta=mysqli_fetch_all($consulta);

        mysqli_stmt_close($stmt);

        return $resultadoconsulta;
        
    }

    public static function info_get_mesas_rotas(){

    $conexion=self::bd();

    $sql="SELECT tbl_mantenimiento.id, tbl_usuarios.usuario_nombre as 'id usuario ini', tbl_usuarios.id,
    tbl_recurso.nombre_mesa,tbl_recurso.id as 'id mesa', tbl_mantenimiento.problema as 'problemas', 
   tbl_mantenimiento.data_ini as 'fecha inicial'
   FROM tbl_mantenimiento INNER JOIN tbl_recurso ON tbl_recurso.id = tbl_mantenimiento.id_recurso
   INNER JOIN tbl_usuarios ON tbl_usuarios.id = tbl_mantenimiento.id_usuario_ini
   where tbl_mantenimiento.finalizado = 0;";

    $stmt = mysqli_stmt_init($conexion);
    mysqli_stmt_prepare($stmt,$sql);

    mysqli_stmt_execute($stmt);
    $consulta = mysqli_stmt_get_result($stmt);

    $resultadoconsulta=mysqli_fetch_all($consulta);

    mysqli_stmt_close($stmt);

    return $resultadoconsulta;

    }
   

    public static function setIncidencia($user_ini,$mesa,$problema){
        $conexion=self::bd();
        $sql="INSERT INTO tbl_mantenimiento (id_usuario_ini,id_recurso,problema) values (?,?,?);";
        
        $stmt = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);

        mysqli_stmt_bind_param($stmt,"iis",$user_ini,$mesa,$problema);

        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);


        $sql="UPDATE tbl_recurso SET id_estado = 3 WHERE id = ?;";
        
        $stmt = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);

        mysqli_stmt_bind_param($stmt,"i",$mesa);

        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        return true;
        
    }
// borrar mesa
    public static function borrar_mesa($mesa){
        $conexion=self::bd();
        $sql="DELETE FROM tbl_recurso WHERE id = ?";

        $stmt = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);

        mysqli_stmt_bind_param($stmt,"i",$mesa);

        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        return true;

    }

    public static function mesa_reparada($mesa,$usuario,$coste,$solucion){
        $conexion=self::bd();

        $sql = "UPDATE tbl_mantenimiento SET data_fin = current_timestamp(), id_usuario_fin = ?, solucion = ?, coste = ?, finalizado=1 where id_recurso = ? and finalizado = 0";

        $stmt = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);

        mysqli_stmt_bind_param($stmt,"isdi",$usuario,$solucion,$coste,$mesa);

        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);


        $sql="UPDATE tbl_recurso SET id_estado = 1 WHERE id = ?;";
        
        $stmt = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);

        mysqli_stmt_bind_param($stmt,"i",$mesa);

        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        return true;
    }

    public static function getIncidenciasFin(){
        $conexion=self::bd();

        $sql="SELECT u.usuario_nombre as 'nin',u2.usuario_nombre as 'fin', m.data_ini,m.data_fin, m.problema, m.solucion, m.coste,
        rec.nombre_mesa,lug.lugar_recurso
        FROM tbl_mantenimiento as m 
        INNER JOIN tbl_usuarios as u ON m.id_usuario_ini = u.id 
        INNER JOIN tbl_usuarios as u2 ON m.id_usuario_fin = u2.id
        INNER JOIN tbl_recurso as rec ON m.id_recurso = rec.id
        INNER JOIN tbl_lugar as lug ON rec.id_lugar = lug.id";
            
        $stmt = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);

        mysqli_stmt_execute($stmt);
        $consulta = mysqli_stmt_get_result($stmt);

        $resultadoconsulta=mysqli_fetch_all($consulta);

        mysqli_stmt_close($stmt);

        return $resultadoconsulta;
        
    }



    // public static function crearMesa($nombre_me,$lugar,$estado,$capacidad){
    //     $conexion=self::bd();


    //     $sql= "INSERT INTO `tbl_recurso`( `nombre_mesa`, `id_lugar`, `id_estado`, `capacidad`) VALUES  ('?','?','?','?')";
    //     $stmt = mysqli_stmt_init($conexion);
    //     mysqli_stmt_prepare($stmt,$sql);

    //     mysqli_stmt_bind_param($stmt,"siii",$nombre_me,$lugar,$estado,$capacidad);

    //     mysqli_stmt_execute($stmt);

    //     mysqli_stmt_close($stmt);

    //     return true;

    // }


    public static function crearMesa($nombre_me,$lugar,$estado,$capacidad){
        $conexion=self::bd();


        $sql= "INSERT INTO `tbl_recurso`( `nombre_mesa`, `id_lugar`, `id_estado`, `capacidad`) VALUES  ('?','?','?','?')";
        $stmt = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);

        mysqli_stmt_bind_param($stmt,"siii",$nombre_me,$lugar,$estado,$capacidad);

        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        return true;

    }
  // $stmt = mysqli_stmt_init($conexion);
        // mysqli_stmt_prepare($stmt,$sql);

        // mysqli_stmt_bind_param($stmt,"siii",$nombre_me,$lugar,$estado,$capacidad);

        // mysqli_stmt_execute($stmt);

        // mysqli_stmt_close($stmt);

        public static function camposlugarvacios($lugar){
            if (empty($lugar)) {
              return true;
            }else {
                return false;
            }
        }

        public static function camposmesavacios($nombre_me,$lugar,$estado,$capacidad){
            if (empty($lugar) || empty($nombre_me) || empty($estado) || empty($capacidad)) {
              return true;
            }else {
                return false;
            }
        }

public static function validarnumcap($capacidad){
    if (is_numeric($capacidad) ) {
       return true;
    } else {
        return false;
    }
}





    public static function checkLugar($conexion,$lugar){
        

        $sql="SELECT * FROM tbl_lugar WHERE lugar_recurso = $lugar ";

      

//         $resultado =mysqli_fetch_assoc( mysqli_query($conexion, $sql));
//         $error=false;
// print_r($resultado);
//       foreach ($resultado as $lug ) {

//        if ($lugar==$lug['lugar_recurso']) {
//         $error=true;
//        }
//       }

        
//         return $error;
//     }



    $id_usuarioExiste = mysqli_fetch_assoc(mysqli_query($conexion, $sql));
    $usuarioExiste = mysqli_query($conexion, $sql);
    // var_dump($usuarioExiste -> num_rows);

    if($row = $usuarioExiste -> num_rows){
        $error = true;
    }else{
        $error = false;
    }
    return $error;
}
}






