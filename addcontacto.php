<?php  
// Mostrar errores para debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Iniciar sesión
session_start();

// Incluir archivos necesarios
require_once("Controladores/alumno_controller.php");
require_once("Controladores/contacto_controller.php");
require_once("Modelos/alumno.php");
require_once("Modelos/contacto.php");
require_once("bootstrap.php");
require_once("cn.php");
require_once("menualumno.php");

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION["carnet"])) {
    $carnet = $_SESSION["carnet"];
    
    // Consultar datos del alumno
    $sql = "SELECT * FROM alumno WHERE carnet = '".$carnet."' ";
    $rs = $cn->query($sql);
    
    // Consultar municipios
    $sql = "SELECT * FROM pr_municipio";
    $result = $cn->query($sql);
    
    $data = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
}

// Procesar el formulario de agregar contacto
$contactocontroller = new ContactoController();
$contacto = new Contacto();

if (isset($_POST['ok1'])) {
    $contacto->SetNombre($_POST["nombre"]);
    $contacto->SetApellido($_POST["apellido"]);
    $contacto->SetTelefono($_POST["telefono"]);
    $contacto->SetTitulouni($_POST["titulo"]);
    $contacto->SetSexo($_POST["sexo"]);
    $contacto->SetEmail($_POST["email"]);
    $contacto->SetIdcargo($_POST["idcargo"]);
    $contacto->SetIdmunicipio($_POST["idmunicipio"]);
    $contacto->SetIdempresa($_POST["idempresa"]);
    $contactocontroller->agregar($contacto);

    header('Location: http://localhost/HSBUENA/addcontacto');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Contacto</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style>
        /* Estilos personalizados */
        .material-control {
            width: 100%;
            padding: 8px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }
        .suggestions-list {
            border: 1px solid #ced4da;
            max-height: 150px;
            overflow-y: auto;
            width: 100%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            position: absolute;
            z-index: 1000;
            background-color: white;
        }
        .suggestion-item {
            padding: 10px;
            cursor: pointer;
        }
        .suggestion-item:hover {
            background-color: #f0f0f0;
        }
        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
            display: none;
        }
        .group-material {
            position: relative;
            margin-bottom: 20px;
        }
    </style>
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
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Agregar Contacto</div>
                <form method="post">
                    <div class="row">
                        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" name="nombre" required="" maxlength="50">
                                <label>Nombre</label>
                            </div>

                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" name="apellido" required="" maxlength="70">
                                <label>Apellido</label>
                            </div>

                            <div class="group-material">
                                <input type="text" id= 'inputTelefono' class="material-control tooltips-general" name="telefono" required="" pattern="[0-9]{8}" maxlength="8">
                                <label>Teléfono</label>
                            </div>

                            <?php
                            $titulosUniversitarios = ["Ingeniero", "Técnico", "Licenciado", "Arquitecto", "Profesor", "Doctor", "Master"];
                            ?>
                            <div class="group-material">
                                <label>Título Universitario</label><br>
                                <select class="material-control tooltips-general" name="titulo" required="">
                                    <?php foreach ($titulosUniversitarios as $titulo) {
                                        echo "<option value='$titulo'>$titulo</option>";
                                    } ?>
                                </select>
                            </div>

                            <div class="group-material">
                                <input type="email" class="material-control tooltips-general" name="email" required="" maxlength="50">
                                <label>Email</label>
                            </div>

                            <div class="group-material">
                                <label>Sexo</label><br>
                                <select class="material-control tooltips-general" name="sexo" required="" maxlength="50">
                                    <option value='' disabled selected></option>
                                    <option value='M'>Masculino</option>
                                    <option value='F'>Femenino</option>
                                    <option value='Otro'>Otro</option>
                                </select>
                            </div>

                            <div class="group-material">
                                <label>Cargo</label><br>
                                <select class="material-control tooltips-general" name="idcargo" required="">
                                    <option value='Supervisor'>Supervisor</option>
                                    <option value='Gerente'>Gerente</option>
                                    <option value='Administrador'>Administrador</option>
                                    <option value='Director'>Director</option>
                                </select>
                            </div>

                            <div class="group-material">
                                <input type="text" id="municipio" class="material-control tooltips-general" placeholder="Escriba un municipio" required="">
                                <div class="suggestions-list" id="suggestions"></div>
                                <div class="error-message" id="municipio-error">Este municipio no está disponible. Por favor, agrégalo en el apartado correspondiente.</div>
                            </div>

                            <div class="group-material">
                                <select class="material-control tooltips-general" name="idempresa" id="empresa" required="">
                                    <option value='' disabled selected>Seleccione una empresa</option>
                                </select>
                            </div>

                            <button type="submit" name="ok1" class="btn btn-primary">Registrar Contacto</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#municipio").on("input", function() {
                var query = $(this).val();
                if (query !== '') {
                    $.ajax({
                        url: "buscar_municipios.php",
                        method: "POST",
                        data: {query: query},
                        success: function(data) {
                            $('#suggestions').html(data);
                        }
                    });
                } else {
                    $('#suggestions').empty();
                }
            });

            $(document).on('click', '.suggestion-item', function() {
                var municipio = $(this).text();
                $('#municipio').val(municipio);
                $('#suggestions').empty();
                cargarEmpresas(municipio);
            });

            function cargarEmpresas(municipio) {
                $.ajax({
                    url: "cargar_empresas.php",
                    method: "POST",
                    data: {municipio: municipio},
                    success: function(data) {
                        $('#empresa').html(data);
                    }
                });
            }
        });

        const inputTelefono = document.getElementById('inputTelefono');
        inputTelefono.addEventListener('input', (e) => {
            let valor = e.target.value.replace(/\D/g, '');
            if (valor.length > 8) valor = valor.slice(0, 8);
            e.target.value = valor;
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
