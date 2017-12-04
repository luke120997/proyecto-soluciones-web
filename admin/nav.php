<?php 
if ($_SESSION['usuario'] != 'admin') {
  header('location: ../index.php');
} ?>
  <nav class="navbar navbar-default" id="admin" role="navigation">
    <div class="container-fluid">
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">
            <img src="../images/logo.png" class="img-responsive">
          </a>
        </div>
        <!-- REPORTES DE VENTAS --> 
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
                  aria-expanded="false">REPORTES <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="ventasMes.php">Reportes de ventas al mes</a></li>
              <li class="divider"></li>
              <li><a href="ventasAnio.php">Repostes de ventas al año</a></li>
            </ul>
          </li>
        </ul>
        <!-- FIN DE REPORTES DE VENTAS-->

        <!-- GRAFICOS DE VENTAS -->
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
                  aria-expanded="false">GRAFICOS <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="graficoMes.php">Graficos de ventas al mes</a></li>
              <li class="divider"></li>
              <li><a href="graficoAnio.php">Graficos de ventas al año</a></li>
            </ul>
          </li>
        </ul>
        <!-- FIN DE GRAFICOS DE VENTAS -->

        <!-- AQUI SERA EL INICIO DE SESION-->
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
                  aria-expanded="false">
              <?php if(isset($_SESSION['usuario'])){echo $_SESSION['usuario'];} ?><span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="../controllers/cerrarSession.php">cerar sesion</a></li>
            </ul>
          </li>
        </ul>
        <!-- FIN DE INICIO DE SESION -->
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>