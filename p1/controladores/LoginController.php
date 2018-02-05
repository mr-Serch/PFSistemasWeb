<?php
class LoginController extends ControladorBase {
    public $conectar;
    public $adapter;
    public $auth;

    public function __construct() {
        parent::__construct();
        // Conectar a BD
        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();
        // Carga Auth
        $this->auth = new \Delight\Auth\Auth( $this->adapter );
    }

    public function index() {
        //Cargamos la vista index y le pasamos valores
        $this->view( "Login", array(
        "exito" => '',
        "error" => ''
        ));
        }
       
    public function indexPOST() {
        $error = '';
        // Carga Auth
        $this->auth = new \Delight\Auth\Auth( $this->adapter );
        if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
            if ( !empty($_POST["username"] ) && !empty( $_POST["password"] ) ) {
                try {$this->auth->loginWithUsername( $_POST['username'], $_POST['password'] );
                    // Redirecciona al inicio
                    $this->redirect( "home", "index" );
                }
                catch (\Delight\Auth\InvalidEmailException $e) {
                    // email incorrecto
                    $error = 'Usuario incorrecto. Inténtelo nuevamente.';
                }
                catch (\Delight\Auth\InvalidPasswordException $e) {
                    // password incorrecto
                    $error = 'Contraseña incorrecta. Inténtelo nuevamente.';
                }
                catch (\Delight\Auth\EmailNotVerifiedException $e) {
                    // email no verificado
                    $error = 'Email incorrecto. Inténtelo nuevamente.';
                }
                /*catch (\Delight\Auth\TooManyRequestsException $e) {
                    // demasiados intentos
                    $error = 'Demasiados intentos erróneos. Inténtelonuevamente.';
                }*/
            }
        }
        //Cargamos la vista index y le pasamos valores
        $this->view( "Login", array( "error"	=>	$error));
    }
}
?>


