<?php
require_once("conexion.php");

class MunicipioController extends Conexion{



public function agregar($municipio) {
        $sql = "INSERT INTO pr_municipio (iddepto, municipio) VALUES ('".$municipio->GetIddepto()."', '".$municipio->GetMunicipio()."')";
        $this->ejecutarSQL($sql);
    }

}


    ?>


