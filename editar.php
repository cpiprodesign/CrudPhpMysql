<?php
include_once 'conexion.php';

$id = $_GET['id1'];
$nombres = $_GET['nombres1'];
$direccion = $_GET['direccion1'];


    $sql_editar = 'UPDATE alumnos SET Nombres=?,Direccion=? WHERE Id=?';
    $sentencia_editar = $pdo->prepare($sql_editar);
    $sentencia_editar->execute(array($nombres,$direccion,$id));
    header('location:index.php');
