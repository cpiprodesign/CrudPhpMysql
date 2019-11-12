<?php
include_once'conexion.php';
#Salir si alguno de los datos no está presente
if(!isset($_POST["nombre"]) || !isset($_POST["direccion"])) exit();
if($_POST){
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    
    $sql_agregar = 'INSERT INTO alumnos(Nombres,Direccion)values(?,?)';
    $sentencia_agregar = $pdo->prepare($sql_agregar);
   $resultado = $sentencia_agregar->execute(array($nombre,$direccion));
  
    //if($resultado === TRUE) echo "Insertado correctamente";
//else echo "Algo salió mal. Por favor verifica que la tabla exista";
   
  }