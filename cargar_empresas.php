<?php 
// Incluir la conexión a la base de datos
require_once("cn.php");

if (isset($_POST['municipio'])) {
    $municipio = $cn->real_escape_string($_POST['municipio']);
    
    $sql = "SELECT * FROM pr_empresa WHERE idmunicipio ='$municipio'";
    $result = $cn->query($sql);

    $output = '';
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $output .= '<option value="'.$row['id'].'">'.$row['nomempresa'].'</option>';
        }
    } else {
        $output .= '<option value="" disabled>No hay empresas disponibles</option>';
    }

    echo $output;
}
?>
