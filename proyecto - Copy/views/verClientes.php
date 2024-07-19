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

            $consulta = "select cliente.id_cliente, cliente.nombre, cliente.ap_paterno, cliente.ap_materno, cliente.direccion, cliente.telefono, cliente.mail, departamento.nombre as departamento from cliente join departamento on cliente.departamento=departamento.id_departamento";

            $tabla = $conexion->seleccionar($consulta);
            // en tabla guardo un arreglo con todas las filas

            echo "
                <table class='table table-hover'>
                <thead class='table-dark'>
                    <tr>
                    <th>Id</th>    
                    <th>Nombre</th>
                    <th>A Paterno</th>
                    <th>A Materno</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Departamento</th>
                    </tr>
                </thead>
                <tbody>
            ";

            foreach($tabla as $reg)
            {
                echo "
                <tr>
                <td>$reg->id_cliente</td>
                <td>$reg->nombre</td>
                <td>$reg->ap_paterno</td>
                <td>$reg->ap_materno</td>
                <td>$reg->direccion</td>
                <td>$reg->telefono</td>
                <td>$reg->mail</td>
                <td>$reg->departamento</td>
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