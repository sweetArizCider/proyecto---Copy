<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>

    <link rel="stylesheet" href="../css/bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
<?php
    session_start();
    if (isset($_SESSION["usuario"])){
        echo"<h5 align='center'>".$_SESSION["usuario"]."</h5>";
        echo"<a href='scripts/cerrarSesion.php'>Cerrar Sesion</a>";
    }
    ?>
    <div class="container">
        <h1 align="center">Clientes</h1>
            
            <?php
            include '../class/database.php'; //incluir el script
            //instanciar db, le llamamos conexion
            $conexion = new database();
            $conexion->conectarDB();

            $consulta = "select * from departamento";

            $tabla = $conexion->seleccionar($consulta);
            // en tabla guardo un arreglo con todas las filas

            echo "
                <table class='table table-hover'>
                <thead class='table-dark'>
                    <tr>
                    <th>id_departamento</th>    
                    <th>nombre</th>
                    <th>fecha_creacion</th>
                    </tr>
                </thead>
                <tbody>
            ";

            foreach($tabla as $reg)
            {
                echo "
                <tr>
                <td>$reg->id_departamento</td>
                <td>$reg->nombre</td>
                <td>$reg->fecha_creacion</td>
                </tr>
                ";
            }

            echo "
                </tbody>
                </table>
            ";

            $conexion->desconectarDB();
            ?>
    </div>
</body>
</html>