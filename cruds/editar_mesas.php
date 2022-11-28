<?php
  require_once '../include/connection.php';
    $id=$_POST['id'];
    $query = $pdo->prepare("SELECT * FROM tbl_recurso WHERE id = :id");
    $query->bindParam(":id", $id);
    $query->execute();
    $resultado = $query->fetch(PDO::FETCH_ASSOC);
    echo json_encode($resultado);
?>