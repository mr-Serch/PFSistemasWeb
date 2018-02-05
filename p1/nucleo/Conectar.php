<?php
class Conectar { private $driver;
    private $host, $user, $pass, $database, $charset;
    public function __construct() {
        // Regresa un arreglo
        $db_cfg = require_once 'config/Database.php';
        $this->driver = $db_cfg["driver"];
        $this->host = $db_cfg["host"];
        $this->user = $db_cfg["user"];
        $this->pass = $db_cfg["pass"];
        $this->database = $db_cfg["database"];
        $this->charset = $db_cfg["charset"];
        //print_r($db_cfg);
    }

    public function conexion() {
        $con = new \PDO("{$this->driver}:dbname={$this->database};host={$this->host};charset={$this->charset}", $this->user, $this->pass);
        return $con;
    }
}
?>
