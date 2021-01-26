<!doctype html>
<html lang="es">
	<head>
		<title>Universidad de Cádiz</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="estilo.php"/>
	</head>
	<body>
		<!-- CABECERA -->
		<?php
			include "cabecera.inc.php";
		?>
		<div id="cuerpo">
			<p class="titulo_cuerpo">Subir imagen</p>
			<div>
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
					Nombre de la obra<br/>
					<input name="nombre_obra"/><br/>
					Tipo de licencia<br/>
					<input name="tipo_licencia"/><br/>
					<input type="submit" value="Subir"/> 
				</form>
			</div>
		</div>
		<!-- PIE DE PÁGINA -->
		<?php
			include "pie_de_pagina.inc.php";
		?>
	</body>
</html>