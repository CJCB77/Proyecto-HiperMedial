<?php
   session_start();
?>

   <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container-fluid ">
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
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">Quiénes Somos</a>
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