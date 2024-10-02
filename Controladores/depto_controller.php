<?php
require_once("conexion.php");

class DeptoController extends Conexion{



public function agregar($depto) {
        $sql = "INSERT INTO pr_depto (depto) VALUES ('".$depto->GetDepto()."')";
        $this->ejecutarSQL($sql);
    }

}


    ?>
