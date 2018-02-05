<?php
class Usuario extends EntidadBase {
    public function __construct($adapter) {
        parent::__construct($adapter);
    }
    public function getAll() {
        // Preparar
        $stmt = $this->db->prepare("select * from users");
        // ejecutar la consulta
        $stmt->execute();
        // ligar variables de resultado
        if( $filas = $stmt->fetchAll(PDO::FETCH_ASSOC) ) {
            $resultSet = $filas;
        }
        return $resultSet;
    }
    public function getUsuario( $userid ) {
        // Preparar
        $stmt = $this->db->prepare("select * from users where id = :userid");
        $stmt->bindParam( ':userid', $userid );
        // Asigna valores
        $userid = $userid;
        // ejecutar la consulta
        $stmt->execute();
        // ligar variables de resultado
        $resultSet = null;
        if( $resultSet = $stmt->fetch(PDO::FETCH_ASSOC) ) {
            if( $stmt->rowCount() > 0 )
            return $resultSet;
        }
        return null;
    }
}
?>
