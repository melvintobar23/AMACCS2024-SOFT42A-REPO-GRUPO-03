<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITCA-FEPADE</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .container {
            margin-top: 50px;
            margin-left: 800px !important;
        }
        .container img {
            width: 150px;
            height: 150px;
            border:1px;
        }
        .link {
            display: inline-block;
            margin: 20px;
            text-align: center;
        }
        .link img {
            display: block;
            margin: 0 auto;
        }
        .footer {
            margin-top: 100px;
            font-weight: bold;
        }
    </style>
</head>
<body>


<?php 

require_once("bootstrap.php");

?>


<div class="p-2 text-dark bg-danger">
  <img style="width: 200px; height: 50px;" src="imagenes/logo_nuevo.png" alt="">
  <strong style="text-align: center !important;">EN INGENIERÍA ITCA FEPADE</strong>
</div>






    <div class="container">
        <h1>     ITCA-FEPADE</h1>
        <div class="links">
            <div class="link">
                <a href="login.php" >
                    <img src="imagenes/alumno.png" alt="Alumno">
                </a>
            </div>
            <div class="link">
                <a href="#" >
                    <img src="imagenes/maestro.png" alt="Administrador">
                </a>
            </div>
        </div>
    </div>
</body>
</html>
