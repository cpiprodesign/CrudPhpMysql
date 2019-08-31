<?php

include_once 'conexion.php';
if($_GET){
    $id = $_GET['Id'];
    $sql_eliminar = 'DELETE FROM alumnos WHERE Id=?';
    $sentencia_eliminar = $pdo->prepare($sql_eliminar);
    $sentencia_eliminar->execute(array($id));
    header('location:index.php');
}
