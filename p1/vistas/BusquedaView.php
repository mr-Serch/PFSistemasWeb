<?php
// Incluye Encabezado
require_once '_Encabezado.php';
?>

<div class="container" id="titulo1">
<h3 class="text-center">Búsqueda</h3>

<?php if( isset( $buscar ) ) : ?>
    <p>Resultados de la búsqueda: <em class="text-success"><?php echo $buscar;
?></em></p>
<?php else: ?>

<?php endif; ?>
<!--
<div class="panel panel-default">
    <div class="panel-body">
        <form action="<?php echo $helper->url( "home", "busquedaPOST" ); ?>" method="post" role="form">
            <div class="input-group"><input type="text" class="form-control" name="buscar" value="<?php if(isset($buscar))echo $buscar; else echo "Escribe aqui"; ?>" placeholder="Introduzca un valor para este campo" /> 
                <span class="input-group-btn">
                    <button name="btnEntrar" class="btn btn-primary" type="submit">Buscar</button>
                </span>
            </div>
        </form>
    </div>
</div>
-->
<?php if( isset( $allimagenes ) && count( $allimagenes ) > 0 ) : $totalcont = count( $allimagenes ); ?>
    <p class="text-primary">Mostrando <?php echo $totalcont; ?> elementos</p>
        <div class="cuadros flex-row row">
            <?php foreach( $allimagenes as $imagen ) {
                echo '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">'; require '_FichaView.php';
                echo '</div>';
            } ?>
        </div>
        <?php elseif( isset( $buscar ) ) : ?>
        <div class="alert alert-info" role="alert">
            <p>No se han encontrado imágenes.</p>
        </div>
<?php endif; ?>
</div>

<!-- Scripts -->
<script src="js/busqueda.js"></script>

<?php
// Incluye el pie
require_once '_Pie.php';
?>

