<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/estilo.css">

    <title>Agregar Ciudad</title>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script type='text/javascript' src="../js/jquery-1.7.1.min.js" > </script>
	<script type='text/javascript'>
        $(function(){
            $("#guardar").click(function(){ 
                $.post("../../Controlador/CiudadController.php",
                    $("#datosCiudad").serialize(),respuesta);
                window.location.href = "ciudades_tabla.php";
            });
        });  
        
        function respuesta(arg)
        {
            alert(arg);
        }




    </script>
</head>
<body>
    <h1>Ingrese la nueva Ciudad</h1>
    <form id="datosCiudad">
        <input type="text" class="form-control" name="opcion" value="ingresar" hidden />

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="categoria">Ciudad:</label>
                <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Guayaquil">
            </div>
        </div>

        
        <button type="button" class="btn btn-dark mt-3" id="guardar" >Guardar</button>

    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>