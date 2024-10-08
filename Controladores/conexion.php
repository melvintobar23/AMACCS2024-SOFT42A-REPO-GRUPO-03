<?php
date_default_timezone_set('America/El_Salvador');


if (!defined('SERVIDOR')) define('SERVIDOR', 'localhost');
if (!defined('USUARIO')) define('USUARIO', 'root');
if (!defined('CLAVE')) define('CLAVE', '');
if (!defined('DATABASE')) define('DATABASE', 'sistemaglobal2');



class conexion {
    private $connect;
    
    public function __construct() {
        try {
            $this->connect = new mysqli(SERVIDOR, USUARIO, CLAVE, DATABASE);
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function cn() {
        return $this->connect;
    }

    public function ejecutarSQL($sql) {
        return $this->cn()->query($sql);
    }
    
    public function ejecutarSQLPreparada($sql, $types, $params) {
        $stmt = $this->cn()->prepare($sql);
        if ($stmt === false) {
            die('prepare() failed: ' . htmlspecialchars($this->cn()->error));
        }

        $stmt->bind_param($types, ...$params);
        $stmt->execute();
        return $stmt->get_result();
    }
}
