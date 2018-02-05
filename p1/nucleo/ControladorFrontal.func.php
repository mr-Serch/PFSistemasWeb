<?php
//FUNCIONES PARA EL CONTROLADOR FRONTAL

function cargarControlador( $controller ){
   
    $controlador = ucwords( $controller ) . 'Controller';
    $strFileController = join( DIRECTORY_SEPARATOR, array( 'controladores',"{$controlador}.php" ) );
    if( ! is_file( $strFileController ) ){
        $strFileController = join( DIRECTORY_SEPARATOR, array( 'controladores', ucwords( CONTROLADOR_DEFECTO ), 'Controller.php' ) );
    }
    require_once join( DIRECTORY_SEPARATOR, array( __DIR__, '..', $strFileController ) );
    $controllerObj = new $controlador();
    //echo "objeto:".get_class($controllerObj)."<br>";
    return $controllerObj;
}

function cargarAccion( $controllerObj, $action ) {
    $accion = $action;
    $controllerObj->$accion();
}

function lanzarAccion( $controllerObj ) {
    if( isset( $_GET["action"] ) && method_exists( $controllerObj, $_GET["action"] ) )
    {
        cargarAccion( $controllerObj, $_GET["action"] );
    } else {
        cargarAccion( $controllerObj, ACCION_DEFECTO );
    }
}

?>

