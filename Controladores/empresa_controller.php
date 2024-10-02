<?php

require_once("conexion.php");

class EmpresaController extends Conexion{

    
public function agregar($empresa) {
    $sql = "INSERT INTO pr_empresa (nomempresa, telefono, dirempresa, idmunicipio) VALUES ('".$empresa->GetNomempresa()."', '".$empresa->GetTelefono()."', '".$empresa->GetDirempresa()."', '".$empresa->GetIdmunicipio()."')";
    $this->ejecutarSQL($sql);
}

}


?>