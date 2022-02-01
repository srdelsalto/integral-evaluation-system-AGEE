<header class="main-header">
    <!-- Logo -->
    <a href="inicio" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="Views/img/icono.png" class="img-responsive"></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="Views/img/logo.png" class="img-responsive"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php
                echo '<span class="hidden-xs">'.$_SESSION["apellido"]." ".$_SESSION["nombre"].'</span>'
              ?>
            </a>
            <ul class="dropdown-menu" style="border: 1px solid black">
              <!-- User image -->
              <li class="user-header" style="height: 100px;">
                <?php
                  if($_SESSION["rol"] == "Administrador"){
                    echo '<p>'.$_SESSION["apellido"]." ".$_SESSION["nombre"].' - Administrador</p>';
                  }
                ?>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="mis-datos" class="btn btn-primary btn-flat">Mis Datos</a>
                </div>
                <div class="pull-right">
                  <a href="salir" class="btn btn-danger btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>