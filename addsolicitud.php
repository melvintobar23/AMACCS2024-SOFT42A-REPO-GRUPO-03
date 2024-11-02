

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Formulario con Bootstrap</title>
</head>
<body>
    <div class="container" style="margin-top: 50px;">
        <h2 class="text-center">Formulario de Solicitud</h2>
        <form method="post" enctype="multipart/form-data">
            <!-- Tipo de Solicitud -->
            <div class="form-group">
                <label for="tiposolicitud">Tipo de Solicitud</label>
                <select class="form-control" id="tiposolicitud" name="tiposolicitud" required>
                    <option value="" disabled selected>Seleccione tipo de solicitud</option>
                    <option value="Practicas Profesionales">Prácticas Profesionales</option>
                    <option value="Horas Sociales">Horas Sociales</option>
                </select>
            </div>

            <!-- Carnet -->
            <div class="form-group">
                <label for="carnet">Carnet</label>
                <input type="text" class="form-control" id="carnet" name="carnet" placeholder="Introduce tu carnet" required>
            </div>

            <!-- Empresa -->
            <div class="form-group">
                <label for="idempresa">Empresa</label>
                <select class="form-control" id="idempresa" name="idempresa" required>
                    <option value="" disabled selected>Seleccione la empresa</option>
                    <!-- Aquí irán las opciones generadas dinámicamente -->
                </select>
            </div>

            <!-- Subir Archivo -->
            <div class="form-group">
                <label for="customFile">Subir Archivo</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="archivo">
                    <label class="custom-file-label" for="customFile">Selecciona el archivo</label>
                </div>
            </div>

            <!-- Botones -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Enviar Solicitud</button>
                <button type="reset" class="btn btn-secondary">Limpiar Formulario</button>
            </div>
        </form>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Para mostrar el nombre del archivo seleccionado
        $('.custom-file-input').on('change', function() {
            var fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass('selected').html(fileName);
        });
    </script>
</body>
</html>
