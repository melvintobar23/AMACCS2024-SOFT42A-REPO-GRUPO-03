<?php
require_once("conexion.php");

class SolicitudController extends Conexion{



    public function agregar($solicitud) {
        $sql = "INSERT INTO pr_solicitudalumno (idtiposolicitud, carnet, idempresa, idcontacto, idgrupo, actividadDesarrollar, diasservicio, horario, horasaldias, fechainicio, fechaestimadaFin) VALUES ('".$solicitud->GetIdtiposolicitud()."', '".$solicitud->GetCarnet()."', '".$solicitud->GetIdempresa()."', '".$solicitud->GetIdcontacto()."', '".$solicitud->GetIdgrupo()."', '".$solicitud->GetActividadDesarrollar()."', '".$solicitud->GetDiasservicio()."', '".$solicitud->GetHorario()."', '".$solicitud->GetHorasaldias()."', '".$solicitud->GetFechainicio()."', '".$solicitud->GetFechaestimadaFin()."')";
        $this->ejecutarSQL($sql);
    }
    

}


    ?>
