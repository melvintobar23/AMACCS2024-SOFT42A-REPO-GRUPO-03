<?php 

session_start();

require_once("Controladores/alumno_controller.php");
require_once("Modelos/alumno.php");

require_once("bootstrap.php");
require_once("cn.php");


if(isset($_SESSION["carnet"])){
  
$carnet=$_SESSION["carnet"];


$sql=" SELECT * FROM alumno WHERE carnet = '".$carnet."' ";

$rs=$cn->query($sql);
$resultado=$cn->query($sql);



}
$carnet;
$nombre;
$horas;
$apellido;
$carrera;
$h;
$año;
$email;

while ($alumno = $resultado->fetch_assoc()) {             
    $carnet = $alumno['carnet'];     
    $nombre =$alumno['nombre']    ;
    $apellido =$alumno['apellido'];
    $año = $alumno ['yearingreso'];
    $carrera = $alumno ['carrera'];
    $email = $alumno ['email'];
    $h =$alumno['horas_sociales']    ;
    $horas = 300- $h;

}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <title>Administradores</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="assets/icons/book.ico" />
    <script src="js/sweet-alert.min.js"></script>
    <link rel="stylesheet" href="css/sweet-alert.css">
    <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/main.js"></script>

    <style>
        .form-container {
            max-width: 600px;
            margin: 20px auto;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            border-radius: 10px 10px 0 0;
            padding: 15px;
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
        }
        .form-label {
            font-weight: bold;
        }
        .form-control {
            font-size: 1rem;
            border-radius: 5px;
        }
        .mb-3 {
            margin-bottom: 1.5rem;
        }
        .larger-text {
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <div class="navbar-lateral full-reset">
        <div class="visible-xs font-movile-menu mobile-menu-button"></div>
        <div class="full-reset container-menu-movile custom-scroll-containers">
            <div class="logo full-reset all-tittles">
                <i class="visible-xs zmdi zmdi-close pull-left mobile-menu-button" style="line-height: 55px; cursor: pointer; padding: 0 10px; margin-left: 7px;"></i> 
                Sistema Horas Sociales
            </div>
            <div class="full-reset" style="background-color:#2B3D51; padding: 10px 0; color:#fff;">
                <figure>
                    <img src="imagenes/Logo_nuevo.png" alt="Biblioteca" class="img-responsive center-box" style="width:55%;">
                </figure>
                <p class="text-center" style="padding-top: 15px;">Sistema Horas Sociales</p>
            </div>
            <div class="full-reset nav-lateral-list-menu">
                <ul class="list-unstyled">
                    <li><a href="indexalumno"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp; Inicio</a></li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-case zmdi-hc-fw"></i>&nbsp;&nbsp; Administración <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="datos"><i class="zmdi zmdi-balance zmdi-hc-fw"></i>&nbsp;&nbsp; Datos</a></li>
                            <li><a href="addcontacto"><i class="zmdi zmdi-balance zmdi-hc-fw"></i>&nbsp;&nbsp; Contacto</a></li>
                            <li><a href="addmunicipio"><i class="zmdi zmdi-balance zmdi-hc-fw"></i>&nbsp;&nbsp; Municipio</a></li>
                            <li><a href="adddepto"><i class="zmdi zmdi-balance zmdi-hc-fw"></i>&nbsp;&nbsp; Departamento</a></li>
                            <li><a href="addempresa"><i class="zmdi zmdi-balance zmdi-hc-fw"></i>&nbsp;&nbsp; Empresa</a></li>
                            <li><a href="addsolicitud"><i class="zmdi zmdi-balance zmdi-hc-fw"></i>&nbsp;&nbsp; Solicitud</a></li>
                        </ul>
                        
                    </li>
                      <!--      <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-assignment-o zmdi-hc-fw"></i>&nbsp;&nbsp; Libros y catálogo <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="book.html"><i class="zmdi zmdi-book zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo libro</a></li>
                            <li><a href="catalog.html"><i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i>&nbsp;&nbsp; Catálogo</a></li>
                        </ul>
                    </li>
              <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-alarm zmdi-hc-fw"></i>&nbsp;&nbsp; Préstamos y reservaciones <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="loan.html"><i class="zmdi zmdi-calendar zmdi-hc-fw"></i>&nbsp;&nbsp; Todos los préstamos</a></li>
                            <li>
                                <a href="loanpending.html"><i class="zmdi zmdi-time-restore zmdi-hc-fw"></i>&nbsp;&nbsp; Devoluciones pendientes <span class="label label-danger pull-right label-mhover">7</span></a>
                            </li>
                            <li>
                                <a href="loanreservation.html"><i class="zmdi zmdi-timer zmdi-hc-fw"></i>&nbsp;&nbsp; Reservaciones <span class="label label-danger pull-right label-mhover">7</span></a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="report.html"><i class="zmdi zmdi-trending-up zmdi-hc-fw"></i>&nbsp;&nbsp; Reportes y estadísticas</a></li>
                    <li><a href="advancesettings.html"><i class="zmdi zmdi-wrench zmdi-hc-fw"></i>&nbsp;&nbsp; Configuraciones avanzadas</a></li> -->
                </ul>
            </div>
        </div>
    </div>
    <div class="content-page-container full-reset custom-scroll-containers">
        <nav class="navbar-user-top full-reset">
            <ul class="list-unstyled full-reset">
                <figure>
                   <img src="assets/img/user01.png" alt="user-picture" class="img-responsive img-circle center-box">
                </figure>
<?php 

while ($fila=$rs->fetch_assoc()) {
  echo "
  <li style='color:#fff; cursor:default;'>
  <span class='all-tittles'>$fila[nombre]_$fila[apellido]</span>
</li>
  ";

} 


?>
                <li  class="tooltips-general exit-system-button" data-href="cerrar.php" data-placement="bottom" title="Salir del sistema">
                    <i class="zmdi zmdi-power"></i>
                </li>
                <li  class="tooltips-general btn-help" data-placement="bottom" title="Ayuda">
                    <i class="zmdi zmdi-help-outline zmdi-hc-fw"></i>
                </li>
                <li class="mobile-menu-button visible-xs" style="float: left !important;">
                    <i class="zmdi zmdi-menu"></i>
                </li>
            </ul>
        </nav>

        
        <?php 
        
        ?>

        <section class="full-reset text-center position-relative" style="padding: 40px 0; ">


        <article class="tile">
                <div class="tile-icon full-reset"><i class="zmdi zmdi-timer"></i></div>
                <div class="tile-name all-tittles">Horas a Realizar</div>
                <div class="tile-num full-reset">300</div>
        </article>

        <article class="tile">
                <div class="tile-icon full-reset"><i class="zmdi zmdi-time-restore"></i></div>
                <div class="tile-name all-tittles" style="width: 90%;">Horas Restantes</div>
                <div class="tile-num full-reset"><?php echo $horas;?></div>
            </article>
</section>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Alumnos</title>
</head>
<body>
    <div class="form-container">
    
            <div class='card mb-4 shadow-sm'>
                <div class='card-header bg-dark text-white'>
                    <h5 class='card-title mb-0 larger-text'>Información del Alumno</h5>
                </div>
                <div class='card-body larger-text'>
                    <div class='mb-3'>
                        <label class='form-label fw-bold'>Carnet:</label>
                        <input class='form-control larger-text' type='text' value='<?php echo $carnet; ?>' readonly>
                        </div>
                    <div class='mb-3'>
                        <label class='form-label fw-bold'>Nombre:</label>
                        <input class='form-control larger-text' type='text' value='<?php echo $nombre; ?>' readonly>
                    </div>
                    <div class='mb-3'>
                        <label class='form-label fw-bold'>Apellido:</label>
                        <input class='form-control larger-text' type='text' value='<?php echo $apellido; ?>' readonly>
                    </div>
                    <div class='mb-3'>
                        <label class='form-label fw-bold'>Carrera:</label>
                        <input class='form-control larger-text' type='text' value='<?php echo $carrera; ?>' readonly>
                    </div>
                    <div class='mb-3'>
                        <label class='form-label fw-bold'>Año de Ingreso:</label>
                        <input class='form-control larger-text' type='text'  value='<?php echo $año; ?>' readonly>
                    </div>
                    <div class='mb-3'>
                        <label class='form-label fw-bold'>Email:</label>
                        <input class='form-control larger-text' type='text'  value='<?php echo $email; ?>' readonly>
                    </div>
                    <div class='mb-3'>
                        <label class='form-label fw-bold'>Cantidad de Horas Sociales Realizadas:</label>
                        <input class='form-control larger-text' type='text'  value='<?php echo $h; ?>' readonly>
                    </div>
                </div>
            </div>
          
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

</body>
</html>