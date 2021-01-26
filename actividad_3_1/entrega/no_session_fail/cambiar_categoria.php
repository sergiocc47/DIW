<!doctype html>
<html lang="es">
	<head>		
		<meta charset="utf-8"/>
		<title>Universidad de Cádiz</title>		
	</head>
	
	<body>
		<?php
			$obra=$_GET['obra'];
			echo '<form action="cambiar_categoria.php?obra=$obra" method="get">';
			/*<form action="cambiar_categoria.php?obra=<?=$obra?>" method="get">';*/	// sintaxis para meter en HTML
		?>
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
		<br/>
		<a href="index.php">Volver a GALERÍA</a>
	</body>
</html>
