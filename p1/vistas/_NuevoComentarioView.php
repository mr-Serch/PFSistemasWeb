<div class="panel panel-info">
    <div class="panel-heading"><strong>Nuevo comentario</strong></div>
    <div class="panel-body">
        <?php
            if( !empty( $error ) ) {
                echo "<p class=\"error text-center text-danger\">{$error}</p>";
            }
        ?>
        <form action="<?php echo $helper->url( "comentario", "nuevoPOST" );
                ?>&imagenid=<?php echo $imagen["id"]; ?>" method="post" role="form">
            <div class="form-group">
                    <label class="control-label" for="titulo">Titulo</label>
                    <input type="text" class="form-control" name="titulo" placeholder="Introduzca un valor para este campo" />
            </div>
            <div class="form-group">
                <label class="control-label" for="cuerpo">Comentario</label>
                <textarea class="form-control" name="cuerpo" placeholder="Introduzca un valor para este campo"></textarea>
            </div>
            <div class="form-group text-center">
            <button name="btnEntrar" class="btn btn-primary" type="submit">Enviar</button>
            </div>
        </form>
    </div>
</div>

<!-- Scripts -->
<script src="js/nuevocomentario.js"></script>
