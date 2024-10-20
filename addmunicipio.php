<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();



require_once("Controladores/alumno_controller.php");
require_once("Controladores/municipio_controller.php");
require_once("Modelos/alumno.php");
require_once("Modelos/municipio.php");

require_once("bootstrap.php");
require_once("cn.php");

if(isset($_SESSION["carnet"])){
  
$carnet=$_SESSION["carnet"];

$sql=" SELECT * FROM alumno WHERE carnet = '".$carnet."' ";
$rs=$cn->query($sql);
$resultado=$cn->query($sql);

$sql=" SELECT * FROM pr_depto ";
$result=$cn->query($sql);

if ($result->num_rows > 0) {
    // Crear un arreglo para almacenar los resultados
    $data = array();

    // Recorrer los resultados y guardarlos en el arreglo
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }


}
}

?>

<?php

$municipiocontroller = new MunicipioController();
$municipio = new Municipio();

if (isset($_POST['ok1'])) {

    $municipio->SetIddepto($_POST["departamento"]);
    $municipio->SetMunicipio($_POST["municipio"]);

    $municipiocontroller->agregar($municipio);
    header('Location: http://localhost/HSBUENA/addmunicipio');

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
                <li  class="tooltips-general exit-system-button" data-href="cerrar.php" data-placement="bottom" title="Salir del sistema">
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
                <div class="title-flat-form title-flat-blue">Agregar Municipio
                    
                </div>
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="assets/img/user04.png" alt="user" class="img-responsive center-box" style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Bienvenido a la sección para registrar un nuevo Municipio, favor de llenar los campos solicitados.
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
        <div class='col-xs-12 col-sm-8 col-sm-offset-2'>
        <div class=''>
            <label class="text-danger">Departamento</label>
                <select class='material-control tooltips-general' name='departamento' required='' data-toggle='tooltip' data-placement='top'>
              <?php   foreach ($data as $item) {
        echo " <option value='$item[depto]'>$item[depto]</option>";
    }?>
                </select>
                <span class='highlight'></span>
                <span class='bar'></span>

            </div>

            <br>
            <br>
            
            <div class='group-material'>
                <input type='text' class='material-control tooltips-general' name='municipio' required='' maxlength='70' data-toggle='tooltip' data-placement='top' >
                <span class='highlight'></span>
                <span class='bar'></span>
                <label>Municipio</label>
            </div>
            
            <p class='text-center'>
                <button type='reset' class='btn btn-info' style='margin-right: 20px;'><i class='zmdi zmdi-roller'></i> &nbsp;&nbsp; Limpiar</button>
                <button type='submit' name='ok1' class='btn btn-primary'><i class='zmdi zmdi-floppy'></i> &nbsp;&nbsp; Guardar</button>
            </p>
        </div>
    </div>
</form>

</form>