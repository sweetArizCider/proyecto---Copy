<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>alta user</title>
  <link rel="stylesheet" href="../css/bootstrap-5.3.3-dist/bootstrap-5.3.3-dist">
</head>
<body>
<div class="container">
    <?php
    include '../class/database.php'; //incluir el script
    //instanciar db, le llamamos conexion
    $conexion = new database();
    $conexion->conectarDB();
    extract($_POST);
    $hash=password_hash($password, PASSWORD_DEFAULT);
    $query ="INSERT INTO usuario (user,password) VALUES ('$user', '$hash')";

    $conexion->ejecuta($query);

    echo"<div>Usuario Registrado registrado</div>";

    $conexion->desconectarDB();

    header("refresh:3;../views/iniciar_sesion.php");


        ?>
  </div>
  
</body>
</html>