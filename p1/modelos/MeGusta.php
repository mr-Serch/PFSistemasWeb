<?php
class MeGusta extends EntidadBase {private $id;private $imagenid; private $userid; private $fecha;
    public function __construct($adapter) {
        parent::__construct($adapter);
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function setImagenId($imagenid) {
        $this->imagenid = $imagenid;
    }
    public function setUserId($userid) {
        $this->userid = $userid;
    }
    public function IsMeGusta( $userid, $imagenid ) {
        // Preparar
        $stmt = $this->db->prepare("select * from megusta where imagenid = :imagenid and userid= :userid");
        $stmt->bindParam( ':imagenid', $imagenid );
        $stmt->bindParam( ':userid', $userid );
        // Asigna valores
        $imagenid = $imagenid;
        $userid = $userid;
        // ejecutar la consulta
        $stmt->execute();
        // ligar variables de resultado
        if( $fila = $stmt->fetch(PDO::FETCH_ASSOC) ) {
            return $stmt->rowCount() > 0 ? true : false;
        }
        return false;
    }

    public function Cuenta( $imagenid ) {
        // Preparar
        $stmt = $this->db->prepare("select * from megusta where imagenid = :imagenid");
        $stmt->bindParam( ':imagenid', $imagenid );
        // Asigna valores
        $imagenid = $imagenid;
        // ejecutar la consulta
        $stmt->execute();
        // ligar variables de resultado
        if( $resultSet = $stmt->fetch(PDO::FETCH_ASSOC) ) {
            return $stmt->rowCount();
        }
        return 0;
    }

    public function add() {
        // Preparar
        $stmt = $this->db->prepare("insert into megusta (id, imagenid, userid, fecha) VALUES (:id, :imagenid, :userid, now())");
        $stmt->bindParam( ':id', $id );
        $stmt->bindParam( ':imagenid', $imagenid );
        $stmt->bindParam( ':userid', $userid );
        // Asigna valores
        $id = $this->id;
        $imagenid = $this->imagenid;
        $userid = $this->userid;
        return $stmt->execute();
        //$arr = $stmt->errorInfo();
        //print_r($arr);
        //exit; 
    }

    public function delete() {
        // Preparar
        $stmt = $this->db->prepare("delete from megusta where imagenid = :imagenid and userid= :userid");
        $stmt->bindParam( ':imagenid', $imagenid );
        $stmt->bindParam( ':userid', $userid );
        // Asigna valores
        $imagenid = $this->imagenid;
        $userid = $this->userid;
        return $stmt->execute();
    }
}
?>
