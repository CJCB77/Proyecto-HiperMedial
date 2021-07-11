<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/estilo.css">


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script type='text/javascript' src="../js/jquery-1.7.1.min.js" > </script>
    <script type='text/javascript'>

        $(function(){
            $("#registrar").click(function(){ 
                $.post("../../Controlador/UsuarioController.php",
                    $("#datos_registro").serialize(),respuesta);
                window.location.href = "index.php";
            });
        }); 

        function respuesta(arg)
        {
            alert(arg);
        }

        function cargarcontrolador()
        {
          $.post("../../Controlador/CategoriaController.php",
              {'opcion':'cargarCategorias'},respuesta2);
        }
    
        function respuesta2(arg)
        {
          $("#categorias").append(arg);
        }

        function cargarcontroladorCombo()
	    {
		$.post("../../Controlador/CiudadController.php",
				{'opcion':'combo'},respuestaCombo);
    	}
	
	    function respuestaCombo(arg)
	    {
		$("#ciudad").append(arg);
	    }	

        
    
    
        window.onload=cargarcontrolador;
        window.onload=cargarcontroladorCombo;
    </script>
</head>
<body>
    
    <?php

    include_once "Navbar.php";

    ?>

    <div class="container-fluid mt-5">
        <h1 class="text-center">Registrate!</h1>
        <form id="datos_registro">

            <input type="text" class="form-control" name="opcion" value="ingresar" hidden />

            <div class="d-flex justify-content-center mt-3">
                <div class="form-row col-md-6">
                    <div class="form-group">
                        <label for="usuario">Nombre de usuario:</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="usuario">
                    </div>
                </div>
            </div>
    
            <div class="d-flex justify-content-center mt-3">
                <div class="form-row col-md-6">
                    <div class="form-group">
                        <label for="contraseña">Contraseña:</label>
                        <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="contraseña">
                    </div>
                </div>    
            </div>
            <div class="d-flex justify-content-center mt-3">
                <div class="form-row col-md-6">
                    <di v class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre">
                    </div>
                </div>    
            </div>
            <div class="d-flex justify-content-center mt-3">
                <div class="form-row col-md-6">
                    <div class="form-group">
                        <label for="apellido">Apellido:</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="apellido">
                    </div>
                </div>    
            </div>
            <div class="d-flex justify-content-center mt-3">
                <div class="form-row col-md-6">
                    <div class="form-group">
                        <label for="correo">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="correo">
                    </div>
                </div>    
            </div>
            <div class="d-flex justify-content-center mt-3">
                <div class="form-row col-md-6">
                    <div class="form-group">
                        <label for="direccion">Direccion:</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion">
                    </div>
                </div>    
            </div>
            <div class="d-flex justify-content-center mt-3">
                <div class="form-row col-md-6">
                    <div class="form-group">
                        <label for="ciudad">Ciudad:</label>
                        <select type="text" class="form-control" id="ciudad" name="ciudad" ></select>
                    </div>
                </div>    
            </div>
            <div class="d-flex justify-content-center mt-3">
                <div class="form-row col-md-6">
                    <div class="form-group">
                        <label for="celular">Celular:</label>
                        <input type="text" class="form-control" id="celular" name="celular" placeholder="celular">
                    </div>
                </div>    
            </div>
    
            <div class="d-flex justify-content-center mt-2">
                <button type="button" class="btn btn-danger btn-lg mt-3" id="registrar">Registrarse</button>
            </div>
        </form>
        </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>