<?php
class Seguir extends EntidadBase { private $id; private $seguidorid; private $seguidoid; private $fecha;
   
    public function __construct($adapter) {
        parent::__construct($adapter);
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function setSeguidorId($seguidorid) {
        $this->seguidorid = $seguidorid;
    }
    public function setSeguidoId($seguidoid) {
        $this->seguidoid = $seguidoid;
    }
    public function getSuscripciones( $seguidorid ) {
        // Preparar
        $stmt = $this->db->prepare("select users.*, seguir.fecha from seguir inner join users on seguir.seguidoid = users.id where seguidorid =:seguidorid order by id desc");
        $stmt->bindParam( ':seguidorid', $seguidorid );
        // Asigna valores
        $seguidorid = $seguidorid;
        // ejecutar la consulta
        $stmt->execute();
        // ligar variables de resultado
        $resultSet = null;
        if( $filas = $stmt->fetchAll(PDO::FETCH_ASSOC) ) {
            $resultSet = $filas;
        }
        return $resultSet;
    }
    public function getSeguidores( $seguidoid ) {
        // Preparar
        $stmt = $this->db->prepare("select users.*, seguir.fecha from seguir inner join users on seguir.seguidorid = users.id where seguidoid =:seguidoid order by id desc");
        $stmt->bindParam( ':seguidoid', $seguidoid );
        // Asigna valores
        $seguidoid = $seguidoid;
        // ejecutar la consulta
        $stmt->execute();
        // ligar variables de resultado
        $resultSet = null;
        if( $filas = $stmt->fetchAll(PDO::FETCH_ASSOC) ) {
            $resultSet = $filas;
        }
        return $resultSet;
    }

    public function IsSeguir( $seguidorid, $seguidoid ) {
        // Preparar
        $stmt = $this->db->prepare("select * from seguir where seguidorid = :seguidorid and seguidoid= :seguidoid");
        $stmt->bindParam( ':seguidorid', $seguidorid );
        $stmt->bindParam( ':seguidoid', $seguidoid ); 
        // Asigna valores
        $seguidorid = $seguidorid;
        $seguidoid = $seguidoid;
        // ejecutar la consulta
        $stmt->execute();
        // ligar variables de resultado
        if( $fila = $stmt->fetch(PDO::FETCH_ASSOC) ) {
            return $stmt->rowCount() > 0 ? true : false;
        }
        return false;
    }
    public function add() {
        // Preparar
        $stmt = $this->db->prepare("insert into seguir (id, seguidorid, seguidoid, fecha) VALUES (:id, :seguidorid, :seguidoid, now())");
    $stmt->bindParam( ':id', $id );
    $stmt->bindParam( ':seguidorid', $seguidorid );
    $stmt->bindParam( ':seguidoid', $seguidoid );
    // Asigna valores
    $id = $this->id;
    $seguidorid = $this->seguidorid;
    $seguidoid = $this->seguidoid; return $stmt->execute(); 
   }
    public function delete() {
        // Preparar
        $stmt = $this->db->prepare("delete from seguir where seguidorid = :seguidorid and seguidoid= :seguidoid");
        $stmt->bindParam( ':seguidorid', $seguidorid );
        $stmt->bindParam( ':seguidoid', $seguidoid );
        // Asigna valores
        $seguidorid = $this->seguidorid;
        $seguidoid = $this->seguidoid;
        return $stmt->execute();
    }
}
?>
