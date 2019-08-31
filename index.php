<?php
include_once 'conexion.php';
$sql = "SELECT * FROM alumnos";
$gsen = $pdo->prepare($sql);
$gsen->execute();
$resultado = $gsen->fetchAll();

//8pasar datos
if ($_GET) {
  $id = $_GET['Id'];

  $sql_unico = "SELECT * FROM alumnos WHERE Id=?";
  $gsen_unico = $pdo->prepare($sql_unico);
  $gsen_unico->execute(array($id));
  $resultado_unico = $gsen_unico->fetchAll();
  foreach ($resultado_unico as $fila); { }
}



?>

<?php
//print_r($resultado_unico[0] );
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Crud php y mysql!</title>
</head>

<body>
  <!-- Modal update -->
  <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Editar Alumno</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div>
            <form id="formulario" method="GET" action="editar.php">
              <div class="form-group">
                <label for="nombre1">Id</label>
                <input value="<?php echo ($fila['Id']); ?>" name="id1" type="text" class="form-control" id="id">
              </div>
              <div class="form-group">
                <label for="nombre1">Nombre</label>
                <input value="<?php echo ($fila['Nombres']); ?>" name="nombres1" type="text" class="form-control" id="nombre">
              </div>
              <div class="form-group">
                <label for="direccion1">Direccion</label>
                <input value="<?php echo ($fila['Direccion']); ?>" name="direccion1" type="text" class="form-control" id="direccion" placeholder="Ingresa tu direccion">
              </div>
              <input class="btn btn-primary" id="enviar" name="guardar" type="submit" value="Guardar datos" />
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!--fin Modal -->
  <!-- Modal insertar -->
  <div class="modal fade" id="ingresar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Registrar nuevo Alumno</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div>
            <form id="formulario" method="post" action="insertar.php">
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Ingresa tu nombre">
              </div>
              <div class="form-group">
                <label for="direccion">Direccion</label>
                <input name="direccion" type="text" class="form-control" id="direccion" placeholder="Ingresa tu direccion">
              </div>
              <input class="btn btn-primary" id="enviar" name="guardar" type="submit" value="Guardar datos" />
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!--fin Modal -->
  <div class="container">
    <div class="row">

      <div class="col-md-12">
        <div>
          <div class="jumbotron">

            <h1>Crud php mysql</h1>
            <p class="lead">Pequeño proyecto de operaciones basicas en php y mysql.</p>
            <hr class="my-4">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ingresar">
              Nuevo Alumno
            </button>
            </p>
          </div>
        </div>
        <div class="mb-2">

        </div>



        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nombres</th>
              <th scope="col">Direccion</th>
              <th scope="col">Opciones</th>

            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($resultado as $fila) {
              echo '<tr>
                                    <td> ' . $fila['Id'] . '</td>
                                    <td> ' . $fila['Nombres'] . '</td>
                                    <td> ' . $fila['Direccion'] . '</td>
                                    <td>
                                    <a class="btn btn-secondary" href="index.php?Id=' . $fila['Id'] . '">
                                      Seleccionar
                                    </a>

                                    
                                    
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editar">
                                    Actualizar
                                  </button>
                                     
                                  

                                         <a class="btn btn-primary" href="eliminar.php?Id=' . $fila['Id'] . '">Eliminar</a>
                                        
                                          
                                         </td>
                                  </tr>';
            }
            ?>

            <!-- Button trigger modal -->


          </tbody>
        </table>
      </div>
    </div>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="main.js"> </script>

</body>

</html>