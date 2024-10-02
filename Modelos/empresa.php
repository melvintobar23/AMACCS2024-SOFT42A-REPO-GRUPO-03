<?php

class Empresa {

    private $idempresa;
    private $nomempresa;
    private $telefono;
    private $dirempresa;
    private $idmunicipio;
    private $idadd;
    private $estadoe;
    private $fechaadd;

    public function __construct($idempresa = "", $nomempresa = "", $telefono = "", $dirempresa = "", $idmunicipio = "", $idadd = "", $estadoe = "", $fechaadd = "") {
        $this->idempresa = $idempresa;
        $this->nomempresa = $nomempresa;
        $this->telefono = $telefono;
        $this->dirempresa = $dirempresa;
        $this->idmunicipio = $idmunicipio;
        $this->idadd = $idadd;
        $this->estadoe = $estadoe;
        $this->fechaadd = $fechaadd;
    }

    public function GetIdempresa() {
        return $this->idempresa;
    }

    public function SetIdempresa($idempresa) {
        $this->idempresa = $idempresa;
    }

    public function GetNomempresa() {
        return $this->nomempresa;
    }

    public function SetNomempresa($nomempresa) {
        $this->nomempresa = $nomempresa;
    }

    public function GetTelefono() {
        return $this->telefono;
    }

    public function SetTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function GetDirempresa() {
        return $this->dirempresa;
    }

    public function SetDirempresa($dirempresa) {
        $this->dirempresa = $dirempresa;
    }

    public function GetIdmunicipio() {
        return $this->idmunicipio;
    }

    public function SetIdmunicipio($idmunicipio) {
        $this->idmunicipio = $idmunicipio;
    }

    public function GetIdadd() {
        return $this->idadd;
    }

    public function SetIdadd($idadd) {
        $this->idadd = $idadd;
    }

    public function GetEstadoe() {
        return $this->estadoe;
    }

    public function SetEstadoe($estadoe) {
        $this->estadoe = $estadoe;
    }

    public function GetFechaadd() {
        return $this->fechaadd;
    }

    public function SetFechaadd($fechaadd) {
        $this->fechaadd = $fechaadd;
    }
}

?>
