<?php   

class Depto {

    private $iddepto;
    private $depto;
    private $estadoDepto;

    public function __construct($iddepto = "", $depto = "", $estadoDepto = "") {
        $this->iddepto = $iddepto;
        $this->depto = $depto;
        $this->estadoDepto = $estadoDepto;
    }

    public function GetIddepto() {
        return $this->iddepto;
    }

    public function SetIddepto($iddepto) {
        $this->iddepto = $iddepto;
    }

    public function GetDepto() {
        return $this->depto;
    }

    public function SetDepto($depto) {
        $this->depto = $depto;
    }

    public function GetEstadoDepto() {
        return $this->estadoDepto;
    }

    public function SetEstadoDepto($estadoDepto) {
        $this->estadoDepto = $estadoDepto;
    }
}

?>
