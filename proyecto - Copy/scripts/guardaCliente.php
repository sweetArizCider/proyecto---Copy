<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap-5.3.3-dist/bootstrap-5.3.3-dist">
  <title>Document</title>
</head>
<body>
  <div class="container">
    <?php
    include '../class/database.php'; //incluir el script
    //instanciar db, le llamamos conexion
    $conexion = new database();
    $conexion->conectarDB();
    extract($_POST);
    $query ="INSERT INTO cliente (nombre, ap_paterno, ap_materno, direccion, telefono, mail, departamento) VALUES ('$nombre', '$ap_paterno', '$ap_materno', '$direccion', '$telefono', '$mail', $departamento)";

    $conexion->ejecuta($query);

    echo"<div>Cliente registrado</div>";

    //header("refresh:3;../index.php");

        ?>
  </div>
</body>
</html>