<?php
require_once("conexion.php");

class ContactoController extends Conexion {

    public function agregar($contacto){
        $sql = "INSERT INTO pr_contacto (titulouni, nombre, apellido, email, idcargo, idmunicipio, idempresa, sexo, telefono) VALUES ('".$contacto->GetTitulouni()."', '".$contacto->GetNombre()."', '".$contacto->GetApellido()."', '".$contacto->GetEmail()."', '".$contacto->GetIdcargo()."', '".$contacto->GetIdmunicipio()."', '".$contacto->GetIdempresa()."','".$contacto->GetSexo()."','".$contacto->GetTelefono()."')";
        $this->ejecutarSQL($sql);
    }
    




}