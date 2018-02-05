<?php
class UsuarioController extends ControladorBase {
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
        $usuario = new Usuario( $this->adapter );
        //Conseguimos todos los registros
        $allusuarios = $usuario->getAll();
        //Cargamos la vista index y le pasamos valores
        $this->view( "Usuarios" , array( "menu" =>	'Usuarios', "allusuarios" => $allusuarios,));
    }
}
?>
