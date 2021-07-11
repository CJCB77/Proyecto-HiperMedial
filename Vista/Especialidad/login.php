<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/estilo.css">

    <script type='text/javascript' src="../js/jquery-1.7.1.min.js" > </script>
    <script type='text/javascript'>

        $(function(){
            $("#login").click(function(){ 
                $.post("../../Controlador/UsuarioController.php",
                    $("#datos_inicio").serialize(),respuesta);
                    window.location.href = "index.php";
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
    
    
    
        window.onload=cargarcontrolador;
    </script>
</head>
<body>

        <?php

        include_once "Navbar.php";

        ?>
    
    <div class="container-fluid mt-5">
    <h1 class="text-center">Iniciar Sesion</h1>
    <form id="datos_inicio">

        <input type="text" class="form-control" name="opcion" value="iniciar" hidden />

        <div class="d-flex justify-content-center mt-3">
            <div class="form-row col-md-6">
                <div class="form-group">
                    <label for="nombre">Nombre de usuario:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre">
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-3">
            <div class="form-row col-md-6">
                <div class="form-group">
                    <label for="nombre">Contraseña:</label>
                    <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="contraseña">
                </div>
            </div>    
        </div>

        <div class="d-flex justify-content-center mt-2">
            <button type="button" class="btn btn-dark btn-lg mt-3" id="login" >Ingresar</button>
        </div>
    </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>