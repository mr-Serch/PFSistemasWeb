<?php
// Incluye Encabezado
require_once '_Encabezado.php';
?>

<div class="container" id="titulo">
    <h3 class="text-center">Galería de usuario <small><?php echo $usuario["username"];?></small></h3>
        <p>Listado de la galería de un usuario.</p>
            <?php if ( $this->auth->getUserId() == $usuario["id"] ) : ?>
                <p class="text-right"><a href="<?php echo $helper->url( "migaleria", "nuevo" ); ?>" class="btn btn- primary">Nueva imagen</a></p>
            <?php else: ?>
                <p class="text-right"><a href="<?php echo $helper->url( "siguiendo" ); ?>" class="btn btn- primary">Galerías seguidas</a></p>
            <?php endif;?>
            <?php if( isset( $allimagenes ) && count( $allimagenes ) > 0 ) : $totalcont = count( $allimagenes ); ?>
                <p class="text-primary">Mostrando <?php echo $totalcont; ?> elementos</p>
                <div class="cuadros flex-row row">
                <?php foreach( $allimagenes as $imagen ) {echo '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">'; require '_FichaView.php';echo '</div>';} ?></div>
            <?php else: ?>
                <div class="alert alert-info" role="alert"><p>Agregue imágenes para ver el listado aquí.</p></div>
            <?php endif; ?>
</div>

<?php
// Incluye el pie
require_once '_Pie.php';
?>


