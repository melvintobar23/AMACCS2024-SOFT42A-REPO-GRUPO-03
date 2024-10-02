<!-- 
* Copyright 2016 Carlos Eduardo Alfaro Orellana
-->

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

    $alumnocontroller->actualizar($alumno);

    header('Location: http://localhost/HSBUENA/datos');

    echo "Registro Actualizado con exito";
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
                <div class="title-flat-form title-flat-blue">actualizar Datos del Alumno
                    
                </div>
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="assets/img/user04.png" alt="user" class="img-responsive center-box" style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Bienvenido al apartado de Actualizar 
                    
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


                <?php
                while ($alumno=$resultado->fetch_assoc()) {
  echo "
  <form method='post'>
  <div class='row'>
     <div class='col-xs-12 col-sm-8 col-sm-offset-2'>
          <div class='group-material'>
              <input type='text' class='material-control name='carnet' tooltips-general' value='$alumno[carnet]' required='' maxlength='50' data-toggle='tooltip' data-placement='top' title='Carnet de Alumno' readonly>
              <span class='highlight'></span>
              <span class='bar'></span>
              <label>Carnet de alumno</label>
          </div>
          <div class='group-material'>
              <input type='text' class='material-control tooltips-general'name='nombre' value='$alumno[nombre]'  maxlength='50' data-toggle='tooltip' data-placement='top' title='Escribe el Email del proveedor'>
              <span class='highlight'></span>
              <span class='bar'></span>
              <label>Nombre</label>
          </div>
          <div class='group-material'>
              <input type='text' class='material-control tooltips-general' name='apellido' value='$alumno[apellido]'  required='' maxlength='70' data-toggle='tooltip' data-placement='top' title='Escribe la dirección del proveedor'>
              <span class='highlight'></span>
              <span class='bar'></span>
              <label>apellido</label>
          </div>
          <div class='group-material'>
              <input type='text' class='material-control tooltips-general' name='telefono' value='$alumno[telefono]'  required='' pattern='[0-9]{8,8}' maxlength='8' data-toggle='tooltip' data-placement='top' title='Solo números, mínimo 8 dígitos'>
              <span class='highlight'></span>
              <span class='bar'></span>
              <label>Teléfono</label>
          </div>
          <div class='group-material'>
              <input type='email' class='material-control tooltips-general' name='email' value='$alumno[email]'  required='' maxlength='50' data-toggle='tooltip' data-placement='top' title='Responsable de atención'>
              <span class='highlight'></span>
              <span class='bar'></span>
              <label>Email</label>
          </div>
          <div class='group-material'>
          <input type='text' class='material-control tooltips-general' name='carrera' value='$alumno[carrera]'  required='' maxlength='50' data-toggle='tooltip' data-placement='top' title='Responsable de atención'>
          <span class='highlight'></span>
          <span class='bar'></span>
          <label>Carrera</label>
      </div>

                <div class='group-material'>
          <input type='text' class='material-control tooltips-general' name='yearingreso' value='$alumno[yearingreso]'  required='' maxlength='50' data-toggle='tooltip' data-placement='top' title='Responsable de atención'>
          <span class='highlight'></span>
          <span class='bar'></span>
          <label>Año de Ingreso</label>
      </div>
      <div class='group-material'>
      <input type='text' class='material-control tooltips-general' name='grupo' value='$alumno[grupo]'  required='' maxlength='50' data-toggle='tooltip' data-placement='top' title='Responsable de atención'>
      <span class='highlight'></span>
      <span class='bar'></span>
      <label>Grupo</label>
  </div>
          <p class='text-center'>
              <button type='reset' class='btn btn-info' style='margin-right: 20px;'><i class='zmdi zmdi-roller'></i> &nbsp;&nbsp; Limpiar</button>
              <button  type='submit' name='ok1' class='btn btn-primary'><i class='zmdi zmdi-floppy'></i> &nbsp;&nbsp; Guardar</button>
          </p> 
     </div>
 </div>
</form>
  ";

} 
?>
