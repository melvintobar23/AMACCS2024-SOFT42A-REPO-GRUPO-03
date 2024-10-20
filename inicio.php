<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITCA-FEPADE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
        }
        .header {
            background-color: #dc3545; /* Color de fondo rojo */
            color: white;
            padding: 20px;
            text-align: center;
        }
        .container {
            margin-top: 50px;
        }
        .link {
            text-align: center;
            margin: 20px;
        }
        .link img {
            margin-top: 50px;
            width: 150px;
            height: 150px;
            transition: transform 0.3s; 
        }
        .link img:hover {
            transform: scale(1.1);
        }
        .footer {
            margin-top: 100px;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>

<?php 
require_once("bootstrap.php");
?>

<div class="header">
    <img style="width: 200px; height: auto;" src="imagenes/logo_nuevo.png" alt="Logo">
    <h2>EN INGENIERÍA ITCA FEPADE</h2>
</div>

<div class="container">
    <center>
    <h1 class="mb-4">Ingreso de Horas Sociales ITCA-FEPADE</h1>
    </center>
    <div class="row justify-content-center">
        <div class="col-md-4 link">
            <a href="login.php">
                <img src="imagenes/alumno.png" alt="Alumno" class="img-fluid">
                <p><strong>Ingreso Alumno</strong></p>
            </a>
        </div>
        <div class="col-md-4 link">
            <a href="#">
                <img src="imagenes/maestro.png" alt="Administrador" class="img-fluid">
                <p><strong>Ingreso Administrador</strong></p>
            </a>
        </div>
    </div>
</div>

<div class="footer">
    <p>© 2024 ITCA-FEPADE. Todos los derechos reservados.</p>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
