<?php
// Incluye Encabezado
require_once '_Encabezado.php';
?>
<div class="container" id="titulo">
<h3 class="text-center">Seguidores</h3>
<?php if( isset( $allusuarios ) && count( $allusuarios ) > 0 ) : $headers = array( 'id', 'username', 'email' ); $totalcont = count( $allusuarios ); ?>
<p class="text-primary">Mostrando <?php echo $totalcont; ?> elementos</p>
<table class="table table-striped table-bordered">
<thead>
<?php echo('<tr>'); echo('<th>'); echo(implode('</th><th>', $headers)); echo('</th>'); echo('</tr>'); ?>
</thead>
<tbody>
<?php foreach( $allusuarios as $usuario ): ?>
<tr>
<td><?php echo $usuario["id"]; ?></td>
<td><?php echo $usuario["username"]; ?></td>
<td><?php echo $usuario["email"]; ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<?php endif; ?>
</div>

<?php
// Incluye el pie
require_once '_Pie.php';
?>
