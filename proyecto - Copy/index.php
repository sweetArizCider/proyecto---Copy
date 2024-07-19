<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <title>Inicio</title>

</head>
<body>
    <?php
    session_start();
    if (isset($_SESSION["usuario"])){
        echo"<h5 align='center'>".$_SESSION["usuario"]."</h5>";
        echo"<a href='scripts/cerrarSesion.php'>Cerrar Sesion</a>";
    }
    ?>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
<div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
    <ul class="navbar-nav me-auto">
        <li class="nav-item">
        <a class="nav-link" href="views/verClientes.php">CLIENTES</a>
        <a class="nav-link" href="views/verDepartamentos.php">DEPAS</a>
        <a class="nav-link" href="views/formAltaCliente.php">DEPAS</a>
        <a class="nav-link" href="views/clientes_por_departamento.php">Cliente por departamento</a>
        <a class="nav-link" href="views/iniciar_sesion.php">Iniciar sesion</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="javascript:void(0)">Link</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="javascript:void(0)">Link</a>
        </li>

        <li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Dropdown</a>
<ul class="dropdown-menu">
    <li><a class="dropdown-item" href="views/verClientes.php">CLIENTES</a></li>
    <li><a class="dropdown-item" href="#">Another link</a></li>
    <li><a class="dropdown-item" href="#">A third link</a></li>
</ul>
</li>

    </ul>
    <form class="d-flex">
        <input class="form-control me-2" type="text" placeholder="Search">
        <button class="btn btn-primary" type="button">Search</button>
    </form>
    </div>
</div>
</nav>

</body>
</html>