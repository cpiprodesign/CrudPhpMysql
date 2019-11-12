<?php

include_once 'conexion.php';
if($_POST){
    $id = $_POST['id'];
    $sql_eliminar = 'DELETE FROM alumnos WHERE Id=?';
    $sentencia_eliminar = $pdo->prepare($sql_eliminar);
    $sentencia_eliminar->execute(array($id));
    $_SESSION['mensaje']='Alumno Eliminado correctamente';
   $_SESSION['color']='danger';
    header('location:index.php');
}
