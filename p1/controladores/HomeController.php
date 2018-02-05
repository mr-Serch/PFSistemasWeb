<?php

class HomeController extends ControladorBase {
    public function __construct() {
        parent::__construct();
        // Conectar a BD
        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();
        // Carga Auth
        $this->auth = new \Delight\Auth\Auth( $this->adapter);
        $this->ObtenPerfil();
    }

    public function index() {
        //Creamos el objeto
        $imagen = new Imagen( $this->adapter );
        //Conseguimos todos los registros
        $allimagenes = $imagen->getAll( ' limit 10' );
        //Cargamos la vista index y le pasamos valores
        $this->view( "Home" ,  array("menu" => 'Más recientes',"allimagenes" => $allimagenes,));
    }

    public function populares() {
        //Creamos el objeto
        $imagen = new Imagen( $this->adapter );        
        //Conseguimos todos los registros
        $allimagenes = $imagen->getPopularesAll( ' limit 10' );
        //Cargamos la vista index y le pasamos valores
        $this->view( "Populares" , array("menu" =>	'Más populares',"allimagenes" => $allimagenes,));
    }

    public function busqueda() {
        //Conseguimos todos los registros
        $allimagenes = null;
        //Cargamos la vista index y le pasamos valores
        $this->view( "Busqueda" , array("menu" => 'Búsqueda',"allimagenes" =>	$allimagenes,));
    }

    public function busquedaPOST() {
        $allimagenes = null;
        if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
            if ( !empty( $_POST["buscar"] ) ) {
                //Creamos el objeto Imagen
                $imagen = new Imagen( $this->adapter );
                //Conseguimos todos los registros
                $allimagenes = $imagen->getBusqueda( $_POST["buscar"] );
            }
        }

        //Cargamos la vista index y le pasamos valores
        $this->view( "Busqueda" , array("buscar" => $_POST["buscar"],"menu" =>	'Búsqueda',"allimagenes" =>	$allimagenes,));
    }

    public function salir() {
        //Cargamos la vista index y le pasamos valores
        $this->auth->logOutAndDestroySession();
        $this->redirect( "login" );
    }
}
 
?>


