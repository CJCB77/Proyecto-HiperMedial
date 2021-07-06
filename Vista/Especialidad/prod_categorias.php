<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>


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
                        <a class="nav-link active" aria-current="page" href="index.html">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink"role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Productos
                        </a>
                        <ul class="dropdown-menu" id="categorias" aria-labelledby="navbarDropdownMenuLink">

                            <!-- 
                            <li><a class="dropdown-item" href="#">Boligrafos</a></li>
                            <li><a class="dropdown-item" href="#">Lapices</a></li>
                            <li><a class="dropdown-item" href="#">Cuadernos</a></li>
                            <li><a class="dropdown-item" href="#">Marcadores</a></li> 
                          -->

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
                <a class="nav-item btn btn-warning ms-5" href="registro.html">Registrarse</a>
                <a class="nav-item btn btn-light ms-2" href="login.html">Iniciar Sesion</a>
          
            </div>    
        </div>
    </nav>

    <div class="container-lg mt-5 mb-5">
        <p class="text-start fs-2 fw-light mb-2 d-inline-block">Boligrafos</p>
        <hr>
        <div class="container-fluid">
          <div class="row" id="datos">

          <?php

          $dbhost = 'localhost:3307';
          $dbuser = 'root';
          $dbpass = "";
          $dbname = "dbpapeleria";

          $id = $_GET['id'];

          $obj_conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

          $sql = "select * from tbproducto where id_categoria=" . $id;
          $resultado = $obj_conexion->query($sql);

          foreach($resultado as $fila){

            echo "<div class='col-3'>";
			$imagen = $fila['img'];
			$id = $fila['id_producto'];

            echo "<a href='detalles_prod.php?id=" . $id . "'" . "class='link-success'>";
			echo "<img class='img-fluid mt-3' style='width: 250px; height:360px' src='../../" . $imagen . "'>";
			echo "<p class='text-center fs-5 mt-1 fw-normal'>" . $fila['nombre']."</p>";
			echo "</a>";

            #Verifica que el producto este en stock
			$stock = $fila['stock'];
			if ($stock > 0){
				echo " <p class='text-center fw-light lh-1 fs-6 fst-italic'>En stock!</p>";
			}else{
				echo " <p class='text-center fw-light lh-1 fs-6 fst-italic'>No disponible</p>";
			}


			echo "<p class='text-center lh-1 fs-6 fst-bold'>". "$".$fila['precio']."</p>";
			// echo "<td><button type='button' class='btn btn-outline-dark' onclick='editar(".$fila['Id'].")'>Editar</button></td>";
			echo "</div>";

          }

        ?>


          </div>
        </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    
</body>
</html>