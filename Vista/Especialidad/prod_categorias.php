<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <a class="nav-item btn btn-warning ms-5" href="#">Registrarse</a>
                <a class="nav-item btn btn-light ms-2" href="login.html">Iniciar Sesion</a>
          
            </div>    
        </div>
    </nav>
    
</body>
</html>