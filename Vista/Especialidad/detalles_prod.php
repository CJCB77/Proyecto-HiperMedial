<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script type='text/javascript' src="../js/jquery-1.7.1.min.js" > </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/estilo.css">

    <title>Detalles de Producto</title>

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

    
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand h1 mb-0" href="index.html">
                <img src="imgs/logo.png" alt="" height="40" class="d-inline-block align-text-bottom">
                PapelesINC
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav " >
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.html">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink"role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Productos
                        </a>
                        <ul class="dropdown-menu" id="categorias" aria-labelledby="navbarDropdownMenuLink">


                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">Quiénes Somos</a>
                    </li>
                </ul>
                <form class="d-flex ms-3">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-warning" type="submit">Buscar</button>
                </form>
                <a class="nav-item btn btn-warning ms-5" href="#">Registrarse</a>
                <a class="nav-item btn btn-light ms-3" href="login.html">Iniciar Sesion</a>
            </div>    
        </div>
    </nav>

    <?php 

    $dbhost = 'localhost:3307';
    $dbuser = 'root';
    $dbpass = "";
    $dbname = "dbpapeleria";

    $id = $_GET['id'];

    $obj_conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    $sql = "select * from tbproducto where id_producto=" . $id;
    $sqlCategoria = "select * from tbcategoria where id_categoria=";
    $resultado = $obj_conexion->query($sql);

    if ($resultado) {
        while($fila = $resultado -> fetch_array()){

            echo " <div class='container-fluid mt-5'>";
            echo "<div class='row'>";

            echo "<div class='col-6 text-center'>";
            echo "<img src='../../" . $fila['img'] . "'class='w-50' >";
            echo "</div>";

            echo "<div class='col-6 text-start'>";
            echo "<h2 class='mb-4'>" . $fila['nombre'] . "</h2>";
            echo "<p class='fw-bold'>". "Codigo:" . $fila['id_producto'] ."</p>";
            echo "<p class='fw-light fs-6'>". $fila['descripcion'] ."</p>";

            #Necesita Optimizacion!
            #Agarra la categoria de la tabla categoria comparando los ids
            $sqlCategoria.= $fila['id_categoria'];
            $resultadoCategoria = $obj_conexion->query($sqlCategoria);
            $categoria = $resultadoCategoria -> fetch_array();
            echo "<p class='fs-6'><span class='fw-bold'>Categoria: </span>". $categoria[1] ."</p>";

            echo "<p class='fs-6'>En stock <span class='fw-bold'>". $fila['stock'] ."</span></p>";
            echo "<p class='fs-5'><span class='fw-bold'>Precio:</span> $". $fila['precio'] ."</p>";
            echo "<button class='btn btn-dark btn-lg mt-2'>Agregar a Carrito</button>";
            echo "</div>";

            echo "</div>";
            echo "</div>";

    

        }
    }
    


    
    ?>

    

    <!-- <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-6 text-center">
                <img src="../../UploadImgs/lapiz1.jpg" class="w-50" alt="" >
            </div>
            <div class="col-6 text-start">
                <h2 class="mb-4"> Lapiz 2b </h2>
                <p class="fw-bold">Id: 3</p>
                <p class="fs-5">Lapiz BIC 2B</p>
                <p class="fw-light fs-6"><span class="fw-bold">Descripcion: </span>Lapiz punta gruesa mina 2b</p>
                <p class="fs-6"><span class="fw-bold">Categoria:</span> Lapices</p>
                <p class="fs-6">En stock <span class="fw-bold">100</span></p>
                <p class="fs-5"><span class="fw-bold">Precio:</span> $0.25</p>
                <button class="btn btn-dark btn-lg mt-2">Agregar</button>
            </div>
        </div>
        

    </div> -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>