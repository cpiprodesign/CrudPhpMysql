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
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
 <script src="funciones.js"></script> 
 
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/css/themes/bootstrap.min.css"/>

<!-- 
    RTL version
-->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/css/alertify.rtl.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/css/themes/default.rtl.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/css/themes/semantic.rtl.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/css/themes/bootstrap.rtl.min.css"/>
</head>

<body>
<div id="respuesta"></div>
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
           
              <div class="form-group">
                <label for="nombre1">Id</label>
                <input value="" name="id1" type="text" class="form-control" id="idu">
              </div>
              <div class="form-group">
                <label for="nombre1">Nombre</label>
                <input value="" name="nombres1" type="text" class="form-control" id="nombreu">
              </div>
              <div class="form-group">
                <label for="direccion1">Direccion</label>
                <input value="" name="direccion1" type="text" class="form-control" id="direccionu" placeholder="Ingresa tu direccion">
              </div>
             <button type="" id="update"class="btn btn-danger">Guardar cambios</button>
          </div>
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
            
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Ingresa tu nombre">
              </div>
              <div class="form-group">
                <label for="direccion">Direccion</label>
                <input name="direccion" type="text" class="form-control" id="direccion" placeholder="Ingresa tu direccion">
              </div>
              <button class="btn btn-primary" id="insertar">Insertar</button>
              
          </div>
        </div>
       
      </div>
    </div>
  </div>

  
  <!--fin Modal -->
  <div class="container">
    <div class="row">


      <div class="col-md-12">
        <div class="jumbotron mt-2">

          <h1>Crud php mysql</h1>
          <p class="lead">Pequeño proyecto de operaciones basicas en php y mysql.</p>


          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ingresar">
            Nuevo Alumno
          </button>
          </p>
        </div>
      </div>
    </div>

    


  </div>
  </div>
  </div>

  <div id="tabla">
      
      </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 
  <!-- para cargar la tabla -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  <script>
  
    $("#tabla").load("tabla.php");
  
</script>
 <script>
  $(document).ready(function(){
    //fila=$(#nombre).val();
    $("#insertar").click(function(){
      nombre=$("#nombre").val();
      direccion=$("#direccion").val();
      Registrar(nombre,direccion);
     
    });
    $("#update").click(function(){
      actualizar();
    });
 
  });
  

</script>



</body>

</html>
