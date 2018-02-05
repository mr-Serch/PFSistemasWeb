<?php
class RegistroController extends ControladorBase {
    public $conectar;
    public $adapter;
    public $auth;
    public function __construct() {
        parent::__construct();
        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();
        // Carga Auth
        $this->auth = new \Delight\Auth\Auth( $this->adapter );
    }

    public function index() {
        //Cargamos la vista index y le pasamos valores
        $this->view( "Registro", array("exito" =>	'',"error"	=>	''));
    }

    public function registrarPOST() {
        $exito = '';
        $error = '';
        if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
            if ( !empty( $_POST["username"] ) && !empty( $_POST["email"] ) && !empty( $_POST["password"] ) && !empty( $_POST["confirm_password"] ) ) {
                try {
                    $userId = $this->auth->register( $_POST['email'],
                    $_POST['password'], $_POST["username"] );
                    $exito = 'Cuenta creada exisosamente.';
                }
                catch (\Delight\Auth\InvalidEmailException $e) {
                    // email incorrecto
                    $error = 'Datos no válidos. Inténtelo nuevamente.';
                }
                catch (\Delight\Auth\InvalidPasswordException $e) {
                    // password incorrecto
                    $error = 'Datos no válidos. Inténtelo nuevamente.';
                }
                catch (\Delight\Auth\UserAlreadyExistsException $e) {
                    // email no verificado
                    $error = 'Usuario ya existente. Inténtelo nuevamente.';
                }
                catch (\Delight\Auth\TooManyRequestsException $e) {
                    // demasiados intentos
                    $error = 'Demasiados intentos erróneos. Inténtelo nuevamente.';
                }
            }
        }
        //Cargamos la vista index y le pasamos valores
        $this->view( "Registro", array( "exito" =>	$exito,  "error"	=>		$error));
    }
    public function borrar(){
        if( isset( $_GET["id"] ) ){
            $id=(int)$_GET["id"];
            $usuario = new Usuario();
            $usuario->deleteById( $id );
        }
        $this->redirect();
    }


    public function hola(){
        $usuarios = new UsuariosModel();
        $usu = $usuarios->getUnUsuario(); var_dump( $usu );
    }
 
}
?>
