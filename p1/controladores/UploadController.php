<?php
class UploadController extends ControladorBase {
    public function __construct() {
        parent::__construct();
        // Conectar a BD
        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();
        // Carga Auth
        $this->auth = new \Delight\Auth\Auth( $this->adapter );
        $this->ObtenPerfil();
    }
    
    public function nuevo() { define('MB', 1048576);
        $ds = DIRECTORY_SEPARATOR;
        $storeFolder = UPLOADS_DIR;
        if ( !empty($_FILES) && !empty( $_GET[ 'id' ] ) ) {
            // Validaciones
            $TipoArchivoId = $_GET[ 'id' ];
            if( $TipoArchivoId < 1 || $TipoArchivoId > 3 ) {
                http_response_code( 400 );
                exit( 'Petición inválida.' );
            }
            $path_parts = pathinfo( $_FILES['file']['name'] );
            if( strtolower( $path_parts[ 'extension' ] ) != 'jpg' && strtolower($path_parts[ 'extension' ] ) != 'png' ) {
                http_response_code( 400 );
                exit( 'Las extensiones permitidas son jpg, png.' );
            }
            if ( $_FILES['file']['size'] > 2*MB ){
                http_response_code( 400 );
                exit( 'El archivo sobrepasa el tamaño máximo.' );
            }
            // Validaciones
            $tempFile = $_FILES['file']['tmp_name'];
            $targetPath = dirname(dirname( FILE )) . $ds . $storeFolder . $ds;
            $targetName = substr( $path_parts[ 'filename' ], 0, 10 ) . date("_dmYHis") .	'.' . $path_parts[ 'extension' ];
            $targetFile =	$targetPath . $targetName;
            $targetSize = $_FILES['file']['size']; 
            move_uploaded_file( $tempFile, $targetFile );
            //Creamos el objeto Imagen
            $imagen = new Imagen( $this->adapter );
            $imagen->setId( null );
            $imagen->setUserId($this->auth->getUserId());
            $imagen->setNombre( $targetName );
            $imagen->setTitulo( null );
            $imagen->setResumen( null );
            $imagen->setPalabrasClave( null );
            $imagen->setDireccion( null );
            $imagen->setSize( $targetSize );
            $imagen->setLatitud( null );
            $imagen->setLongitud( null );
            if( !$imagen->add() ) {
                http_response_code( 400 );
                exit( 'La operación no pudo ser realizada.' );
            }
            $response = array('ArchivoId' => $this->adapter->lastInsertId(),);
            header("Content-Type: application/json");
            echo json_encode( $response );
        }
        else {
            http_response_code( 400 );
            exit( 'Invalid request body.' );
        }
    }
    
    public function elimina() {
        $ds = DIRECTORY_SEPARATOR;
        $storeFolder = UPLOADS_DIR;
        $content = file_get_contents( "php://input" );
        if ($content === false) {
            http_response_code( 400 );
            exit( 'Invalid request.' );
        }
        $obj = json_decode( $content );
        if ( $obj->id == null ) {
            http_response_code( 400 );
            exit( 'Petición inválida.' );
        }
        if ( empty( $obj->id ) ) {
            http_response_code( 400 );
            exit( 'Petición inválida.' );
        }

        // Creamos el objeto Imagen
        $imagen = new Imagen( $this->adapter );
        $fila = $imagen->getById( $obj->id );
        $targetPath = dirname(dirname( FILE )) . $ds . $storeFolder . $ds;
        $targetName = $fila['nombre'];
        $targetFile =	$targetPath . $targetName;

        // Elimina
        $imagen->setId( $obj->id );
        // ejecutar la consulta
        if( !$imagen->delete() ) {
            http_response_code( 400 );
            exit( 'La operación no pudo ser realizada.' );
        }
        // elimina el archivo físico
        unlink( $targetFile );
        http_response_code( 200 );
    }
}
?>
