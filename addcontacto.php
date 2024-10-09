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
if(isset($_SESSION["carnet"])){
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
    echo "Registro Insertado con exito";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Contacto</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Incluir CSS de Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Incluir jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Incluir JS de Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>
    <div class="content-page-container full-reset custom-scroll-containers">
        <nav class="navbar-user-top full-reset">
            <ul class="list-unstyled full-reset">
                <figure>
                    <img src="assets/img/user01.png" alt="user-picture" class="img-responsive img-circle center-box">
                </figure>
                <?php 
                // Mostrar nombre del alumno logueado
                while ($fila = $rs->fetch_assoc()) {
                    echo "<li style='color:#fff; cursor:default;'>
                            <span class='all-tittles'>{$fila['nombre']}_{$fila['apellido']}</span>
                          </li>";
                }
                ?>
                <li class="tooltips-general exit-system-button" data-href="cerrar" title="Salir del sistema">
                    <i class="zmdi zmdi-power"></i>
                </li>
            </ul>
        </nav>
        
        <div class="container-fluid" style="margin: 50px 0;">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Agregar Contacto</div>
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-3">
                        <img src="assets/img/user04.png" alt="user" class="img-responsive center-box" style="max-width: 110px;">
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                        Bienvenido a la sección para registrar un nuevo Contacto, Favor de llenar los campos solicitados.
                    </div>
                </div>
            </div>

            <form method="post">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                        <!-- Nombre -->
                        <div class="group-material">
                            <input type="text" class="material-control tooltips-general" name="nombre" required="" maxlength="50">
                            <label>Nombre</label>
                        </div>

                        <!-- Apellido -->
                        <div class="group-material">
                            <input type="text" class="material-control tooltips-general" name="apellido" required="" maxlength="70">
                            <label>Apellido</label>
                        </div>

                        <!-- Teléfono -->
                        <div class="group-material">
                            <input type="text" class="material-control tooltips-general" name="telefono" required="" pattern="[0-9]{8}" maxlength="8">
                            <label>Teléfono</label>
                        </div>

                        <!-- Título Universitario -->
                        <?php
                        $titulosUniversitarios = [
                            "Ingeniero", "Téncico", "Licenciado", "Arquitecto", "Profesor", "Doctor", "Master"
                        ];
                        ?>
                        <div class="group-material">
                            <label>Título Universitario</label>
                            <select class="material-control tooltips-general" name="titulo" required="">
                                <?php foreach ($titulosUniversitarios as $titulo) {
                                    echo "<option value='$titulo'>$titulo</option>";
                                } ?>
                            </select>
                        </div>

                        <!-- Email -->
                        <div class="group-material">
                            <input type="email" class="material-control tooltips-general" name="email" required="" maxlength="50">
                            <label>Email</label>
                        </div>

                        <!-- Sexo -->
                        <div class="group-material">
                            <label>Sexo</label>
                            <select class="material-control tooltips-general" name="sexo" required="">
                                <option value='' disabled selected></option>
                                <option value='M'>Masculino</option>
                                <option value='F'>Femenino</option>
                                <option value='Otro'>Otro</option>
                            </select>
                        </div>

                        <!-- Cargo -->
                        <div class="group-material">
                            <label>Cargo</label>
                            <select class="material-control tooltips-general" name="idcargo" required="">
                                <option value='Supervisor'>Supervisor</option>
                                <option value='Gerente'>Gerente</option>
                                <option value='Administrador'>Administrador</option>
                                <option value='Director'>Director</option>
                            </select>
                        </div>
                        <div class="group-material">
    <label>Municipio</label>
    <select class="material-control tooltips-general" name="idmunicipio" id="municipio" required="">
        <option value='' disabled selected>Seleccione un municipio</option>
        <?php foreach ($data as $item) {
            echo "<option value='{$item['idmunicipio']}'>{$item['municipio']}</option>";
        } ?>
    </select>
</div>

<!-- Inicializar Select2 para el select de Municipio con búsqueda activa sin desplegar -->
<script>
    $(document).ready(function() {
        $('#municipio').select2({
            placeholder: "Seleccione o escriba un municipio",  // Placeholder
            allowClear: true,  // Permitir borrar selección
            tags: true,  // Habilitar escritura directa en el campo
            width: '100%'  // Ancho completo
        });
    });
</script>

                        <!-- Empresa -->
                        <div class="group-material">
                            <label>Empresa</label>
                            <select class="material-control tooltips-general" name="idempresa" id="empresa" required="">
                                <option value='' disabled selected>Seleccione una empresa</option>
                            </select>
                        </div>

                        <!-- Botones -->
                        <p class="text-center">
                            <button type="reset" class="btn btn-info" style="margin-right: 20px;">Limpiar</button>
                            <button type="submit" name="ok1" class="btn btn-primary">Guardar</button>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#municipio').on('change', function() {
                var municipioId = $(this).val();
                if (municipioId) {
                    $.ajax({
                        type: 'POST',
                        url: '', // Esta es la misma página, puedes cambiarlo si prefieres otro archivo PHP
                        data: {idmunicipio: municipioId},
                        success: function(response) {
                            $('#empresa').html(response);
                        }
                    });
                } else {
                    $('#empresa').html('<option value="">Seleccione un municipio primero</option>');
                }
            });
        });
    </script>

    <?php
    // Procesar la solicitud AJAX para obtener las empresas
    if (isset($_POST['idmunicipio'])) {
        $idmunicipio = $_POST['idmunicipio'];
        $sql = "SELECT idempresa, nomempresa FROM pr_empresa WHERE idmunicipio = ?";
        
        if ($stmt = $cn->prepare($sql)) {
            $stmt->bind_param("i", $idmunicipio);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                echo "<option value='' disabled selected>Seleccione una empresa</option>";
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['idempresa']}'>{$row['nomempresa']}</option>";
                }
            } else {
                echo "<option value=''>No hay empresas disponibles</option>";
            }
        } else {
            echo "<option value=''>Error en la consulta</option>";
        }
        exit();
    }
    ?>
</body>
</html>
