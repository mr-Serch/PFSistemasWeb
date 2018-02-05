<?php if ( $this->auth->isLoggedIn() ) : ?>

    <nav class="navbar navbar-inverse col-4">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data- target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="glyphicon glyphicon-menu-hamburger"></span>
                </button>
            </div>
                <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav ul" id="titulo">
                        <li><a href="<?php echo $helper->url( "home" ); ?>">Más recientes</a></li>
                        <li><a href="<?php echo $helper->url( "home", "populares" ); ?>">Más populares</a></li>
                        <li><a href="<?php echo $helper->url( "seguidores" ); ?>">Seguidores</a></li>
                        <li><a href="<?php echo $helper->url( "usuario" ); ?>">Usuarios</a></li>
                        <li>
   
                          <form class="navbar-form navbar-left" action="<?php echo $helper->url( "home", "busquedaPOST" ); ?>" method="post" role="form">
                        <div class="form-group">
                        <input type="text" class="form-control" name="buscar" value="<?php if(isset($buscar))echo $buscar; ?>" placeholder="Buscar" /> 
                    </div>
            <button name="btnEntrar" class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                              </form>
    
</li>
     </ul>
<ul class="nav navbar-nav navbar-right">
 <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
 <?php echo $this->auth->getUsername(); ?>
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="<?php echo $helper->url( "migaleria" ); ?>">Mi galería</a></li>
    <li><a href="<?php echo $helper->url( "siguiendo" ); ?>">Galerías seguidas</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="<?php echo $helper->url( "home", "salir" ); ?>">Salir</a></li>
  </ul>
  </div>

         <li><p class="navbar-text"></p></li>
    </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
        </nav>
    
<?php endif; ?>

