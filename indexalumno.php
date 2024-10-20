<?php 
define("URL","http://localhost/HSBUENA/");
?>
<!doctype html>
<html lang="en">
<head>
    <title>Sistema Horas Sociales</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    
    <style>
        body {
            background-color: #f8f9fa;
        }
        header {
            background-color: #007bff;
            padding: 10px 0;
        }
        header .navbar {
            margin-bottom: 0;
        }
        header .navbar-brand {
            color: #fff;
            font-size: 1.5em;
        }
        header .navbar-nav .nav-link {
            color: #fff;
            transition: color 0.3s;
        }
        header .navbar-nav .nav-link:hover {
            color: #ffdd57;
        }
        main {
            padding: 20px;
            min-height: 80vh; /* To ensure footer is at the bottom */
        }
        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
<header>
        <!-- place navbar here -->
        <?php 
        require_once("menualumno.php");
        ?>
    </header>
    
    <main>
        <?php
        if(isset($_GET["url"])){
            $info = explode("/", $_GET["url"]);
            require_once($info[0] . ".php");   
        }
        ?>
    </main>
    
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Sistema Horas Sociales. Todos los derechos reservados.</p>
    </footer>
    
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
