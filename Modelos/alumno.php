<?php 

class Alumno{

    private $idalumno;
    private $carnet;
    private $clave;
    private $nombre;
    private $apellido;
    private $telefono;
    private $jornada;
    private $grupo;
    private $sexo;
    private $foto;
    private $email;
    private $estadoAlumno;
    private $yearingreso;
    private $carrera;
    private $fotoal;
    private $carta;
    private $horas_sociales;

    public function __construct($id="", $carnet="",$clave="", $nombre="", $apellido="", $telefono="", $grupo="", $sexo="", $email="", $yearingreso="", $carrera="",$horas_sociales=""){
        $this->idalumno = $id;
        $this->carnet = $carnet;
        $this->clave=$clave;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono = $telefono;
        $this->grupo = $grupo;
        $this->sexo = $sexo;
        $this->email = $email;
        $this->yearingreso = $yearingreso;
        $this->carrera = $carrera;
    }

    public function GetIdalumno(){
        return $this->idalumno;
    }

    public function SetIdalumno($id){
        $this->idalumno = $id;
    }

    public function GetCarnet(){
        return $this->carnet;
    }

    public function SetCarnet($carnet){
        $this->carnet = $carnet;
    }


    public function GetClave(){
        return $this->clave;
    }

    public function SetClave($clave){
        $this->clave = $clave;
    }

    

    public function GetNombre(){
        return $this->nombre;
    }

    public function SetNombre($nombre){
        $this->nombre = $nombre;
    }

    public function GetApellido(){
        return $this->apellido;
    }

    public function SetApellido($apellido){
        $this->apellido = $apellido;
    }

    public function GetTelefono(){
        return $this->telefono;
    }

    public function SetTelefono($telefono){
        $this->telefono = $telefono;
    }

    public function GetGrupo(){
        return $this->grupo;
    }

    public function SetGrupo($grupo){
        $this->grupo = $grupo;
    }

    public function GetSexo(){
        return $this->sexo;
    }

    public function SetSexo($sexo){
        $this->sexo = $sexo;
    }

    public function GetEmail(){
        return $this->email;
    }

    public function SetEmail($email){
        $this->email = $email;
    }

    public function GetYearIngreso(){
        return $this->yearingreso;
    }

    

    public function SetYearIngreso($yearingreso){
        $this->yearingreso = $yearingreso;
    }

    public function GetCarrera(){
        return $this->carrera;
    }

    public function SetCarrera($carrera){
        $this->carrera = $carrera;
    }
    
    public function setHorasSociales($horas) {
            $this->horas_sociales = $horas;
        }
    
    public function getHorasSociales() {
            return $this->horas_sociales;
                }
    
    
}

?>
