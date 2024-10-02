<?php

class Solicitud {

    private $idsolicitudAlumno;
    private $idtiposolicitud;
    private $carnet;
    private $idempresa;
    private $idcontacto;
    private $idgrupo;
    private $actividadDesarrollar;
    private $diasservicio;
    private $horario;
    private $horasaldias;
    private $fechainicio;
    private $fechaestimadaFin;
    private $estado;
    private $horas;
    private $motivo;
    private $fechareporte;

    public function __construct($idsolicitudAlumno = "", $idtiposolicitud = "", $carnet = "", $idempresa = "", $idcontacto = "", $idgrupo = "", $actividadDesarrollar = "", $diasservicio = "", $horario = "", $horasaldias = "", $fechainicio = "", $fechaestimadaFin = "", $estado = "", $horas = "", $motivo = "", $fechareporte = "") {
        $this->idsolicitudAlumno = $idsolicitudAlumno;
        $this->idtiposolicitud = $idtiposolicitud;
        $this->carnet = $carnet;
        $this->idempresa = $idempresa;
        $this->idcontacto = $idcontacto;
        $this->idgrupo = $idgrupo;
        $this->actividadDesarrollar = $actividadDesarrollar;
        $this->diasservicio = $diasservicio;
        $this->horario = $horario;
        $this->horasaldias = $horasaldias;
        $this->fechainicio = $fechainicio;
        $this->fechaestimadaFin = $fechaestimadaFin;
        $this->estado = $estado;
        $this->horas = $horas;
        $this->motivo = $motivo;
        $this->fechareporte = $fechareporte;
    }

    public function GetIdsolicitudAlumno() {
        return $this->idsolicitudAlumno;
    }

    public function SetIdsolicitudAlumno($idsolicitudAlumno) {
        $this->idsolicitudAlumno = $idsolicitudAlumno;
    }

    public function GetIdtiposolicitud() {
        return $this->idtiposolicitud;
    }

    public function SetIdtiposolicitud($idtiposolicitud) {
        $this->idtiposolicitud = $idtiposolicitud;
    }

    public function GetCarnet() {
        return $this->carnet;
    }

    public function SetCarnet($carnet) {
        $this->carnet = $carnet;
    }

    public function GetIdempresa() {
        return $this->idempresa;
    }

    public function SetIdempresa($idempresa) {
        $this->idempresa = $idempresa;
    }

    public function GetIdcontacto() {
        return $this->idcontacto;
    }

    public function SetIdcontacto($idcontacto) {
        $this->idcontacto = $idcontacto;
    }

    public function GetIdgrupo() {
        return $this->idgrupo;
    }

    public function SetIdgrupo($idgrupo) {
        $this->idgrupo = $idgrupo;
    }

    public function GetActividadDesarrollar() {
        return $this->actividadDesarrollar;
    }

    public function SetActividadDesarrollar($actividadDesarrollar) {
        $this->actividadDesarrollar = $actividadDesarrollar;
    }

    public function GetDiasservicio() {
        return $this->diasservicio;
    }

    public function SetDiasservicio($diasservicio) {
        $this->diasservicio = $diasservicio;
    }

    public function GetHorario() {
        return $this->horario;
    }

    public function SetHorario($horario) {
        $this->horario = $horario;
    }

    public function GetHorasaldias() {
        return $this->horasaldias;
    }

    public function SetHorasaldias($horasaldias) {
        $this->horasaldias = $horasaldias;
    }

    public function GetFechainicio() {
        return $this->fechainicio;
    }

    public function SetFechainicio($fechainicio) {
        $this->fechainicio = $fechainicio;
    }

    public function GetFechaestimadaFin() {
        return $this->fechaestimadaFin;
    }

    public function SetFechaestimadaFin($fechaestimadaFin) {
        $this->fechaestimadaFin = $fechaestimadaFin;
    }

    public function GetEstado() {
        return $this->estado;
    }

    public function SetEstado($estado) {
        $this->estado = $estado;
    }

    public function GetHoras() {
        return $this->horas;
    }

    public function SetHoras($horas) {
        $this->horas = $horas;
    }

    public function GetMotivo() {
        return $this->motivo;
    }

    public function SetMotivo($motivo) {
        $this->motivo = $motivo;
    }

    public function GetFechareporte() {
        return $this->fechareporte;
    }

    public function SetFechareporte($fechareporte) {
        $this->fechareporte = $fechareporte;
    }
}

?>
