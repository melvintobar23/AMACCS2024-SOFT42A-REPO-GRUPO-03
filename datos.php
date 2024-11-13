<?php

session_start();

require_once("Controladores/alumno_controller.php");
require_once("Modelos/alumno.php");

require_once("bootstrap.php");
require_once("cn.php");

if (isset($_SESSION["carnet"])) {

    $carnet = $_SESSION["carnet"];

    $sql = "SELECT * FROM alumno WHERE carnet = '" . $carnet . "' ";
    $rs = $cn->query($sql);
    $resultado = $cn->query($sql);
}

?>

<?php

$alumnocontroller = new AlumnoController();
$alumno = new Alumno();

if (isset($_POST['ok1'])) {
    $alumno->setCarnet($_SESSION["carnet"]);
    $alumno->setNombre($_POST["nombre"]);
    $alumno->setApellido($_POST["apellido"]);
    $alumno->setTelefono($_POST["telefono"]);
    $alumno->setGrupo($_POST["grupo"]);
    $alumno->setSexo($_POST["sexo"]);
    $alumno->setEmail($_POST["email"]);
    $alumno->setYearIngreso($_POST["yearingreso"]);
    $alumno->setCarrera($_POST["carrera"]);
    $alumno->setHorasSociales($_POST["horas_sociales"]);

    $alumnocontroller->actualizar($alumno);

    header('Location: http://localhost/HSBUENA/datos');
    echo "Registro Actualizado con éxito";
}

?>

<?php

require_once("bootstrap.php");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Alumnos</title>
</head>
<body>

<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Administración
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="datos.php">Datos</a>
        <a class="dropdown-item" href="addcontacto.php">Contacto</a>
        <a class="dropdown-item" href="addmunicipio.php">Municipio</a>
        <a class="dropdown-item" href="adddepto.php">Departamento</a>
        <a class="dropdown-item" href="addempresa.php">Empresa</a>
        <a class="dropdown-item" href="addsolicitud.php">Solicitud</a>
    </div>
</div>

<div class="content-page-container full-reset custom-scroll-containers">
    <nav class="navbar-user-top full-reset">
        <ul class="list-unstyled full-reset">
            <figure>
                <img src="assets/img/user01.png" alt="user-picture" class="img-responsive img-circle center-box">
            </figure>
            <?php
            while ($fila = $rs->fetch_assoc()) {
                echo "
                <li style='color:#fff; cursor:default;'>
                <span class='all-tittles'>$fila[nombre]_$fila[apellido]</span>
                </li>
                ";
            }
            ?>
        </ul>
    </nav>

    <div class="container-fluid" style="margin: 50px 0;">
        <div class="container mt-5">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Actualizar Datos del Alumno</h3>
                </div>
                <div class="card-body">
                    <?php while ($alumno = $resultado->fetch_assoc()) { ?>
                    <form method="post">
                        <div class="form-group">
                            <label for="carnet">Carnet de Alumno</label>
                            <input type="text" class="form-control" name="carnet" value="<?= $alumno['carnet'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" value="<?= $alumno['nombre'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" name="apellido" value="<?= $alumno['apellido'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" id="inputTelefono" class="form-control" name="telefono" value="<?= $alumno['telefono'] ?>" pattern="^[0-9]{4}-?[0-9]{4}$" title="Debe ser un número de teléfono con 8 dígitos, opcionalmente separado por un guion" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="<?= $alumno['email'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="carrera">Carrera</label>
                            <input type="text" class="form-control" name="carrera" value="<?= $alumno['carrera'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="yearingreso">Año de Ingreso</label>
                            <input type="text" class="form-control" name="yearingreso" value="<?= $alumno['yearingreso'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="grupo">Grupo</label>
                            <input type="text" class="form-control" name="grupo" value="<?= $alumno['grupo'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="horas_sociales">Horas Sociales Realizadas</label>
                            <input type="number" class="form-control" name="horas_sociales" value="<?= $alumno['horas_sociales'] ?>" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="ok1" class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.getElementById('inputTelefono').addEventListener('input', function(e) {
        let telefono = e.target.value.replace(/\D/g, ''); 
        if (telefono.length > 4) {
            telefono = telefono.slice(0, 4) + '-' + telefono.slice(4);
        }
        e.target.value = telefono.slice(0, 9); 
    });
    </script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
