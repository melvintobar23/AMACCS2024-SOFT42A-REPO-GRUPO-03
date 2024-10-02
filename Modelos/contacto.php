<?php

class Contacto {

    private $idcontacto;
    private $titulouni;
    private $nombre;
    private $apellido;
    private $email;
    private $idcargo;
    private $idmunicipio;
    private $idempresa;
    private $idadd;
    private $sexo;
    private $estado;
    private $necesita;
    private $telefono;

    public function __construct($idcontacto = "", $titulouni = "", $nombre = "", $apellido = "", $email = "", $idcargo = "", $idmunicipio = "", $idempresa = "", $idadd = "", $sexo = "", $estado = "", $necesita = "", $telefono = "") {
        $this->idcontacto = $idcontacto;
        $this->titulouni = $titulouni;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->idcargo = $idcargo;
        $this->idmunicipio = $idmunicipio;
        $this->idempresa = $idempresa;
        $this->idadd = $idadd;
        $this->sexo = $sexo;
        $this->estado = $estado;
        $this->necesita = $necesita;
        $this->telefono = $telefono;
    }

    public function GetIdcontacto() {
        return $this->idcontacto;
    }

    public function SetIdcontacto($idcontacto) {
        $this->idcontacto = $idcontacto;
    }

    public function GetTitulouni() {
        return $this->titulouni;
    }

    public function SetTitulouni($titulouni) {
        $this->titulouni = $titulouni;
    }

    public function GetNombre() {
        return $this->nombre;
    }

    public function SetNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function GetApellido() {
        return $this->apellido;
    }

    public function SetApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function GetEmail() {
        return $this->email;
    }

    public function SetEmail($email) {
        $this->email = $email;
    }

    public function GetIdcargo() {
        return $this->idcargo;
    }

    public function SetIdcargo($idcargo) {
        $this->idcargo = $idcargo;
    }

    public function GetIdmunicipio() {
        return $this->idmunicipio;
    }

    public function SetIdmunicipio($idmunicipio) {
        $this->idmunicipio = $idmunicipio;
    }

    public function GetIdempresa() {
        return $this->idempresa;
    }

    public function SetIdempresa($idempresa) {
        $this->idempresa = $idempresa;
    }

    public function GetIdadd() {
        return $this->idadd;
    }

    public function SetIdadd($idadd) {
        $this->idadd = $idadd;
    }

    public function GetSexo() {
        return $this->sexo;
    }

    public function SetSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function GetEstado() {
        return $this->estado;
    }

    public function SetEstado($estado) {
        $this->estado = $estado;
    }

    public function GetNecesita() {
        return $this->necesita;
    }

    public function SetNecesita($necesita) {
        $this->necesita = $necesita;
    }

    public function GetTelefono() {
        return $this->telefono;
    }

    public function SetTelefono($telefono) {
        $this->telefono = $telefono;
    }
}

?>

