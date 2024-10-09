<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("bootstrap.php");
require_once("cn.php");

require_once("Controladores/alumno_controller.php");
require_once("Modelos/alumno.php");

$alumnocontroller = new AlumnoController();
$alumno = new Alumno();

if (isset($_POST['ok1'])) {
    $carnet = $_POST["carnet"];

    $sql = "SELECT * FROM alumno WHERE carnet = '" . $carnet . "' ";
    $rs = $cn->query($sql);

    if ($rs->num_rows > 0) {
        echo "Carnet Existente";
    } 
    if ($rs->num_rows == 0) {
        $alumno->setCarnet($_POST["carnet"]);
        $alumno->setNombre($_POST["nombre"]);
        $alumno->setApellido($_POST["apellido"]);
        $alumno->setTelefono($_POST["telefono"]);
        $alumno->setGrupo($_POST["grupo"]);
        $alumno->setSexo($_POST["sexo"]);
        $alumno->setEmail($_POST["email"]);
        $alumno->setYearIngreso($_POST["yearingreso"]);
        $alumno->setCarrera($_POST["carrera"]);

        $alumnocontroller->agregar($alumno);
        header('Location: http://localhost/HSBUENA/login.php');
    }
}
?>

<?php require_once("bootstrap.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Horas Sociales</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css">
    <style>
        .background-radial-gradient {
            background-color: hsl(218, 41%, 15%);
            background-image: radial-gradient(650px circle at 0% 0%,
                hsl(218, 41%, 35%) 15%,
                hsl(218, 41%, 30%) 35%,
                hsl(218, 41%, 20%) 75%,
                hsl(218, 41%, 19%) 80%,
                transparent 100%),
            radial-gradient(1250px circle at 100% 100%,
                hsl(218, 41%, 45%) 15%,
                hsl(218, 41%, 30%) 35%,
                hsl(218, 41%, 20%) 75%,
                hsl(218, 41%, 19%) 80%,
                transparent 100%);
        }

        #radius-shape-1, #radius-shape-2 {
            position: absolute;
            overflow: hidden;
            background: radial-gradient(#44006b, #ad1fff);
        }

        #radius-shape-1 {
            height: 220px;
            width: 220px;
            top: -60px;
            left: -130px;
        }

        #radius-shape-2 {
            border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
            bottom: -60px;
            right: -110px;
            width: 300px;
            height: 300px;
        }

        .bg-glass {
            background-color: hsla(0, 0%, 100%, 0.9) !important;
            backdrop-filter: saturate(200%) blur(25px);
        }

        .form-outline {
            margin-bottom: 1rem;
        }

        .form-control, .form-select {
            height: 2.5rem;
            padding: 0.5rem;
        }

        .btn-primary {
            margin-top: 1rem;
        }
    </style>
</head>
<body>
<section class="background-radial-gradient overflow-hidden">
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
        <div class="row gx-lg-5 align-items-center mb-5">
            <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                    Bienvenido al Registro de Horas Sociales <br />
                    <span style="color: hsl(218, 81%, 75%)">For ITCA Fepade Santa Ana</span>
                </h1>
                <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                    Favor de ingresar los datos solicitados para poder registrarse en el sistema.
                </p>
            </div>

            <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                <div class="card bg-glass">
                    <div class="card-body px-4 py-5 px-md-5">
                        <form method="post">
                            <!-- Carnet input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" id="carnet" name="carnet" class="form-control" required />
                                <label class="form-label" for="carnet">Carnet</label>
                            </div>

                            <!-- Nombre input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" id="nombre" name="nombre" class="form-control" required />
                                <label class="form-label" for="nombre">Nombre</label>
                            </div>

                            <!-- Apellido input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" id="apellido" name="apellido" class="form-control" required />
                                <label class="form-label" for="apellido">Apellido</label>
                            </div>

                            <!-- Teléfono input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" id="telefono" name="telefono" class="form-control" required />
                                <label class="form-label" for="telefono">Teléfono</label>
                            </div>
                            
                            <!-- Sexo select -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <select id="sexo" name="sexo" class="form-select" required>
                                    <option value="" disabled selected>Selecciona tu sexo</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                                <label class="form-label" for="sexo">Sexo</label>
                            </div>

                            <!-- Email input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="email" id="email" name="email" class="form-control" required />
                                <label class="form-label" for="email">Email</label>
                            </div>

                            <!-- Año de Ingreso select -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <select id="yearingreso" name="yearingreso" class="form-select" required>
                                    <option value="" disabled selected>Selecciona tu año de ingreso</option>
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                </select>
                                <label class="form-label" for="yearingreso">Año de Ingreso</label>
                            </div>

                            <!-- Carrera select -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <select id="carrera" name="carrera" class="form-select" required>
                                    <option value="" disabled selected>Selecciona tu carrera</option>
                                    <option value="Tecnico en Ingenieria en Desarrollo de Software" data-grupos="SOFT11, SOFT12, SOFT13, SOFT21, SOFT22, SOFT23">Tecnico en Ingenieria en Desarrollo de Software</option>
                                    <option value="Tecnico en Ingenieria Electrica" data-grupos="ELEC11, ELEC12, ELEC13, ELEC21, ELEC22, ELEC23">Tecnico en Ingenieria Electrica</option>
                                    <option value="Tecnico en Hardware Computacional" data-grupos="HARD11, HARD12, HARD13, HARD21, HARD22, HARD23">Tecnico en Hardware Computacional</option>
                                </select>
                                <label class="form-label" for="carrera">Carrera</label>
                            </div>

                            <!-- Grupo select -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <select id="grupo" name="grupo" class="form-select" required>
                                    <option value="" disabled selected>Selecciona tu grupo</option>
                                </select>
                                <label class="form-label" for="grupo">Grupo</label>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" name="ok1" class="btn btn-primary btn-block mb-4">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const carreraSelect = document.getElementById('carrera');
        const grupoSelect = document.getElementById('grupo');

        carreraSelect.addEventListener('change', function() {
            const grupos = this.selectedOptions[0].dataset.grupos;

            // Limpiar el select de grupos
            grupoSelect.innerHTML = '<option value="" disabled selected>Selecciona tu grupo</option>';

            if (grupos) {
                const gruposArray = grupos.split(', ');
                gruposArray.forEach(grupo => {
                    const option = document.createElement('option');
                    option.value = grupo;
                    option.textContent = grupo;
                    grupoSelect.appendChild(option);
                });
            }
        });
    });
</script>
</body>
</html>
