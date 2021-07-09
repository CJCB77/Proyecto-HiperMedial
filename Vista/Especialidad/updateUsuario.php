<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/estilo.css">



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script type='text/javascript' src="../js/jquery-1.7.1.min.js" > </script>
	<script type='text/javascript'>
	$(function(){
		$("#codigo").focusout(function(){ 
			$.post("../../Controlador/UsuarioController.php",
				{'opcion':'consultaxcodigo','codigo':$("#codigo").val()},respuesta1,'json');
		});
		
		$("#guardar").click(function(){ 
			$.post("../../Controlador/UsuarioController.php",
				$("#datos").serialize(),respuesta2);
			window.location.href = "usuarios_tabla.php";
		});
	});

    function getParameterByName(name) {
		name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
		var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
		results = regex.exec(location.search);
		return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
	}

    function cargardatos()
	{
		$.post("../../Controlador/UsuarioController.php",
				{'opcion':'consultaxcodigo','codigo':getParameterByName('id')},respuesta1,'json');
	}
    
    function respuesta1(arg)
	{	
        $("#codigo").val(arg[0].id_usuario);
        $("#usuario").val(arg[0].usuario);
        $("#contrasena").val(arg[0].contrasena);
        $("#nombre").val(arg[0].nombre);
		$("#apellido").val(arg[0].apellido);
		$("#email").val(arg[0].email);
		$("#direccion").val(arg[0].direccion);
		$("#ciudad").val(arg[0].ciudad);
		$("#celular").val(arg[0].celular);

	}


    function respuesta2(arg)
	{
		alert(arg);
	}
	window.onload=cargardatos;

    </script>
</head>
<body>
<h1>Modificar Usuario</h1>
    <form id="datos">
        <input type="text" class="form-control" name="opcion" value="actualizar" hidden />

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="codigo">Codigo:</label>
                <input type="text" class="form-control" id="codigo" name="codigo" placeholder="codigo">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="usuario">Nombre de usuario:</label>
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="usuario">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="contrasena">Contraseña:</label>
                <input type="text" class="form-control" id="contrasena" name="contrasena" placeholder="contrasena">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nombre">Nombre:</label>
                <input type ="text"class="form-control" name="nombre" id="nombre" placeholder="nombre">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="apellido">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="email">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="direccion">Direccion:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="ciudad">Ciudad:</label>
                <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="gye">
            </div>
        </div>
            <div class="form-group col-md-6">
                <label for="celular">Celular:</label>
                <input type="text" class="form-control" id="celular" name="celular" placeholder="0994144562">
            </div>
        </div>

        <button type="button" class="btn btn-dark" id="guardar" >Guardar</button>

    </form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>