<?php
class MiGaleriaController extends ControladorBase {
    public function __construct() {
        parent::__construct();
        // Conectar a BD
        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();
        // Carga Auth
        $this->auth = new \Delight\Auth\Auth( $this->adapter );
        $this->ObtenPerfil();
    }

    public function index() {
        //Creamos el objeto
        $imagen = new Imagen( $this->adapter );
        //Conseguimos los datos del usuario
        //Creamos el objeto
        $usuario = new Usuario( $this->adapter );
        if( !isset( $_GET["userid"] ) ){
            $userid = $this->auth->getUserId();
            $menus = "Mi galería";
        }
        else {
            $userid = $_GET["userid"];
            $menus = "seguidas";
        }
        $unUsuario = $usuario->getUsuario( $userid );
        //Conseguimos todos los registros
        $allimagenes = $imagen->getMiGaleria( $userid );

        //Cargamos la vista index y le pasamos valores
        $this->view( "MiGaleria" , array( "menu" =>	$menus, "allimagenes" =>	$allimagenes, "usuario" => $unUsuario));
    }

    public function nuevo() {
        //Cargamos la vista index y le pasamos valores
        $this->view( "NuevaImagen" , array( "menu" =>	'Mi galería'));
    }

    public function nuevoPOST() {
        if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
            if( empty( $userid ) )
            $userid = $this->auth->getUserId(); else
            $userid = $_GET["userid"];
            //if ( !empty( $_POST["imagenid"] ) && !empty( $_POST["palabrasclave"]) && !empty( $_POST["direccion"] ) && !empty( $_POST["latitud"] )	&& !empty($_POST["longitud"] ) ) {
            if ( !empty( $_POST["imagenid"] )) {

			//Creamos el objeto Imagen
                $imagen = new Imagen( $this->adapter );
                $imagen->setId( $_POST["imagenid"] );
                $imagen->setTitulo( $_POST["titulo"] );
                $imagen->setResumen( $_POST["resumen"] );
                //$imagen->setPalabrasClave( $_POST["palabrasclave"] );
                //$imagen->setDireccion( $_POST["direccion"] );
                $imagen->setUserId( $userid );
                //$imagen->setLatitud( $_POST["latitud"] );
                //$imagen->setLongitud( $_POST["longitud"] );
                if( $imagen->save() ) {
                    // Redirecciona al inicio
                    $this->redirect( "migaleria", "index" );
                }
            }
            $error = 'Información no válida. Inténtelo nuevamente.';
        }
        //Cargamos la vista y le pasamos valores
        if(isset($error))
            $this->view( "NuevaImagen", array("menu" =>'Mi  galería',"error"	=>	$error));
        $this->view( "NuevaImagen", array("menu" =>'Mi  galería'));
    }
}
?>


