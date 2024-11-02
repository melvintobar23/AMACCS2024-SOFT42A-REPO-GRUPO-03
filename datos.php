<!-- 
* Copyright 2016 Carlos Eduardo Alfaro Orellana
-->

<?php

session_start();



require_once("Controladores/alumno_controller.php");
require_once("Modelos/alumno.php");

require_once("bootstrap.php");
require_once("cn.php");

if (isset($_SESSION["carnet"])) {

    $carnet = $_SESSION["carnet"];

    $sql = " SELECT * FROM alumno WHERE carnet = '" . $carnet . "' ";
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
        
        // Asegúrate de que el controlador capture las horas sociales.
        
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

<body>
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
                <li class="tooltips-general exit-system-button" data-href="cerrar.php" data-placement="bottom"
                    title="Salir del sistema">
                    <i class="zmdi zmdi-power"></i>
                </li>
                <li class="tooltips-general search-book-button" data-href="searchbook.html" data-placement="bottom"
                    title="Buscar libro">
                    <i class="zmdi zmdi-search"></i>
                </li>
                <li class="tooltips-general btn-help" data-placement="bottom" title="Ayuda">
                    <i class="zmdi zmdi-help-outline zmdi-hc-fw"></i>
                </li>
                <li class="mobile-menu-button visible-xs" style="float: left !important;">
                    <i class="zmdi zmdi-menu"></i>
                </li>
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
                                <input type="text" class="form-control" name="carnet" value="<?= $alumno['carnet'] ?>"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" value="<?= $alumno['nombre'] ?>"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" class="form-control" name="apellido"
                                    value="<?= $alumno['apellido'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" id="inputTelefono" class="form-control" name="telefono"
                                    value="<?= $alumno['telefono'] ?>" pattern="^[0-9]{4}-?[0-9]{4}$"
                                    title="Debe ser un número de teléfono con 8 dígitos, opcionalmente separado por un guion"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" value="<?= $alumno['email'] ?>"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="carrera">Carrera</label>
                                <input type="text" class="form-control" name="carrera" value="<?= $alumno['carrera'] ?>"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="yearingreso">Año de Ingreso</label>
                                <input type="text" class="form-control" name="yearingreso"
                                    value="<?= $alumno['yearingreso'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="grupo">Grupo</label>
                                <input type="text" class="form-control" name="grupo" value="<?= $alumno['grupo'] ?>"
                                    required>
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
            <script>
            document.getElementById('inputTelefono').addEventListener('input', function(e) {
                let telefono = e.target.value.replace(/\D/g, ''); // Elimina caracteres no numéricos
                if (telefono.length > 4) {
                    telefono = telefono.slice(0, 4) + '-' + telefono.slice(4);
                }
                e.target.value = telefono.slice(0, 9); // Asegura que solo se introduzcan 8 dígitos + el guion
            });
            </script>

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js">

            </script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>