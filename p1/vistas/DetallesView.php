<?php
// Incluye Encabezado
require_once '_Encabezado.php';
?>

<div class="container" id="titulo">
<h3 class="text-center">Detalle de imagen</h3>
<p>Detalles de la información publicada.</p>

<?php if( isset( $imagen ) ) : require '_FichaView.php';
 
else: ?>
<div class="alert alert-info" role="alert">
<p>No se ha encontrado el elemento.</p>
</div>
<?php endif; ?>

<h4>Comentarios</h4>
<div class="panel panel-info">
<?php if( isset( $allcomentarios ) && count( $allcomentarios ) > 0 ) :
    $totalcont = count( $allcomentarios ); ?>
    <div class="panel-heading">
    Mostrando <?php echo $totalcont; ?> elementos
    </div>  
<div class="panel-body">
<?php foreach( $allcomentarios as $comentario ) { require '_ComentarioView.php';} ?>
</div>
<?php else: ?>
<div class="panel-body">
<div class="alert alert-info" role="alert">
    <p>No hay comentarios.</p>
</div>
</div>
<?php endif; ?>
</div>

<?php require '_NuevoComentarioView.php'; ?>
</div>


<?php
// Incluye el pie
require_once '_Pie.php';
?>