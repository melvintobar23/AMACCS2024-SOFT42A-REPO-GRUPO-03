<?php 

session_start();

require_once("bootstrap.php");

require_once("Controladores/alumno_controller.php");
require_once("Modelos/alumno.php");

$alumnocontroller = new AlumnoController();
$alumno = new Alumno();

if (isset($_POST['ok1'])) {

  $carnet=$_POST["carnet"];

  $_SESSION["carnet"] =$carnet;



  $alumno->setCarnet($_POST["carnet"]);
  $alumno->setClave($_POST["clave"]);

  $alumnocontroller->listar();

foreach($alumnocontroller->listar() as $alumno){
  if($alumno->GetCarnet() == $_POST["carnet"] and $alumno->GetClave()==$_POST["clave"]){

    header('Location: http://localhost/HSBUENA/indexalumno.php');
  }

}

if($alumno->GetCarnet() !== $_POST["carnet"]){

echo "Carnet no Registrado";

}

if($alumno->GetClave() !== $_POST["clave"]){

  echo "Contraseña Incorrecta";
  
  }






}

?>



<!-- if (isset($_POST['ok1'])) {
  $carnet=$_POST["carnet"];
  $clave=$_POST["clave"];

  $sql=" SELECT * FROM alumno WHERE carnet = '".$carnet."' and clave = '".$clave."' ";
  $rs=$cn->query($sql);

  if($rs->num_rows > 0){

    header('Location: http://localhost/HSBUENA/indexalumno.php');

  }
  if($rs->num_rows == 0){
    echo "Usuario no encontrado";
  }

} -->







<section class="background-radial-gradient overflow-hidden">
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

    #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
  </style>

  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          Bienvenido al Registro de Horas Sociales <br />
          <span style="color: hsl(218, 81%, 75%)">For ITCA Fepade Santa Ana</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
Favor de ingresar sus credenciales para acceder al sistema, en dado sea su primera vez, favor de registrarse, dando click en <a href="registro.php">Registrarse</a>,
Toma en cuenta que la contraseña por defecto es <b>itca</b>.
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
            <form method="post">
              <!-- 2 column grid layout with text inputs for the first and last names -->

              <!-- Email input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" id="form3Example3" name="carnet"class="form-control" />
                <label class="form-label" for="form3Example3">Carnet</label>
              </div>

              <!-- Password input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" id="form3Example4" name="clave" class="form-control" />
                <label class="form-label" for="form3Example4">Contraseña</label>
              </div>

              <!-- Checkbox -->
              <!-- Submit button -->
              <button type="submit" name="ok1"data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">
                Entrar
              </button>

              <!-- Register buttons -->
              <div class="text-center">
                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-facebook-f"></i>
                </button>

                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-google"></i>
                </button>

                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-twitter"></i>
                </button>

                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-github"></i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->