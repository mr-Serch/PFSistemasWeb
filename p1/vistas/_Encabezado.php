<!DOCTYPE html>
<html lang="en">
<head>
    <title>Proyecto Final</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- JQuery Validation -->
        <script src="js/jqueryvalidation/jquery.validate.js"></script>
    <!-- Font Awesome -->
        <link rel="stylesheet" href="js/font-awesome/css/font-awesome.min.css">
    <!-- Fancybox -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.js"></script>
    <!-- Mi estilo --> 
        <link rel="stylesheet" href="css/sisflex.css">
        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href="css/estilos.css">
    <!-- Mi script -->
        <script src="js/global.js"></script>
</head>
    <body>
        <?php if ( isset( $menu ) ) : ?>
            <div class="hidden menu-activo"><?php echo $menu; ?></div>
        <?php endif; ?>
<?php include_once '_Menu.php'; ?>