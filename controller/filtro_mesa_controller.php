<?php
require_once ('../model/mesa.php');
require_once '../include/func.php';
$lugar=$_POST['lugar'];

// if($_POST['num']==''){
//     $cantidad='0';
// }else{
//     $cantidad=$_POST['num'];
// }


if($_POST['num']==''){
    $cantidad='0';

}else{
    $cantidad=$_POST['num'];
    if($cantidad%2!=0){
        $cantidad+=1;
    }
    if($cantidad > 8){
        $cantidad = 8;
    }
}

$mesa=Mesas::getFiltroMesa($lugar,$cantidad);

echo json_encode(['ok'=>true,'data'=>$mesa]);