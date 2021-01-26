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
			<?php
				$obra=$_GET['obra'];
				
				session_start();
				$_SESSION['cambio_categoria']=$obra;
				
				echo "<form action='cambiar.php?obra=$obra' method='get'>";
				/*<form action="cambiar.php?obra=<?=$obra?>" method="get">';*/	// sintaxis para meter en HTML
			?>
				
				<!-- TODO (mejora): crear a partir de lista que recorra la carpeta de autores -->
				Seleccionar categoría:<br/>
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
				<input type="submit" value="Seleccionar"/> 
			</form>
			<!--
			<br/>
			<a href="index.php">Volver a GALERÍA</a>
			-->
		</div>
		<!-- PIE DE PÁGINA -->
		<?php
			include "pie_de_pagina.inc.php";
		?>
	</body>
</html>
