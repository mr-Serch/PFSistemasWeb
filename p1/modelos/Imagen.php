<?php
class Imagen extends EntidadBase { private $id; private $userid; private $nombre; private $titulo; private $resumen; private $palabrasclave; private $direccion; private $size; private $latitud; private $longitud;
    public function __construct($adapter) {
        parent::__construct($adapter);
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function setUserId($userid) {
        $this->userid = $userid;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setTitulo($titulo1) {
        $this->titulo = $titulo1;
    }
    public function setResumen($resumen) {
        $this->resumen = $resumen; 
    }
    public function setPalabrasClave($palabrasclave) {
        $this->palabrasclave = $palabrasclave;
    }
    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
    public function setSize($size) {
        $this->size = $size;
    }
    public function setLatitud($latitud) {
        $this->latitud = $latitud;
    }
    public function setLongitud($longitud) {
        $this->longitud = $longitud;
    }
    public function getAll( $limit = '' ) {
        $sql = "select imagenes.*, users.email, users.username from imagenes inner join users on imagenes.userid = users.id order by imagenes.id desc";
        if( !empty( $sql ) )
            $sql .= $limit;
        // Preparar
        if($this->db !=null ){
            $stmt = $this->db->prepare( $sql );
            $stmt->execute();
            // ligar variables de resultado
            $resultSet = null;
            if( $filas = $stmt->fetchAll(PDO::FETCH_ASSOC) ) {
                $resultSet = $filas;
            }
            return $resultSet;
        }
        return null;
    }

    public function getPopularesAll( $limit = '' ) {
        $sql = "select (select count(*) from megusta where imagenes.id = imagenid) as megusta, imagenes.*, users.email, users.username from imagenes inner join users on imagenes.userid = users.id order by megusta desc";
        if( !empty( $sql ) )
            $sql .= $limit;
        // Preparar
        $stmt = $this->db->prepare( $sql );
        $stmt->execute();
        // ligar variables de resultado
        $resultSet = null;
        if( $filas = $stmt->fetchAll(PDO::FETCH_ASSOC) ) {
            $resultSet = $filas;
        }
        return $resultSet;
    }

    public function getBusqueda( $buscar ) {
        // Preparar
        $stmt = $this->db->prepare( "select imagenes.*, users.email, users.username from imagenes inner join users on imagenes.userid = users.id where imagenes.titulo like :buscar or imagenes.resumen like :buscar or imagenes.palabrasclave like :buscar or users.username like :buscar order by imagenes.id desc" );
        $stmt->bindParam( ':buscar', $buscar );
        // Asigna valores
        $buscar = "%{$buscar}%";
        $stmt->execute();
        // ligar variables de resultado
        $resultSet = null;
        if( $filas = $stmt->fetchAll(PDO::FETCH_ASSOC) ) {
            $resultSet = $filas;
        }
        return $resultSet;
    }

    public function getImagen( $imagenid ) {
        // Preparar
        $stmt = $this->db->prepare("select imagenes.*, users.email, users.username from imagenes inner join users on imagenes.userid = users.id where imagenes.id = :imagenid order by imagenes.id desc");
        $stmt->bindParam( ':imagenid', $imagenid );
        // Asigna valores 
        $imagenid = $imagenid;        
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

    public function getMiGaleria($userid) {
        // Preparar
        $stmt = $this->db->prepare("select imagenes.*, users.email, users.username from imagenes inner join users on imagenes.userid = users.id where userid=:userid order by imagenes.id desc");
        $stmt->bindParam( ':userid', $userid );
        // Asigna valores
        $userid = $userid;
        // ejecutar la consulta
        $stmt->execute();
        // ligar variables de resultado
        $resultSet = null;
        if( $filas = $stmt->fetchAll(PDO::FETCH_ASSOC) ) {
            $resultSet = $filas;
        }
        //$arr = $stmt->errorInfo();
        //print_r($arr);
        //exit;
        return $resultSet;
    }

    public function add() {
        // Preparar
        $stmt = $this->db->prepare("insert into imagenes (id, nombre, titulo, resumen, palabrasclave, direccion, size, userid, latitud, longitud) VALUES (:id, :nombre, :titulo, :resumen, :palabrasclave, :direccion, :size,:userid, :latitud, :longitud)");
        $stmt->bindParam( ':id', $id );
        $stmt->bindParam( ':nombre', $nombre );
        $stmt->bindParam( ':titulo', $titulo );
        $stmt->bindParam( ':resumen', $resumen );
        $stmt->bindParam( ':palabrasclave', $palabrasclave ); 
        $stmt->bindParam( ':direccion', $direccion );
        $stmt->bindParam( ':size', $size );
        $stmt->bindParam( ':userid', $userid );
        $stmt->bindParam( ':latitud', $latitud );
        $stmt->bindParam( ':longitud', $longitud );
        // Asigna valores
        $id = $this->id;
        $nombre = $this->nombre;
        $titulo = $this->titulo;
        $resumen = $this->resumen;
        $palabrasclave = $this->palabrasclave;
        $direccion = $this->direccion;
        $size = $this->size;
        $userid = $this->userid;
        $latitud = $this->latitud;
        $longitud = $this->longitud;
        if(!$stmt->execute()){
            return false;
            http_response_code( 400 );
            //exit( 'La operación no pudo ser realizada.' );
            print_r($stmt->errorInfo());
        }
        return true;
    }

    public function save() {
        // Preparar
        $stmt = $this->db->prepare("update imagenes set userid = :userid, titulo =:titulo, direccion = :direccion,resumen = :resumen, palabrasclave = :palabrasclave, latitud = :latitud, longitud= :longitud where id = :id");
        $stmt->bindParam( ':id', $id );
        $stmt->bindParam( ':titulo', $titulo );
        $stmt->bindParam( ':resumen', $resumen );
        $stmt->bindParam( ':palabrasclave', $palabrasclave );
        $stmt->bindParam( ':direccion', $direccion );
        $stmt->bindParam( ':userid', $userid );
        $stmt->bindParam( ':latitud', $latitud );
        $stmt->bindParam( ':longitud', $longitud );
        // Asigna valores
        $id = $this->id;
        $titulo = $this->titulo;
        $resumen = $this->resumen;
        $palabrasclave = $this->palabrasclave;
        $direccion = $this->direccion;
        $userid = $this->userid;
        $latitud = $this->latitud;
        $longitud = $this->longitud;
        return $stmt->execute();
    }
 
    public function delete() {
        // Preparar
        $stmt = $this->db->prepare("delete from imagenes where id = :id");
        $stmt->bindParam( ':id', $id );
        // Asigna valores
        $id = $this->id;
        return $stmt->execute();
    }
}
?>

