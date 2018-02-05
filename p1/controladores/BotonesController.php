<?php
class BotonesController extends ControladorBase {
    public function __construct() {
        parent::__construct();

        // Conectar a BD
        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();

        // Carga Auth
        $this->auth = new \Delight\Auth\Auth( $this->adapter );
        $this->ObtenPerfil();
    }

    public function nuevo() {
        //Cargamos la vista index y le pasamos valores
        $this->view( "NuevaImagen" , array( "menu" =>	'Mi galería'));
    }

    public function botoncomentarios() {
        $obj = $this->getJsonRequest();
        $boton = '<i class="fa fa-comment-o"></i> Comentarios';
        // Contador
        if ( !empty( $obj->id ) ) {
            //Creamos el objeto
            $comentario = new Comentario( $this->adapter );
            $boton .= ' <span class="badge">' . $comentario->Cuenta( $obj->id )
            . '</span>';
        }
        $response = array('boton' => $boton);
        $this->json ( $response );
    }

    public function botonmegusta() {
        $obj = $this->getJsonRequest();
        $boton = '<i class="fa fa-thumbs-o-up"></i> Me gusta';
        if ( !empty( $obj->id ) ) {
            if ( $this->IsMeGustaAmi( $obj->id ) )
            $boton = '<i class="fa fa-thumbs-o-down"></i> No me gusta';
        }
        // Contador
        if ( !empty( $obj->id ) ) {
            //Creamos el objeto
            $megusta = new MeGusta( $this->adapter );
            $boton .= ' <span class="badge">' . $megusta->Cuenta( $obj->id ) .
            '</span>';
        }
        $response = array('boton' => $boton);
        $this->json ( $response );
    }

    function IsMeGustaAmi( $imagenid ) {
        //Creamos el objeto
        $megusta = new MeGusta( $this->adapter );
        return $megusta->IsMeGusta( $this->auth->getUserId(), $imagenid );
    }

    public function megusta() {
        $obj = $this->getJsonRequest();
        if ( !empty( $obj->id ) ) {
            //Creamos el objeto
            $megusta = new MeGusta( $this->adapter );
            $megusta->setId( null );
            $megusta->setImagenId( $obj->id );
            $megusta->setUserId( $this->auth->getUserId() );
            if ( $this->IsMeGustaAmi( $obj->id ) )
                $megusta->delete();
            else
                $megusta->add();
        }
        // Escribimos el boton
        return $this->botonmegusta();
    }
 
    public function botonseguir() {
        $obj = $this->getJsonRequest();
        $boton = '<i class="fa fa-user-plus"></i> Seguir';
        if ( !empty( $obj->id ) ) {
            if ( $this->IsSeguir( $obj->id ) )
                $boton = '<i class="fa fa-user-times"></i> No seguir';
        }
        $response = array('boton' => $boton);
        $this->json ( $response );
    }

    function IsSeguir( $imagenid ) {
        //Creamos el objeto
        $seguir = new Seguir( $this->adapter );
        return $seguir->IsSeguir( $this->auth->getUserId(), $imagenid );
    }

    public function seguir() {
        $obj = $this->getJsonRequest();
        if ( !empty( $obj->id ) ) {
            //Creamos el objeto
            $seguir = new Seguir( $this->adapter );
            $seguir->setId( null );
            $seguir->setSeguidorId( $this->auth->getUserId() );
            $seguir->setSeguidoId( $obj->id );
            if ( $this->IsSeguir( $obj->id ) )
                $seguir->delete();
            else
                $seguir->add();
        }
        // Escribimos el boton
        return $this->botonseguir();
    }
}
?>
