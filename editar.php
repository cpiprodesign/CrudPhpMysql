<?php
include_once 'conexion.php';

$id = $_POST['id'];
$nombres = $_POST['nombre'];
$direccion = $_POST['direccion'];


    $sql_editar = 'UPDATE alumnos SET Nombres=?,Direccion=? WHERE Id=?';
    $sentencia_editar = $pdo->prepare($sql_editar);
    $sentencia_editar->execute(array($nombres,$direccion,$id));
   
?>