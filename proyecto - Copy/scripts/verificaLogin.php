<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/bootstrap-5.3.3-dist/bootstrap-5.3.3-dist">
</head>
<body>
  <div class="container">
    <?php
    include("../class/database.php");
    $conexion = new database();
    $conexion->conectarDB();
    extract($_POST);

    $conexion->verifica("$user", "$password");
    $conexion->desconectarDB();


    
    
    ?>
  </div>
  
</body>
</html>