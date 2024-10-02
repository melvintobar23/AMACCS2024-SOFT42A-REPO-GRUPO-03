<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();



require_once("Controladores/alumno_controller.php");
require_once("Controladores/solicitud_controller.php");
require_once("Modelos/alumno.php");
require_once("Modelos/solicitud.php");

require_once("bootstrap.php");
require_once("cn.php");

if(isset($_SESSION["carnet"])){
  
$carnet=$_SESSION["carnet"];

$sql=" SELECT * FROM alumno WHERE carnet = '".$carnet."' ";
$rs=$cn->query($sql);
$resultado=$cn->query($sql);


$sql=" SELECT * FROM pr_empresa ";
$resu=$cn->query($sql);

if ($resu->num_rows > 0) {
    // Crear un arreglo para almacenar los resultados
    $dato = array();

    // Recorrer los resultados y guardarlos en el arreglo
    while($row = $resu->fetch_assoc()) {
        $dato[] = $row;
    }


}

$sql=" SELECT * FROM pr_contacto ";
$resulta=$cn->query($sql);

if ($resulta->num_rows > 0) {
    // Crear un arreglo para almacenar los resultados
    $datos = array();

    // Recorrer los resultados y guardarlos en el arreglo
    while($row = $resulta->fetch_assoc()) {
        $datos[] = $row;
    }


}





}


?>

<?php

$solicitudcontroller = new SolicitudController();
$solicitud = new Solicitud();

if (isset($_POST['ok1'])) {
    
    $solicitud->SetIdtiposolicitud($_POST["tiposolicitud"]);
    $solicitud->SetCarnet($_POST["carnet"]);
    $solicitud->SetIdempresa($_POST["idempresa"]);
    $solicitud->SetIdcontacto($_POST["idcontacto"]);
    $solicitud->SetIdgrupo($_POST["idgrupo"]);
    $solicitud->SetActividadDesarrollar($_POST["actividad"]);
    $solicitud->SetDiasservicio($_POST["dias"]);
    $solicitud->SetHorario($_POST["horario"]);
    $solicitud->SetHorasaldias($_POST["horasaldia"]);
    $solicitud->SetFechainicio($_POST["fechain"]);
    $solicitud->SetFechaestimadaFin($_POST["fechafin"]);

    $solicitudcontroller->agregar($solicitud);

    header('Location: http://localhost/HSBUENA/addsolicitud');

    echo "Registro Insertado con exito";
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

while ($fila=$rs->fetch_assoc()) {
  echo "
  <li style='color:#fff; cursor:default;'>
  <span class='all-tittles'>$fila[nombre]_$fila[apellido]</span>
</li>
  ";

} 


?>
                <li  class="tooltips-general exit-system-button" data-href="cerrar" data-placement="bottom" title="Salir del sistema">
                    <i class="zmdi zmdi-power"></i>
                </li>
                <li  class="tooltips-general search-book-button" data-href="searchbook.html" data-placement="bottom" title="Buscar libro">
                    <i class="zmdi zmdi-search"></i>
                </li>
                <li  class="tooltips-general btn-help" data-placement="bottom" title="Ayuda">
                    <i class="zmdi zmdi-help-outline zmdi-hc-fw"></i>
                </li>
                <li class="mobile-menu-button visible-xs" style="float: left !important;">
                    <i class="zmdi zmdi-menu"></i>
                </li>
            </ul>
        </nav>
        <div class="container-fluid"  style="margin: 50px 0;">

        <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Agregar Solicitud
                    
                </div>
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="assets/img/user04.png" alt="user" class="img-responsive center-box" style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Bienvenido a la sección para presentar una solicitud, favor de llenar los campos requeridos.
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 lead">
                </div>
            </div>
        </div>
        <div class="container-fluid">
        <form method='post'>
    <div class='row'>
    <div class=''>
            <label class="text-danger">Tipo Solicitud</label>
                <select class='material-control tooltips-general' name='tiposolicitud' required='' data-toggle='tooltip' data-placement='top' title='Seleccione el sexo del alumno'>
                    <option value='' disabled selected></option>
                    <option value='Practicas Profesionales'>Practicas Profesionales</option>
                    <option value='Horas Sociales'>Horas Sociales</option>
                </select>
                <span class='highlight'></span>
                <span class='bar'></span>

            </div>

<br>
<br>

            <?php 

            

while ($alumno=$resultado->fetch_assoc()) {
  echo "
   <div class='group-material'>
                <input type='text' value='$alumno[carnet]' class='material-control tooltips-general' name='carnet' required='' maxlength='70' data-toggle='tooltip' data-placement='top' >
                <span class='highlight'></span>
                <span class='bar'></span>
                <label>Carnet</label>
            </div>
            <br>
              <br>
  ";

} 
?>


            <div class=''>
            <label class="text-danger">Empresa</label>
                <select class='material-control tooltips-general' name='idempresa' required='' data-toggle='tooltip' data-placement='top'>
              <?php   foreach ($dato as $item) {
        echo " <option value='$item[nomempresa]'>$item[nomempresa]</option>";
    }?>
                </select>
                <span class='highlight'></span>
                <span class='bar'></span>

            </div>
            <br>
            <br>

            
            <div class=''>
            <label class="text-danger">Contacto</label>
                <select class='material-control tooltips-general' name='idcontacto' required='' data-toggle='tooltip' data-placement='top'>
              <?php   foreach ($datos as $item) {
        echo " <option value='$item[titulouni] $item[nombre] $item[apellido]'>$item[titulouni] $item[nombre] $item[apellido]</option>";
    }?>
                </select>
                <span class='highlight'></span>
                <span class='bar'></span>

            </div>

            <br>
            <br>
            <br>
            <label class="text-danger">Grupo</label>
                <select class='material-control tooltips-general' name='grupo' required='' data-toggle='tooltip' data-placement='top'>
                <option value="ELEC11">ELEC11</option>
        <option value="ELEC12">ELEC12</option>
        <option value="ELEC13">ELEC13</option>
        <option value="ELEC21">ELEC21</option>
        <option value="ELEC22">ELEC22</option>
        <option value="ELEC23">ELEC23</option>
        <option value="ELEC31">ELEC31</option>
        <option value="ELEC32">ELEC32</option>
        <option value="ELEC41">ELEC41</option>
        <option value="ELEC42">ELEC42</option>
        <option value="SOFT11">SOFT11</option>
        <option value="SOFT12">SOFT12</option>
        <option value="SOFT13">SOFT13</option>
        <option value="SOFT21">SOFT21</option>
        <option value="SOFT22">SOFT22</option>
        <option value="SOFT23">SOFT23</option>
        <option value="SOFT31">SOFT31</option>
        <option value="SOFT32">SOFT32</option>
        <option value="SOFT41">SOFT41</option>
        <option value="SOFT42">SOFT42</option>
        <option value="HARD11">HARD11</option>
        <option value="HARD12">HARD12</option>
        <option value="HARD13">HARD13</option>
        <option value="HARD21">HARD21</option>
        <option value="HARD22">HARD22</option>
        <option value="HARD23">HARD23</option>
        <option value="HARD31">HARD31</option>
        <option value="HARD32">HARD32</option>
        <option value="HARD41">HARD41</option>
        <option value="HARD42">HARD42</option>
                </select>
                <span class='highlight'></span>
                <span class='bar'></span>

            </div>

            <br>
            <br>

            <div class='group-material'>
                <input type='text' class='material-control tooltips-general' name='actividad' required='' maxlength='50' data-toggle='tooltip' data-placement='top' >
                <span class='highlight'></span>
                <span class='bar'></span>
                <label>Actividades a Desarrollar</label>
            </div>
            <div class='group-material'>
                <input type='text' class='material-control tooltips-general' name='dias' required='' maxlength='50' data-toggle='tooltip' data-placement='top' >
                <span class='highlight'></span>
                <span class='bar'></span>
                <label>Días de Servicio</label>
            </div>
            <div class='group-material'>
                <input type='text' class='material-control tooltips-general' name='horario' required='' maxlength='50' data-toggle='tooltip' data-placement='top' >
                <span class='highlight'></span>
                <span class='bar'></span>
                <label>Horario</label>
            </div>
            <div class='group-material'>
                <input type='number' class='material-control tooltips-general' name='horasaldia' required='' maxlength='50' data-toggle='tooltip' data-placement='top' >
                <span class='highlight'></span>
                <span class='bar'></span>
                <label>Horas al dia</label>
            </div>
            <div class='group-material'>
                <input type='date' class='material-control tooltips-general' name='fechain' required='' maxlength='50' data-toggle='tooltip' data-placement='top'>
                <span class='highlight'></span>
                <span class='bar'></span>
                <label>Fecha de Inicio</label>
            </div>

            <div class='group-material'>
                <input type='date' class='material-control tooltips-general' name='fechafin' required='' maxlength='50' data-toggle='tooltip' data-placement='top'>
                <span class='highlight'></span>
                <span class='bar'></span>
                <label>Fecha Tentativa Fin</label>
            </div>
            <p class='text-center'>
                <button type='reset' class='btn btn-info' style='margin-right: 20px;'><i class='zmdi zmdi-roller'></i> &nbsp;&nbsp; Limpiar</button>
                <button type='submit' name='ok1' class='btn btn-primary'><i class='zmdi zmdi-floppy'></i> &nbsp;&nbsp; Guardar</button>
            </p>
        </div>
    </div>
</form>

</form>