<!doctype html>
<html lang="es">
	<head>
		<title>Universidad de Cádiz</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" type="text/css" href="estilo.css"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Graduate"/>
	</head>
	<body>
		<!-- CABECERA -->
		<?php
			include "cabecera.inc.php";
		?>
		<!-- BARRA DE NAVEGACIÓN -->
		<?php
			include "utilidades.inc.php";
		?>
		<div id="cuerpo">
			<?php
				include "menu_principal.inc.php";
			?>
			
			<div  style="float:left">
				<h1>SUBIR IMAGEN</h1>
				<form action="subir.php" method="post" 
					enctype="multipart/form-data">
					Seleccionar imagen
					<input name="archivo" type="file"/><br/>
					Seleccionar autor:<br/>
					<input type="radio" name="autor" value="Dalí"/>Dalí<br/>
					<input type="radio" name="autor" value="El Bosco"/>El Bosco<br/>
					<input type="radio" name="autor" value="El Greco"/>El Greco<br/>
					<input type="radio" name="autor" value="Goya"/>Goya<br/>
					<input type="radio" name="autor" value="Murillo"/>Murillo<br/>
					<input type="radio" name="autor" value="Picasso"/>Picasso<br/>
					<input type="radio" name="autor" value="Sorolla"/>Sorolla<br/>
					<input type="radio" name="autor" value="Velázquez"/>Velázquez<br/>
					<input type="radio" name="autor" value="Zurbarán"/>Zurbarán<br/>
					<br/>
					Nombre de la obra <input name="nombre_obra"/><br/>
					Tipo de licencia <input name="tipo_licencia"/><br/>
					<input type="submit" value="Subir"/> 
				</form>
			</div>
		</div>
	
	</body>
</html>