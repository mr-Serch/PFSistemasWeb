<?php
class SiguiendoController extends ControladorBase {
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
        $seguir = new Seguir( $this->adapter );
        //Conseguimos todos los registros
        $allusuarios = $seguir->getSuscripciones( $this->auth->getUserId() );
        //Cargamos la vista index y le pasamos valores
        $this->view( "Siguiendo" , array( "menu" =>	'seguidas', "allusuarios" =>	$allusuarios,));
    }
}
?>

