<!doctype html>
<html lang="es">
	<head>		
		<meta charset="utf-8"/>
		<title>Actividad 3.1.1</title>		
	</head>
	
	<body>
		<?php
			$obra=$_GET['obra'];
			
			unlink($obra);
			
			echo "Obra $obra eliminada!";
		?>
		<br/>
		<a href="index.php">Volver a GALERÍA</a>
	</body>
</html>
