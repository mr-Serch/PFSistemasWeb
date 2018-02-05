<?php
//Configuración global
require_once 'config/Global.php';

//Base para los  controladores
require_once 'nucleo/ControladorBase.php';

//Funciones para el controlador frontal
require_once 'nucleo/ControladorFrontal.func.php';

require_once 'nucleo/EntidadBase.php';

require_once 'modelos/Imagen.php';

//Cargamos controladores y acciones
if( isset( $_GET["controller"] ) ) {
	$controllerObj = cargarControlador( $_GET["controller"] );
	lanzarAccion( $controllerObj );
} else {
	$controllerObj = cargarControlador( CONTROLADOR_DEFECTO );
	lanzarAccion( $controllerObj );
}
?>
