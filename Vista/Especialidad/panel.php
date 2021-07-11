<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/estilo.css">

    <script type='text/javascript' src="../js/jquery-1.7.1.min.js" > </script>
    <script type='text/javascript'>

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


    <div class="text-center container-md mb-5 mt-5">
        <h1 class=" mt-3 mb-3">Panel de Aministracion</h1>
        <img src="imgs/mantenimiento-web.png" class="w-25 mt-3 mb-4" alt="">
        <div class="row">
            <div class="col-md-6 position-relative" style="background-color:#185ADB; border-top-left-radius: 15px; height: 300  px;">
                <a href="#" class="btn btn-lg btn-dark">Productos</a>
                <div class="container-fluid">
                    <a href="productos_tabla.php" class="btn btn-lg btn-light position-absolute start-50 top-50 translate-middle">Consultar</a>    
                </div>  
            </div>

            <div class="col-md-6 position-relative" style="background-color: #FFC947; height: 300px; border-top-right-radius: 15px;">
                <a href="#" class="btn btn-lg btn-dark">Usuarios</a>
                <div class="container-fluid">
                    <a href="usuarios_tabla.php" class="btn btn-lg btn-light position-absolute start-50 top-50 translate-middle">Consultar</a>    
                </div>  
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 position-relative" style="background-color: #66DE93; height: 300px; 
            border-bottom-left-radius: 15px;">
                <a href="#" class="btn btn-lg btn-dark">Categorias</a>
                <div class="container-fluid">
                    <a href="categorias_tabla.php" class="btn btn-lg btn-light position-absolute start-50 top-50 translate-middle">Consultar</a>    
                </div>  
            </div>

            <div class="col-md-6 position-relative" style="background-color: #F0D9E7; height: 300px; 
            border-bottom-right-radius: 15px;">
                <a href="#" class="btn btn-lg btn-dark">Ciudades</a>
                <div class="container-fluid">
                    <a href="ciudades_tabla.php" class="btn btn-lg btn-light position-absolute start-50 top-50 translate-middle">Consultar</a>    
                </div>  
 
            </div>
        </div>



    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>