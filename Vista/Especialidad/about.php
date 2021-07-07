<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quienes Somos</title>
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


    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-6 text-center">
                <img src="imgs/lapices.jpg" class="w-75" alt="">
            </div>
            <div class="col-6">
                <h1 class="text-start ">Acerca de nosotros</h1>
                <p class="mt-3 text-justify">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere porro aspernatur eligendi odit, 
                    consequatur tenetur ratione, ut atque quod molestias non ipsa! Quae ullam error facere dignissimos 
                    distinctio inventore animi. Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque 
                    minima ipsa, sapiente at distinctio, explicabo fugiat est sequi beatae tenetur sint asperiores itaque, 
                    placeat ab assumenda nobis facilis omnis porro.
                </p>
                
                <p class="mt-3 text-justify">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere porro aspernatur eligendi odit, 
                    consequatur tenetur ratione, ut atque quod molestias non ipsa! Quae ullam error facere dignissimos 
                    distinctio inventore animi. Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque 
                    minima ipsa, sapiente at distinctio, explicabo fugiat est sequi beatae tenetur sint asperiores itaque, 
                    placeat ab assumenda nobis facilis omnis porro.
                </p>

            </div>
        </div>

    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>