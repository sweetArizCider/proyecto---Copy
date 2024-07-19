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
        <div class="row">
            <div class="col-3">
                <h1>Departamento: </h1>
            </div>
            <div class="col-9">
                <form action="" method="post">
                    <select class="form-control" id="departamento" name="departamento" required>
                        <option value="">Seleccione un departamento</option>
                        <?php
                        include '../class/database.php'; 
                        $conexion = new database();
                        $conexion->conectarDB();

                        $consulta = "SELECT id_departamento, nombre FROM departamento";
                        $tabla = $conexion->seleccionar($consulta);

                        foreach ($tabla as $reg) {
                            echo "<option value='{$reg->id_departamento}'>{$reg->nombre}</option>";
                        }
                        ?>
                    </select>
                    <button type="submit" class="btn btn-primary mt-2">Buscar</button>
                </form>
            </div>
        </div>

        <?php
        if (isset($_POST['departamento'])) {
            $id_departamento =$_POST['departamento'];

            $consulta = "call BuscarClientesPorDepartamento($id_departamento);";

            $tabla = $conexion->seleccionar($consulta);

            echo "
                <table class='table table-hover mt-4'>
                <thead class='table-dark'>
                    <tr>
                        <th>Nombre</th>
                        <th>A Paterno</th>
                        <th>A Materno</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                    </tr>
                </thead>
                <tbody>
            ";

            foreach ($tabla as $reg) {
                echo "
                <tr>
                    <td>{$reg->nombre}</td>
                    <td>{$reg->ap_paterno}</td>
                    <td>{$reg->ap_materno}</td>
                    <td>{$reg->direccion}</td>
                    <td>{$reg->telefono}</td>
                    <td>{$reg->mail}</td>
                </tr>
                ";
            }

            echo "
                </tbody>
                </table>
            ";
        }
        $conexion->desconectarDB();
        ?>
    </div>
</body>
</html>
