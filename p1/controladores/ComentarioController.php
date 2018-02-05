<?php
class ComentarioController extends ControladorBase {
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
        $unaImagen = null;
        $comentarios = null;
        if ( !empty( $_GET["imagenid"] ) ) {
            //Creamos el objeto
            $imagen = new Imagen( $this->adapter );
            $unaImagen = $imagen->getImagen( $_GET["imagenid"] );
            //Creamos el objeto
            $comentario = new Comentario( $this->adapter );
            $comentarios = $comentario->getAll( $_GET["imagenid"] );
        }
        //Cargamos la vista index y le pasamos valores
        $this->view( "Detalles" , array("menu" => 'Mi galería', "imagen" => $unaImagen, "allcomentarios" =>	$comentarios,));
    }

    public function nuevoPOST() {
        
        if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
            if ( !empty( $_GET["imagenid"] ) && !empty( $_POST["titulo"] ) && !empty( $_POST["cuerpo"] ) ) {
                //Creamos el objeto Imagen
                $comentario = new Comentario( $this->adapter );
                $comentario->setUserId( $this->auth->getUserId() );
                $comentario->setImagenId( $_GET["imagenid"] );
                $comentario->setTitulo( $_POST["titulo"] );
                $comentario->setCuerpo( $_POST["cuerpo"] );

                if( $comentario->add() ) {
                    // Redirecciona al inicio
                    $this->redirect( "comentario", "index", "&imagenid=" .
                    $_GET["imagenid"] );
                }
            }
            $error = 'Información no válida. Inténtelo nuevamente.';
        }
        // Redirecciona al inicio
        $this->redirect("comentario", "index", "&imagenid=" . $_GET["imagenid"]."&error=".$error);
    }
}
?>
