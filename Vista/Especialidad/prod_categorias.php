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

    <?php

    include_once "Navbar.php";

    ?>

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