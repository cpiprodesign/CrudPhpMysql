
function Registrar(nombre,direccion)
{
    cadena="nombre=" + nombre +
            "&direccion=" + direccion;
      
    //$("#respuesta").html("<img src="loader.gif" /> Por favor espera un momento");
    $.ajax({
        type: "POST",
        //dataType: 'html',
        url: "insertar.php",
        data: cadena,
        success: function(){
            var notification = alertify.notify('Alumno agregado ', 'Alumno Agregado corectamente', 5, function(){  console.log('dismissed'); });
            Limpiar();//limpia data

            $("#tabla").load("tabla.php");//carga data
        }
    });
}
function Limpiar()
{
    $("#nombre").val("");
    $("#direccion").val("");
    
}
function pasarDatos(datos){
    d=datos.split('||');
    $('#idu').val(d[0]);
    $('#nombreu').val(d[1]);
    $('#direccionu').val(d[2]);
}

function actualizar(){
   id=$('#idu').val();
   nombre=$('#nombreu').val();
   direccion= $('#direccionu').val();
   cadena= "id=" +id+
            "&nombre="+nombre+
            "&direccion="+direccion;

            $.ajax({
                type: "POST",
                //dataType: 'html',
                url: "editar.php",
                data: cadena,
                success: function(){
                    var notification = alertify.notify('Alumno editado', 'Alumno editado corectamente', 5, function(){  console.log('dismissed'); });
           
                    //Limpiar();//limpia data
                    $("#tabla").load("tabla.php");//carga data
                }
            });                   
}

function pregunata(id){
    alertify.confirm('Eliminar Datos', '¿Estas seguro de eliminar registro ?', function(){ eliminardatos(id) }
    , function(){ alertify.error('Se canceló')});


}
function eliminardatos(id){
    cadena="id="+id;
    $.ajax({
        type:"POST",
        url:"eliminar.php",
        data:cadena,
        success:function(){
           
            
            $("#tabla").load("tabla.php");//carga data
        }
            
            
        

    });


}