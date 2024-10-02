<?php

class Municipio {

    private $idmunicipio;
    private $iddepto;
    private $municipio;

    // Constructor
    public function __construct($idmunicipio = "", $iddepto = "", $municipio = "") {
        $this->idmunicipio = $idmunicipio;
        $this->iddepto = $iddepto;
        $this->municipio = $municipio;
    }

    // Getter and Setter for idmunicipio
    public function GetIdmunicipio() {
        return $this->idmunicipio;
    }

    public function SetIdmunicipio($idmunicipio) {
        $this->idmunicipio = $idmunicipio;
    }

    // Getter and Setter for iddepto
    public function GetIddepto() {
        return $this->iddepto;
    }

    public function SetIddepto($iddepto) {
        $this->iddepto = $iddepto;
    }

    // Getter and Setter for municipio
    public function GetMunicipio() {
        return $this->municipio;
    }

    public function SetMunicipio($municipio) {
        $this->municipio = $municipio;
    }
}

?>
