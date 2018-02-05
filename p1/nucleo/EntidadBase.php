<?php
class EntidadBase { protected $db; protected $conectar;
    public function __construct($adapter) {
        $this->conectar = null;
        $this->db = $adapter;
    }
    public function getConectar(){
        return $this->conectar;
    }
    public function db() {
        return $this->db;
    }
}
?>
