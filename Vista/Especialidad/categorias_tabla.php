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
          {'opcion':'consultar'},respuesta);
        
    }

    
    function respuesta(arg)
    {
      $("#datosCategoria tbody").append(arg);
    }


    function editar(codigo)
	{
		document.location.href = "updateCategoria.php?id=" + codigo;
	}


    window.onload=cargarcontrolador;
  </script>

</head>
<body>

    <?php
    include_once 'Navbar.php';
    ?>

<   <h1 class="text-center mt-5 mb-4">Listado de Categorias</h1>
	<a class="btn btn-large btn-dark mb-3" href="nuevaCategoria.php">Agregar Categoria</a>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
    <table class="table table-striped" id="datosCategoria">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Categoria</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
  </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>