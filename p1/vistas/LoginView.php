<?php
// Incluye Encabezado
require_once '_Encabezado.php';
?>
<!--
<div class="container" id="titulo1">
    <h3 class="text-center">Inicio de sesión</h3>
        <div class="row">
            <div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <fieldset>
                        <legend>Iniciar sesión</legend>
                    
                                <?php if( !empty( $error ) ) echo "<p class=\"error text-center text-danger\">{$error}</p>";?>
								<form action="<?php echo $helper->url( "login", "indexPOST" ); ?>" method="post" role="form">
                                <div class="form-group">
                                    <input class="form-control" name="username" placeholder="Correo electrónico" type="text" />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="password" placeholder="Contraseña" type="password" />
                                </div>
                                <div class="form-group text-center">
                                    <button name="btnEntrar" class="btn btn-primary" type="submit">Entrar</button>
                                </div>
                        </form>
                        </fieldset>
                    </div>
                <div class="panel-footer text-right"><a href="<?php echo $helper->url( "registro" ); ?>">Crear una cuenta</a> </div>
            </div> 
        </div>
    </div>
</div>
-->












<div class="container">
    <div class="row">
        <div class="col-md-12">
           
            <div class="wrap" id="titulo1">
                <ul class="nav navbar-nav navbar-right">
                 <li><a href="<?php echo $helper->url( "registro" ); ?>">Crear una cuenta</a></li>
               </ul><br><br><br><br>
          <p class="form-title">Iniciar sesión</p>
                               
                                <form action="<?php echo $helper->url( "login", "indexPOST" ); ?>" method="post" role="form">
                                <div class="form-group">
                                    <input class="form-control" name="username" placeholder="Correo electrónico" type="text" />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="password" placeholder="Contraseña" type="password" />
                                </div>
                                <div class="form-group text-center">
                                    <button name="btnEntrar" class="btn btn-primary" type="submit">Entrar</button>
                                </div>
                        </form>
            </div>
        </div>
    </div>
    <div class="posted-by"><?php require_once '_Pie.php';
?></div>
</div>











<!-- Scripts -->
<script src="js/login.js"></script>
<link rel="stylesheet" href="css/estilos.css">
<link rel="stylesheet" href="css/style.css">

<?php
// Incluye el pie
require_once '_Pie.php';
?>

