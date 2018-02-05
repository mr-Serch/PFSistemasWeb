<?php
// Incluye Encabezado
require_once '_Encabezado.php';
?>

<div class="container" id="titulo">
<h3 class="text-center">Más populares</h3>
<p>Listado de hasta 10 imágenes con más likes.</p>

<?php if( isset( $allimagenes ) && count( $allimagenes ) > 0 ) :
    $totalcont = count( $allimagenes ); ?>
<p class="text-primary">Mostrando <?php echo $totalcont; ?> elementos</p>
<div class="cuadros flex-row row">

<?php foreach( $allimagenes as $imagen ) {
echo '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">'; require '_FichaView.php';
echo '</div>';
} ?>
</div>
<?php else: ?>
<div class="alert alert-info" role="alert">
<p>No se han encontrado imágenes.</p>
</div>
<?php endif; ?>
</div>


<?php
// Incluye el pie
require_once '_Pie.php';
?>
