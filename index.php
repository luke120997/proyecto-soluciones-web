<?php session_start();  ?>
<html>
<head>
<meta charset="utf-8">
	<title>Proyecto I</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/main6.css">
	<link href="https://fonts.googleapis.com/css?family=Mukta+Vaani" rel="stylesheet">
</head>
<body>

	<?php include("nav.php"); ?>

	<div class="bg-home"></div>			

	<section class="container-fluid mg-section" id="categoria-i">

		<h2 class="txt-title text-center">Categorías</h2>

		<div class="row">
			<div class="col-sm-4 pd-0">
				<figure>
					<img src="images/mujeres/bl-1.jpg" class="img-responsive" alt="">
				</figure>
				<h5>Blusas para Mujer</h5>
				<div class="hover">
						<div class="box-button">
							<button type="button" class="btn btn-info btn-lg btn-hover" ><a href="productos-mujer.php">VER MÁS</a></button>
						</div>					
				</div>
			</div>
			<div class="col-sm-4 pd-0">
				<figure>
					<img src="images/hombres/p-5.jpg" class="img-responsive" alt="">
				</figure>
				<h5>Jeans para Hombre</h5>
				<div class="hover">
					<div class="box-button">
							<button type="button" class="btn btn-info btn-lg btn-hover"><a href="productos-hombre.php?id_categoria=2">VER MÁS</a></button>
						</div>
				</div>
			</div>
			<div class="col-sm-4 pd-0">
				<figure>
					<img src="images/hombres/pol-3.jpg" class="img-responsive" alt="">
				</figure>
				<h5>Polo para Hombre</h5>
				<div class="hover">
					<div class="box-button">
							<button type="button" class="btn btn-info btn-lg btn-hover" data-toggle="modal" data-target="#myModal"><a href="productos-hombre.php?id_categoria=3">VER MÁS</a></button>
						</div>
				</div>
			</div>
		</div>
		
	</section>

	<?php require_once("footer.php") ?>	  

</body>

<?php include 'callResourcesJS.php'; ?>

</html>