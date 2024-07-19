<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Cliente</title>
    <link rel="stylesheet" href="../css/bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
<?php
    session_start();
    if (isset($_SESSION["usuario"])){
        echo"<h5 align='center'>".$_SESSION["usuario"]."</h5>";
        echo"<a href='scripts/cerrarSesion.php'>Cerrar Sesion</a>";
    }
    else{
        header("Location: iniciar_sesion.php");
    }
    ?>
    <div class="container">
        <h1 class="text-center">Alta de Cliente</h1>
        <form action="../scripts/guardaCliente.php" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="ap_paterno" class="form-label">Apellido Paterno</label>
                <input type="text" class="form-control" id="ap_paterno" name="ap_paterno" required>
            </div>
            <div class="mb-3">
                <label for="ap_materno" class="form-label">Apellido Materno</label>
                <input type="text" class="form-control" id="ap_materno" name="ap_materno" required>
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" required>
            </div>
            <div class="mb-3">
                <label for="mail" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="mail" name="mail" required>
            </div>
            <div class="mb-3">
                <label for="departamento" class="form-label">Departamento</label>
                <select class="form-control" id="departamento" name="departamento" required>
                    <option value="">Seleccione un departamento</option>
                    <?php
                    include '../class/database.php'; //incluir el script
                    $conexion = new database();
                    $conexion->conectarDB();

                    // Cambiar la consulta para obtener el id y el nombre del departamento
                    $consulta = "SELECT id_departamento, nombre FROM departamento";
                    $tabla = $conexion->seleccionar($consulta);

                    foreach ($tabla as $reg) {
                        echo "<option value='{$reg->id_departamento}'>{$reg->nombre}</option>";
                    }

                    $conexion->desconectarDB();
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</body>
</html>

