<!--
<div class="thumbnail titulo1">
    <div class="img">
        <a data-fancybox="gallery" data-caption="<?php echo $imagen["titulo"]; ?>" href="<?php echo $helper->imagen_url( $imagen["nombre"] ); ?>">
            <img src="<?php echo $helper->imagen_url( $imagen["nombre"] ); ?>" alt="<?php echo $imagen["titulo"]; ?>">
        </a>
</div>
    <div class="caption">
        <h3 class="flex-text"><?php echo $imagen["titulo"]; ?></h3>
        <p class="flex-text small"><em><?php echo $imagen["resumen"]; ?></em></p>
        <p class="flex-text small"><i class="fa fa-user"></i> <?php echo$imagen["username"]; ?>
        <?php if ( $this->auth->getUserId() != $imagen["userid"] ) : ?>
            <button id="btnSeguir<?php echo $imagen["id"] . $imagen["userid"]; ?>" class="btnSeguir<?php echo $imagen["userid"]; ?> btn btn-xs" title="Seguir"><i class="fa fa-user-plus"></i></button> 
            <script>DibujaSeguir( '#btnSeguir<?php echo $imagen["id"] .$imagen["userid"]; ?>', '.btnSeguir<?php echo $imagen["userid"]; ?>', '<?php echo$imagen["userid"]; ?>' );</script>
        <?php endif;?>
        </p>

        <p><button id="btnMeGusta<?php echo $imagen["id"]; ?>" class="btn btn-primary btn-xs"><i class="fa fa-thumbs-o-up"></i> Me gusta</button>
        <script>DibujaMeGusta( '#btnMeGusta<?php echo $imagen["id"]; ?>', <?php echo$imagen["id"]; ?> );</script>
        <a id="btnComentarios<?php echo $imagen["id"]; ?>" href="<?php echo $helper->url( "comentario" ); ?>&imagenid=<?php echo $imagen["id"]; ?>" class="btn btn-default btn-xs" role="button">Comentarios</a>
        <script>DibujaComentarios( '#btnComentarios<?php echo $imagen["id"]; ?>',
        <?php echo $imagen["id"]; ?> );</script>
        </p>
       <p class="flex-text small"><i class="fa fa-key"></i> <em><?php echo$imagen["palabrasclave"]; ?></em></p>
    </div>
</div>
-->



<div class="gallery">
  <div class="thumbnail-1 wow fadeInLeft">
    <div class="img">
        <a data-fancybox="gallery" data-caption="<?php echo $imagen["titulo"]; ?>" href="<?php echo $helper->imagen_url( $imagen["nombre"] ); ?>">
            <img src="<?php echo $helper->imagen_url( $imagen["nombre"] ); ?>" width="100" height="100"alt="<?php echo $imagen["titulo"]; ?>">
        </a>
</div>
    <div class="caption">
        <h3 class="flex-text"><?php echo $imagen["titulo"]; ?></h3>
        <p class="flex-text small"><em><?php echo $imagen["resumen"]; ?></em></p>
        <p class="flex-text small"><i class="fa fa-user"></i> <?php echo$imagen["username"]; ?>
        <?php if ( $this->auth->getUserId() != $imagen["userid"] ) : ?>
            <button id="btnSeguir<?php echo $imagen["id"] . $imagen["userid"]; ?>" class="btnSeguir<?php echo $imagen["userid"]; ?> btn btn-xs" title="Seguir"><i class="fa fa-user-plus"></i></button> 
            <script>DibujaSeguir( '#btnSeguir<?php echo $imagen["id"] .$imagen["userid"]; ?>', '.btnSeguir<?php echo $imagen["userid"]; ?>', '<?php echo$imagen["userid"]; ?>' );</script>
        <?php endif;?>
        </p>

        <p><button id="btnMeGusta<?php echo $imagen["id"]; ?>" class="btn btn-primary btn-xs"><i class="fa fa-thumbs-o-up"></i> Me gusta</button>
        <script>DibujaMeGusta( '#btnMeGusta<?php echo $imagen["id"]; ?>', <?php echo$imagen["id"]; ?> );</script>
        <a id="btnComentarios<?php echo $imagen["id"]; ?>" href="<?php echo $helper->url( "comentario" ); ?>&imagenid=<?php echo $imagen["id"]; ?>" class="btn btn-default btn-xs" role="button">Comentarios</a>
        <script>DibujaComentarios( '#btnComentarios<?php echo $imagen["id"]; ?>',
        <?php echo $imagen["id"]; ?> );</script>
        </p>
       <p class="flex-text small"><i class="fa fa-key"></i> <em><?php echo$imagen["palabrasclave"]; ?></em></p>
    </div>
</div>
  </div>
