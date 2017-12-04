<nav class="navbar navbar-default navbar-fixed-top" id="nav">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="index.php">
	      	<img src="images/logo.png" class="img-responsive">
	      </a>
	    </div>
	    <div id="carrito">
		    <img src="images/carrito-compras.png" width="30px" height="30px">
		    	<?php 
		    	$cantidad_products = 0;
		    	if(isset($_SESSION['carrito'])){
		    		for($i=1; $i<=count($_SESSION['carrito']); $i++){ 
		    			$cantidad_products = $i;
		    		}  
		    	} ?>
			<p id="count-carrito"><strong><?php echo $cantidad_products; ?></strong></p>		
	    </div>
	    
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav" id="nav-ul">
	        <!--<li><a href="controllers/listarSexo.php">HOMBRE <span class="sr-only">(current)</span></a></li>
	        <li><a href="productos-mujer.php">MUJER</a></li> lo que hizo mabell-->

	        <!-- lo que estoy haciendo yo -->
	         <li>
	        	<!--<a href="#">-->
	        		<!--<form action="productos-hombre.php" method="GET">-->
	        		<form action="productos-hombre.php" method="GET">	
	        			<input type="hidden" value="1" name="id_sexo">
	        			<input type="submit" value="HOMBRE">	
	        		</form>   
	        		<span class="sr-only">(current)</span>
	        	<!--</a>-->
	        </li>
	        <li>
	        	<!--<a href="#">-->
	        		<!--<form action="productos-mujer.php" method="GET">-->
	        		<form action="productos-mujer.php" method="GET">	
	        			<input type="hidden" value="2" name="id_sexo">
	        			<input type="submit" value="MUJER">	
	        		</form>   
	        		<span class="sr-only">(current)</span>
	        	<!--</a>-->
	        </li>        
	      </ul>
	      
	  <ul class="nav navbar-nav navbar-right">      
	    <li class="dropdown">
	    	<?php  if (isset($_SESSION['usuario']) && isset($_SESSION['password'])){?>
	    		<h4 class="user-name"><?php echo "¡Hola " . $_SESSION['usuario'] . "!"; ?></h4>
	    		<a class="text-under-login" href="controllers/cerrarSession.php"> Cerrar sesión</a>
	    		<?php }else{ ?>
	      <a href="#" class="dropdown-toggle pd-l-0" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Iniciar Sesión <span class="caret"></span></a><?php } ?>
	      <ul id="box-login" class="dropdown-menu row">
          <form action="controllers/validarUsuario.php" method="POST">
          	<div>
          		<div>
          			<h4>Inicio de sesión</h4>
          			<div class="form-group">
          				<input type="text" autofocus="true" name="usuario-login" placeholder="Ingrese su usuario *" required>
          			</div>
          			<div class="form-group">
          				<input type="password" name="password-login" placeholder="Ingrese su contraseña *" required>
          			</div>
          			<input class="bt-form" type="submit" name="login" value="Entrar">
          			<input type="hidden" name="current_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
          		</div>
          	</div>
        	</form>
	        </ul>
	        </li> 
	        <?php if(!isset($_SESSION['usuario']) && !isset($_SESSION['password'])){ ?>
	        <form  action="registro.php" method="POST">
        		<button class="text-under-login pd-l-0">Registrarse</button>
          	</form>
          <?php } ?>
	      </ul>
	    </div>
	  </div>
</nav>
<?php if (isset($_SESSION['validation'])) { if(!$_SESSION['validation']){ ?>
<script type="text/javascript">
	window.alert('usuario no registrado o datos invalidos');

</script>
<?php } } ?>
	