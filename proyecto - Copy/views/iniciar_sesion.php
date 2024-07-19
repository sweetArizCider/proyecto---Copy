<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css">
  <title>Iniciar sesion</title>
</head>
<body>
  <?php
  session_start();
  if (isset($_SESSION["usuario"])){
    echo"<div class='alert alert-warning '> <h2>Ya existe una sesion activa, usuario:".$_SESSION["usuario"]."</h2></div>";
    echo"<a href='../scripts/cerrarSesion.php'>Cerrar Sesion</a>";
  }
  else{
  ?>
  <div class="container">
        <h1 class="text-center">Iniciar sesión</h1>
        <form action="../scripts/verificaLogin.php" method="post">
            <div class="mb-3">
                <label for="user" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="user" name="user" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Aceptar</button>
        </form>
        <a href="../views/crearCuenta.php">Registrate</a>

  </div>
  <?php
  }
 
  ?>
  
</body>
</html>