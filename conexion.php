<?php
session_start();
$link = 'mysql:host=localhost;dbname=crudalumno';
$usuario ='root';
$contraseña= '';
$bd= 'crudalumno';
try {
    
    $pdo = new PDO($link, $usuario, $contraseña);
    //echo('conectado');
   
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}