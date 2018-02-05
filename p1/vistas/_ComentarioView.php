<div class="panel panel-default" id="titulo1">
    <div class="panel-heading">
        <?php echo $comentario["titulo"]; ?>
    </div>
    <div class="panel-body" id="com">
        <p class="flex-text small"><?php echo $comentario["cuerpo"]; ?></p>
    </div>
    <div class="panel-footer">
        <p class="flex-text small"><i class="fa fa-user"></i>
        <?php echo $comentario["username"]; ?> -
        <i class="fa fa-calendar"></i>
        <?php echo $comentario["fecha"]; ?></p>
    </div>
</div>
