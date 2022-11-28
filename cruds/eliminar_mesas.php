<?php
require_once '../include/connection.php';
    $data = $_POST['id'];
    
    $query = $pdo->prepare("DELETE FROM tbl_recurso WHERE id = :id");
    $query->bindParam(":id", $data);
    $query->execute();
    echo "ok";
?>