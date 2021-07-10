<?php
   session_start();
?>

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
                <form class="d-flex ms-3">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-warning" type="submit">Buscar</button>
                </form>
                <?php
                    
                    if(isset($_SESSION["usuarioid"]) && ($_SESSION["usuarioNombre"] == "admin")){

                        
                        echo "<a class='nav-item btn btn-info ms-3' href='panel.php' >Panel Admin</a>";
                        echo "<a class='nav-item btn btn-danger ms-3' href='../includes/logout.inc.php' >Cerrar Sesion</a>";

                    }
                    else if (isset($_SESSION["usuarioid"])){

                        echo "<a class='nav-item btn btn-outline-light ms-5' href='carrito.php'>
                        Carrito <img src='imgs/shopping-cart.svg' style='height:25px'>
                        </a>";
                        echo "<a class='nav-item btn btn-danger ms-3' href='../includes/logout.inc.php' >Cerrar Sesion</a>";

                    }else{

                        echo "<a class='nav-item btn btn-warning ms-5' href='registro.php'>Registrarse</a>";
                        echo "<a class='nav-item btn btn-light ms-2' href='login.php'>Iniciar Sesion</a>";
                    }

                ?>

          
            </div>    
        </div>
    </nav>