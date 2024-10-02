<?php
require_once("conexion.php");

class AlumnoController extends Conexion {

    

    public function agregar($alumno){
        $sql = "INSERT INTO alumno (carnet, nombre, apellido, telefono, grupo, sexo, email, yearingreso, carrera) VALUES ('".$alumno->GetCarnet()."', '".$alumno->GetNombre()."', '".$alumno->GetApellido()."', '".$alumno->GetTelefono()."', '".$alumno->GetGrupo()."', '".$alumno->GetSexo()."', '".$alumno->GetEmail()."', '".$alumno->GetYearIngreso()."', '".$alumno->GetCarrera()."')";
        $this->ejecutarSQL($sql);
    }

    public function actualizar($alumno){
        $sql = "UPDATE alumno SET 
                    nombre = '".$alumno->GetNombre()."', 
                    apellido = '".$alumno->GetApellido()."', 
                    telefono = '".$alumno->GetTelefono()."', 
                    grupo = '".$alumno->GetGrupo()."', 
                    sexo = '".$alumno->GetSexo()."', 
                    email = '".$alumno->GetEmail()."', 
                    yearingreso = '".$alumno->GetYearIngreso()."', 
                    carrera = '".$alumno->GetCarrera()."' 
                WHERE carnet = '".$alumno->GetCarnet()."'";
        $this->ejecutarSQL($sql);
    }
    
    

    public function listar(){
        $sql = "SELECT * FROM alumno";
        $rs = $this->ejecutarSQL($sql);
        $resultado = array();
        while ($fila = $rs->fetch_assoc()) {
            $alumno = new Alumno($fila["idalumno"], $fila["carnet"],$fila["clave"], $fila["nombre"], $fila["apellido"], $fila["telefono"], $fila["grupo"], $fila["sexo"], $fila["email"], $fila["yearingreso"], $fila["carrera"]);
            $resultado[] = $alumno;
        }
        return $resultado;
    }


    public function listarporcarnet($carnet) {
        $sql = "SELECT * FROM alumno WHERE carnet = ?";
        $result = $this->conexion->ejecutarSQLPreparada($sql, 's', [$carnet]);
        
        $resultado = array();
        while ($fila = $result->fetch_assoc()) {
            $alumno = new Alumno(
                $fila["idalumno"], 
                $fila["carnet"], 
                $fila["nombre"], 
                $fila["apellido"], 
                $fila["telefono"], 
                $fila["grupo"], 
                $fila["sexo"], 
                $fila["email"], 
                $fila["anioingreso"], 
                $fila["carrera"]
            );
            $resultado[] = $alumno;
        }
        
        return $resultado;
    }
}
?>
