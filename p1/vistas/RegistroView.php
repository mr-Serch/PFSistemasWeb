<?php
// Incluye Encabezado
require_once '_Encabezado.php';
?>

<div class="container" id="titulo">
<h3 class="text-center">Registro de usuarios</h3>
<div class="row">
<div class="col-md-12">
<?php if( !empty( $exito ) ) : ?>
<div class="alert alert-success" role="alert"><?= $exito ?> <p>Utilice esta cuenta para <a href="<?php echo $helper->url( "login" );?>">iniciar sesión</a></p></div>
<?php else : ?>
<div>
<div class="panel-body">
<?php if( !empty( $error ) ) { echo "<p class=\"error text-center text-danger\">{$error}</p>";}?>
<form action="<?php echo $helper->url( "registro", "registrarPOST" );?>" method="post" role="form"><div class="form-group">
<label class="control-label" for="username">Nombre completo</label>
<input type="text" class="form-control" name="username" placeholder="Introduzca un valor para este campo" /></div>
<div class="form-group">
<label class="control-label" for="email">Email</label>
<input type="text" class="form-control" name="email" placeholder="Introduzca un valor para este campo" />
</div>
<div class="form-group">
<label class="control-label" for="password">Contraseña</label>
<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" />
</div>
<div class="form-group">
<label class="control-label" for="confirm_password">Repita la contraseña</label>
<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Repita la contraseña" />
</div>
<div class="form-group text-center">
<button name="btnEntrar" class="btn btn-primary" type="submit">Registrarse</button>
</div>
</form>
</div>
<div class=" text-right"> ¿Ya tiene cuenta? <a href="<?php echo $helper->url( "login" ); ?>">Iniciar sesión</a>
</div>
</div>
<?php endif; ?>
</div>
</div>
<?php
// Incluye el pie
require_once '_Pie.php';
?>
</div>

<!-- Scripts -->
<script src="js/registro.js"></script>


