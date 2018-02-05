<?php
class ControladorBase { public $auth; public $conectar; public $adapter;
     public function __construct() {
        require_once 'Conectar.php';
        require_once 'EntidadBase.php';
        require_once join( DIRECTORY_SEPARATOR, array( 'vendor', 'autoload.php' ) );
        //Incluir todos los modelos
        foreach( glob( "modelos/*.php" ) as $file ){
            require_once $file;
        }

    }

/*
*	Este método lo que hace es recibir los datos del controlador en forma de array
*	los recorre y crea una variable dinámica con el indice asociativo y le da el
*	valor que contiene dicha posición del array, luego carga los helpers para las
*	vistas y carga la vista que le llega como parámetro. En resumen un método para
*	renderizar vistas.
*/
    public function view( $vista, $datos = null ) {
        foreach ($datos as $id_assoc => $valor) {${$id_assoc} = $valor;}
        require_once 'AyudaVistas.php';
        $helper = new AyudaVistas();
        require_once join( DIRECTORY_SEPARATOR, array( 'vistas', "{$vista}View.php" ) 
        
    );
    }
 
    public function getJsonRequest() {
        $content = file_get_contents( "php://input" );
        if ( $content === false ) {
            http_response_code( 400 ); exit( 'Invalid request.' );
        }
        $obj = json_decode( $content );
        return $obj;
    }
    public function json( $response ) {
        header("Content-Type: application/json"); echo json_encode( $response );
    }
    public function redirect( $controlador = CONTROLADOR_DEFECTO, $accion = ACCION_DEFECTO, $params = '' ) {
        header( "Location:index.php?controller={$controlador}&action={$accion}" .$params );
        exit();
    }

    public function ObtenPerfil() {
        if ( $this->auth->isLoggedIn() ) {
            // Usuario válido
        }
        else {
            // Usuario no válido
            // Redirecciona al login
            $this->redirect( "login" );
            }
    }
}
?>

