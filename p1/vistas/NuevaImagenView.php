<?php
// Incluye Encabezado
require_once '_Encabezado.php';
?>
<div class="container" id="titulo">
    <h3 class="text-center">Nueva imagen</h3>
    <p>Introduzca la información solicitada y haga clic en Guardar para crear un nuevo elemento.</p>
    <form action="<?php echo $helper->url( "migaleria", "nuevoPOST" ); ?>" method="post" role="form">
    <p class="text-right"><button type="submit" class="btn btn-primary">Guardar</button><a href="<?php echo $helper->url( "migaleria" ); ?>" class="btn btn- default">Cancelar</a></p>
 
<div >
<div class="panel-body">
<?php
if( !empty( $error ) ) {
echo "<p class=\"error text-center text-danger\">{$error}</p>";
}
?>
<div class="form-group">
<label class="control-label" for="titulo">Titulo</label>
<input type="text" class="form-control" id="titulo titulo1" name="titulo" placeholder="Introduzca un valor para este campo" />
</div>
<div class="form-group">
<label class="control-label" for="resumen">Resumen</label>
<textarea class="form-control" id="resumen" name="resumen" placeholder="Introduzca un valor para este campo"></textarea>
</div>
<div class="form-group">
<label class="control-label" for="palabrasclave">Palabras clave</label>
<input type="text" class="form-control" id="palabrasclave" name="palabrasclave" placeholder="Introduzca un valor para este campo" /></div>
<div class="form-group">
<label class="control-label" for="">Imagen</label>
<input type="hidden" id="imagenid" name="imagenid" value="">
<div class="dropzone dz-clickable fotografia-dropzone">
<div class="dz-message">
<i class="fa fa-upload fa-lg"></i>&nbsp;Agregue el archivo aquí
</div>
</div>
<small class="text-small text-dimensiones">Texto de dimensiones desde Midropzone.js</small>
</div>
</div>
</div>
</form>
</div>


<!-- Dropzone -->
<link href="js/dropzone/dropzone.css" rel="stylesheet" type="text/css" />
<script src="js/dropzone/dropzone.js"></script>
<!-- Mi Dropzone -->
<link href="js/midropzone/midropzone.css" rel="stylesheet" type="text/css" />
<script src="js/midropzone/midropzone.js"></script>
<script src="js/jquerylocationpicker/locationpicker.jquery.js"></script>
<script src="js/nuevaimagen.js"></script>

<?php
// Incluye el pie
require_once '_Pie.php';
?>

