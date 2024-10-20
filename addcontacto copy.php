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
    exit; // Asegúrate de usar exit después de redirigir
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
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        
        .container-fluid {
            margin: 50px auto;
            max-width: 800px; /* Limitar el ancho del contenedor */
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px; /* Agregar padding al contenedor */
        }

        .title-flat-form {
            background: #007bff;
            color: white;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 20px;
        }

        .group-material {
            position: relative;
            margin-bottom: 20px;
        }

        .material-control {
            width: 100%;
            padding: 8px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
            transition: border-color 0.3s; /* Transición suave al enfoque */
        }

        .material-control:focus {
            border-color: #007bff; /* Cambiar el color de borde al enfocar */
            outline: none; /* Eliminar el contorno predeterminado */
        }

        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
            display: none;
        }

        button {
            background-color: #007bff; /* Color del botón */
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3; /* Color del botón al pasar el mouse */
        }
    </style>
</head>
<body>
    <div class="content-page-container full-reset custom-scroll-containers">
        <nav class="navbar-user-top full-reset">
            <ul class="list-unstyled full-reset">
            <figure>
    <img src="assets/img/user01.png" alt="user-picture" class="img-responsive img-circle center-box" style="max-width: 70px; max-height: 70px;">
</figure>

                <?php 
                // Mostrar nombre del alumno logueado
                while ($fila = $rs->fetch_assoc()) {
                    echo "<li style='color:#fff; cursor:default;'>
                            <span class='all-tittles'>{$fila['nombre']} {$fila['apellido']}</span>
                          </li>";
                }
                ?>
                <li class="tooltips-general exit-system-button" data-href="cerrar.php" title="Salir del sistema">
                    <i class="zmdi zmdi-power"></i>
                </li>
            </ul>
        </nav>
        
        <div class="container-fluid">
            <div class="title-flat-form">Agregar Contacto</div>
            <div class="row">
                <div class="col-xs-12 text-justify lead">
                    Bienvenido a la sección de registrar un nuevo Contacto
                </div>
            </div>

            <form method="post">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <!-- Nombre -->
                        <div class="group-material">
                            <input type="text" class="material-control" name="nombre" required="" maxlength="50" placeholder="Nombre">
                        </div>

                        <!-- Apellido -->
                        <div class="group-material">
                            <input type="text" class="material-control" name="apellido" required="" maxlength="70" placeholder="Apellido">
                        </div>

                        <!-- Teléfono -->
                        <div class="group-material">
                            <input type="text" class="material-control" name="telefono" required="" pattern="[0-9]{8}" maxlength="8" placeholder="Teléfono">
                        </div>

                        <!-- Título Universitario -->
                        <div class="group-material">
                            <label>Título Universitario</label>
                            <select class="material-control" name="titulo" required="">
                                <?php
                                $titulosUniversitarios = [
                                    "Ingeniero", "Técnico", "Licenciado", "Arquitecto", "Profesor", "Doctor", "Master"
                                ];
                                foreach ($titulosUniversitarios as $titulo) {
                                    echo "<option value='$titulo'>$titulo</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Email -->
                        <div class="group-material">
                            <input type="email" class="material-control" name="email" required="" maxlength="50" placeholder="Email">
                        </div>

                        <!-- Sexo -->
                        <div class="group-material">
                            <label>Sexo</label>
                            <select class="material-control" name="sexo" required="">
                                <option value='' disabled selected>Seleccione una opción</option>
                                <option value='M'>Masculino</option>
                                <option value='F'>Femenino</option>
                                <option value='Otro'>Otro</option>
                            </select>
                        </div>

                        <!-- Cargo -->
                        <div class="group-material">
                            <label>Cargo</label>
                            <select class="material-control" name="idcargo" required="">
                                <option value='Supervisor'>Supervisor</option>
                                <option value='Gerente'>Gerente</option>
                                <option value='Administrador'>Administrador</option>
                                <option value='Director'>Director</option>
                            </select>
                        </div>

                        <!-- Municipio -->
                        <div class="group-material">
                            <input type="text" id="municipio" class="material-control" placeholder="Escriba un municipio" required="">
                            <div class="suggestions-list" id="suggestions"></div>
                            <div class="error-message" id="municipio-error">Este municipio no está disponible. Por favor, agrégalo en el apartado correspondiente.</div>
                        </div>

                        <!-- Empresa -->
                        <div class="group-material">
                            <label>Empresa</label>
                            <select class="material-control" name="idempresa" id="empresa" required="">
                                <option value='' disabled selected>Seleccione una empresa</option>
                                <!-- Las empresas se cargarán dinámicamente -->
                            </select>
                        </div>

                        <!-- Botón para enviar -->
                        <button type="submit" name="ok1">Registrar Contacto</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Autocompletar municipios
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

            // Al hacer clic en una sugerencia
            $(document).on('click', '.suggestion-item', function() {
                var municipio = $(this).text();
                $('#municipio').val(municipio);
                $('#suggestions').empty();
                cargarEmpresas(municipio); // Cargar empresas al seleccionar municipio
            });

            // Cargar empresas basado en el municipio
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
    </script>
</body>
</html>
