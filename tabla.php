<?php
include_once 'conexion.php';
$sql = "SELECT * FROM alumnos";
$gsen = $pdo->prepare($sql);
$gsen->execute();
$resultado = $gsen->fetchAll();
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombres</th>
            <th scope="col">Direccion</th>
            <th scope="col">Opciones</th>

          </tr>
          <?php
          foreach($resultado as $fila){
            
         $datos=$fila['Id']."||".
                $fila['Nombres']."||".
                $fila['Direccion'];

               // var_dump($datos);
          ?>



        </thead>
        <tbody>
          <tr>
            <th> <?php echo ($fila['Id'])?></th>
            <th> <?php echo ($fila['Nombres'])?></th>
            <th> <?php echo ($fila['Direccion'])?></th>
            <th><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#editar" onclick="pasarDatos('<?php echo $datos ?>')" >
                Editar
              </button><span> </span><button type="button" class="btn btn-primary" onclick="pregunata('<?php echo $fila['Id']?>')">
                eliminar
              </button></th>
            

          </tr>




        </tbody>
        <?php  } ?>
      </table>
    </div>
  </div>
</div>