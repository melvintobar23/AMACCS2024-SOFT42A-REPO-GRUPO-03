<?php 

session_start();

require_once("bootstrap.php");
require_once("Controladores/alumno_controller.php");
require_once("Modelos/alumno.php");

$alumnocontroller = new AlumnoController();
$alumno = new Alumno();

$error_message = ""; // Variable para almacenar mensajes de error

if (isset($_POST['ok1'])) {

    $carnet = $_POST["carnet"];
    $_SESSION["carnet"] = $carnet;

    $alumno->setCarnet($carnet);
    $alumno->setClave($_POST["clave"]);

    $alumnocontroller->listar();

    $found = false; // Para verificar si el alumno fue encontrado

    foreach ($alumnocontroller->listar() as $alumno) {
        if ($alumno->GetCarnet() == $carnet && $alumno->GetClave() == $_POST["clave"]) {
            header('Location: http://localhost/HSBUENA/indexalumno.php');
            $found = true;
            exit(); // Salir después de redirigir
        }
    }

    if (!$found) {
        if ($alumno->GetCarnet() !== $carnet) {
            $error_message = "Carnet no registrado.";
        } elseif ($alumno->GetClave() !== $_POST["clave"]) {
            $error_message = "Contraseña incorrecta.";
        } else {
            $error_message = "Credenciales incorrectas.";
        }
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
<section class="background-gradient overflow-hidden">
  <style>
    .background-gradient {
      background-color: hsl(210, 36%, 16%);
      background-image: radial-gradient(650px circle at 0% 0%,
          hsl(210, 36%, 40%) 15%,
          hsl(210, 36%, 30%) 35%,
          hsl(210, 36%, 20%) 75%,
          hsl(210, 36%, 15%) 100%),
        radial-gradient(1250px circle at 100% 100%,
          hsl(210, 36%, 40%) 15%,
          hsl(210, 36%, 30%) 35%,
          hsl(210, 36%, 20%) 75%,
          hsl(210, 36%, 15%) 100%);
    }

    #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(#007bff, #6610f2);
      overflow: hidden;
    }

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#007bff, #6610f2);
      overflow: hidden;
    }

    .bg-glass {
      background-color: rgba(255, 255, 255, 0.85) !important;
      backdrop-filter: blur(20px);
    }

    .login-container {
      max-width: 400px;
      margin: auto;
      padding: 40px;
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
      animation: fadeIn 1s ease-in-out;
    }

    /* Animación para el fadeIn */
    @keyframes fadeIn {
      0% {
        opacity: 0;
        transform: translateY(-30px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Animación para los inputs */
    .animate-input {
      animation: slideIn 0.8s ease-out;
    }

    @keyframes slideIn {
      0% {
        transform: translateX(-100px);
        opacity: 0;
      }
      100% {
        transform: translateX(0);
        opacity: 1;
      }
    }

    /* Botones */
    button {
      background-color: #007bff;
      border-color: #007bff;
      animation: buttonPop 1.2s ease-in-out;
      transition: background-color 0.3s ease;
      color: #fff;
    }

    button:hover {
      background-color: #0056b3;
      transform: scale(1.05);
    }

    /* Sombra y ajuste para las tarjetas */
    .card {
      border: none;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
    }

    /* Cambios en el texto */
    h1 {
      color: #ffffff;
    }

    p {
      color: #cccccc;
    }

    /* Ajuste del tamaño del texto en móviles */
    @media (max-width: 768px) {
      h1 {
        font-size: 1.5rem;
      }
    }
  </style>

  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight">
          Bienvenido al Registro de Horas Sociales <br />
          <span style="color: hsl(218, 81%, 75%)">For ITCA-FEPADE Santa Ana</span>
        </h1>
        <p class="mb-4 opacity-70">
          Favor de ingresar sus credenciales para acceder al sistema, en caso de ser su primera vez, regístrese dando clic en <a href="registro.php">Registrarse</a>. La contraseña por defecto es <b>itca</b>.
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
            <form method="post">
              <div class="login-container">
                <div data-mdb-input-init class="form-outline mb-4 animate-input">
                  <input type="text" id="carnet" name="carnet" class="form-control" Required/>
                  <label class="form-label" for="carnet">Carnet</label>
                </div>

                <div data-mdb-input-init class="form-outline mb-4 animate-input">
                  <input type="password" id="form3Example4" name="clave" class="form-control" />
                  <label class="form-label" for="form3Example4">Contraseña</label>
                </div> 
                <?php if ($error_message): ?>
    <div class="alert alert-danger" role="alert" id="alert-message">
        <?php echo $error_message; ?>
    </div>
    <script>
        function hideAlert() {
            var alert = document.getElementById('alert-message');
            if (alert) {
                alert.style.display = 'none';
            }
        }

        var inputs = document.querySelectorAll('input');
        inputs.forEach(function(input) {
            input.addEventListener('click', hideAlert);
        });
    </script>
<?php endif; ?>



                <button type="submit" name="ok1" class="btn btn-primary btn-block mb-4">
                  Entrar
                </button>
              </div>

              <div class="text-center">
                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-facebook-f"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-google"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-twitter"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
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
<script>
        document.getElementById('carnet').addEventListener('input', function (e) {
    this.value = this.value.replace(/\D/g, ''); // Elimina todo lo que no sea un número
});
  </script>