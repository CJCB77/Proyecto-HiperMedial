<?php
    session_start();
    $dbnombre = "dbpapeleria";
    $con = mysqli_connect("localhost:3307","root","",$dbnombre);

if (isset($_SESSION['usuarioid'])){

    if(isset($_POST["add"])){
        if (isset($_SESSION["carrito"])){
            $item_array_id = array_column($_SESSION["carrito"], "id_producto");
            if(!in_array($_GET["id"], $item_array_id)){
                $count = count($_SESSION["carrito"]);
                $item_array = array(
                    'id_producto' => $_GET['id'],
                    'nombre_prod' => $_POST["hidden_nombre"],
                    'precio_prod' => $_POST["hidden_precio"],
                    'cantidad_prod' => $_POST["cantidad"],
                );
                $_SESSION["carrito"][$count] = $item_array;
                echo '<script>window.location="carrito.php"</script>';
            }else{
                echo '<script>alert("Producto ya ha sido añadido al carrito")</script>';
                echo '<script>window.location="carrito.php"</script>';

            }
        }else {
            //Si el carrito de compra no existe aun
            $item_array = array(
                'id_producto' => $_GET['id'],
                'nombre_prod' => $_POST["hidden_nombre"],
                'precio_prod' => $_POST["hidden_precio"],
                'cantidad_prod' => $_POST["cantidad"],
            );
            $_SESSION["carrito"][0] = $item_array;
        }

    }

    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["carrito"] as $key => $value){
                if($value["id_producto"] == $_GET["id"]){
                    unset($_SESSION["carrito"][$key]);
                    echo '<script>window.location="carrito.php"</script>';

                }
            }
        }
    }

}else{
    echo '<script>alert("Debe Iniciar Sesion")</script>';
    echo '<script>window.location="login.php"</script>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de compra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/estilo.css">

    <!-- javascript -->
    <script type='text/javascript' src="../js/jquery-1.7.1.min.js" ></script>
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

    $(function(){
            $("#comprar").click(function(){ 
                $.post("../../Controlador/OrdenController.php",
                    $("#datos_orden").serialize(),respuesta);
                    window.location.href = "ordenes.php";
            
            });
            
        });  
        
    function respuesta(arg)
        {
            alert(arg);
        }



window.onload=cargarcontrolador;
</script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand h1 mb-0" href="index.php">
                <img src="imgs/logo.png" alt="" height="40" class="d-inline-block align-text-bottom">
                PapelesINC
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav " >
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
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
                        <a class="nav-link" href="about.php">Quiénes Somos</a>
                    </li>
                </ul>
                <?php
                    
                    if(isset($_SESSION["usuarioid"]) && ($_SESSION["usuarioNombre"] == "admin")){

                        echo "<div class='ms-auto'>";
                        echo "<a class='nav-item btn btn-outline-warning ms-3' href='ordenes.php' >
                        Ordenes de Compra <img class='ms-2' src='imgs/checklist.svg' style='height:25px'>
                        </a>";
                        echo "<a class='nav-item btn btn-info ms-3' href='panel.php' >Panel Admin</a>";
                        echo "<a class='nav-item btn btn-danger ms-3' href='../includes/logout.inc.php' >Cerrar Sesion</a>";
                        echo "</div>";

                    }
                    else if (isset($_SESSION["usuarioid"])){

                        echo "<div class='ms-auto'>";
                        echo "<a class='nav-item btn btn-outline-warning ms-3' href='ordenes.php' >
                        Ordenes de Compra <img class='ms-2' src='imgs/checklist.svg' style='height:25px'>
                        </a>";
                        echo "<a class='nav-item btn btn-outline-light ms-5' href='carrito.php'>
                        Carrito <img src='imgs/shopping-cart.svg' style='height:25px'>
                        </a>";
                        echo "<a class='nav-item btn btn-danger ms-3' href='../includes/logout.inc.php' >Cerrar Sesion</a>";
                        echo "</div>";

                    }else{

                        echo "<div class='ms-auto'>";
                        echo "<a class='nav-item btn btn-warning' href='registro.php'>Registrarse</a>";
                        echo "<a class='nav-item btn btn-light ms-3' href='login.php'>Iniciar Sesion</a>";
                        echo "</div>";
                    }

                ?>

          
            </div>    
        </div>
    </nav>


    <div class="container-fluid text-center mt-4">
        <h1>Carrito de Compra</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" width="30%">Producto</th>
                    <th scope="col" width="10%">Cantidad</th>
                    <th scope="col" width="13%">Precio</th>
                    <th scope="col" width="10%">Precio Total</th>
                    <th scope="col" width="17%">Remover</th>
                </tr>
            </thead>

            <?php

                if(!empty($_SESSION["carrito"])){
                    $total= 0;
                    foreach($_SESSION["carrito"] as $key => $value){
                        ?>
                <tr>
                    <td><?php echo $value["nombre_prod"]; ?></td>
                    <td><?php echo $value["cantidad_prod"]; ?></td>
                    <td><?php echo $value["precio_prod"]; ?></td>
                    <td><?php echo number_format($value["cantidad_prod"] * $value["precio_prod"], 2); ?></td>
                    <td><a href="carrito.php?action=delete&id=<?php echo $value['id_producto']; ?>">
                        <span class="text-danger">Remover</span>
                        </a></td>
                </tr>
                <?php
                    $total = $total + ($value["cantidad_prod"] * $value["precio_prod"]); 
                ?>
                <tr>
                    <td colspan="3" align="rigth">Total:</td>
                    <th align="right">$ <?php echo number_format($total, 2); ?></th>
                    <td></td>
                </tr>
                <?php
                    }
                }
                ?>
        </table>
            
        <form id="datos_orden">

            <input type="text" class="form-control" name="opcion" value="ingresar" hidden />

            <input type="hidden" name="hidden_usuario" value=<?php echo $_SESSION["usuarioid"]; ?> >

            <input type="hidden" name="hidden_ciudad" value=<?php echo $_SESSION["ciudadUsuario"] ?> >

            <input type="hidden" name="hidden_direccion" value="<?php echo $_SESSION["direccionUsuario"]; ?>" >
   
            <input type="hidden" name="hidden_nombre" value="<?php echo $_SESSION["nombreUsuario"]; ?>" >

   
            <input type="hidden" name="hidden_total" value= <?php 
            if(isset($total)){
                echo $total;
            }
            ?>>
        

            <?php 
            if(isset($total)){
                echo "<button type='button' class='btn btn-lg btn-warning mt-5' id='comprar'>Comprar</button>";
            }
            ?>
            
        </form>
        

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>