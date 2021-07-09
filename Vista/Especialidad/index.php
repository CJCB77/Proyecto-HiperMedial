<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PapelesINC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/estilo.css">

    <!-- javascript -->
    <script type='text/javascript' src="../js/jquery-1.7.1.min.js" > </script>
    <script type='text/javascript'>

    function cargarcontrolador()
    {
      $.post("../../Controlador/ProductoController.php",
          {'opcion':'consultar'},respuesta);

      $.post("../../Controlador/CategoriaController.php",
          {'opcion':'cargarCategorias'},respuesta2);
        
    }

    
    function respuesta(arg)
    {
      $("#datos").append(arg);
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
    include_once 'Navbar.php';
  ?>

    <div class="container-lg">
        <div id="carouselExampleControls" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="imgs/cuadernos.jpg" class="d-block w-100" alt="..." style="height: 600px; width: 300px;">
              </div>
              <div class="carousel-item">
                <img src="imgs/Boligrafos.jpg" class="d-block w-100" alt="..." style="height: 600px; width: 300px;">
              </div>
              <div class="carousel-item">
                <img src="imgs/Marcadores1.jpg" class="d-block w-100" alt="..." style="height: 600px; width: 300px;">
              </div>
            </div>
          </div>
          <button class="carousel-control-prev mt-5" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next mt-5" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden" >Next</span>
          </button>
    </div>

    <div class="container-lg mt-5 mb-5">
        <p class="text-start fs-2 fw-light mb-2 d-inline-block">Todos los productos</p>
        <hr>
        <div class="container-fluid">
          <div class="row" id="datos">
          <!-- <div class="container"> -->
            <!-- <div class="row"> -->
              <!-- <div class="col">
                  <a href="#" class="link-success">
                    <img src="imgs/lapiz1.jpg" class="img-fluid" alt="">
                    <p class="text-center mt-1 fw-bold">Lapiz Bic Evolution</p>
                  </a>
                  <p class="text-center lh-1 fs-6 fst-italic">En stock</p>
                  <p class="text-center lh-1 fs-5 fst-bold">$0.15</p>
              </div> -->
          <!-- </div> -->
        <!-- </div> -->
          </div>
        </div>
    </div>


    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>