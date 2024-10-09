<?php 
// Incluir la conexión a la base de datos
require_once("cn.php");

if (isset($_POST['query'])) {
    $output = '';
    $query = $cn->real_escape_string($_POST['query']);
    
    $sql = "SELECT * FROM pr_municipio WHERE municipio LIKE '%$query%'";
    $result = $cn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $output .= '<div class="suggestion-item">'.$row['municipio'].'</div>';
        }
    } else {
        $output .= '<div class="suggestion-item">No se encontraron municipios</div>';
    }

    echo $output;
}
?>
