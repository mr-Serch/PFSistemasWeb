<?php
class Comentario extends EntidadBase { private $id; private $userid; private $imagenid; private $titulo; private $cuerpo; private $fecha;

    public function __construct($adapter) {
        parent::__construct($adapter);
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function setUserId($userid) {
        $this->userid = $userid;
    }
    public function setImagenId($imagenid) {
        $this->imagenid = $imagenid;
    }
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
    public function setCuerpo($cuerpo) {
        $this->cuerpo = $cuerpo;
    }
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }
    public function getAll( $imagenid ) {
        // Preparar
        $stmt = $this->db->prepare("select comentarios.*, users.email, users.username from comentarios inner join users on comentarios.userid = users.id where comentarios.imagenid = :imagenid order by comentarios.id desc");
        $stmt->bindParam( ':imagenid', $imagenid );
        // Asigna valores
        $imagenid = $imagenid;
        // ejecutar la consulta
        $stmt->execute();
        // ligar variables de resultado
        $resultSet = null;
        if( $filas = $stmt->fetchAll(PDO::FETCH_ASSOC) ) {
            $resultSet = $filas;
        }
        return $resultSet;
    }

    public function Cuenta( $imagenid ) {
        // Preparar
        $stmt = $this->db->prepare("select * from comentarios where imagenid =:imagenid");
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
        $stmt = $this->db->prepare("insert into comentarios (id, userid, imagenid, titulo, cuerpo, fecha) VALUES (:id, :userid, :imagenid, :titulo, :cuerpo, now())");
        $stmt->bindParam( ':id', $id );
        $stmt->bindParam( ':userid', $userid );
        $stmt->bindParam( ':imagenid', $imagenid );
        $stmt->bindParam( ':titulo', $titulo );
        $stmt->bindParam( ':cuerpo', $cuerpo );
        // Asigna valores
        $id = null; 
        $userid = $this->userid;
        $imagenid = $this->imagenid;
        $titulo = $this->titulo;
        $cuerpo = $this->cuerpo;
        if(!$stmt->execute()){
           // return false;
            http_response_code( 400 );
            print_r($stmt->errorInfo());
            exit( 'La operación no pudo ser realizada.' );
            

        }
        return true;
    }
}
?>
