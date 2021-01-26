<!doctype html>
<html lang="es">
	<head>		
		<meta charset="utf-8"/>
		<title>Actividad 3.1.1</title>		
	</head>
	
	<body>
		<?php
			$obra=$_GET['obra'];
			
			// Eliminamos el archivo de la imagen
			unlink($obra);
			
			// Almacenamos el nombre del archivo de la obra
			$archivo_obra=explode("/",$obra);
			//echo "Archivo obra: ./img/galeria/".$archivo_obra[3]."/".$archivo_obra[4]."<br/>";	//depuración
			//$nueva_url_obra="./img/galeria/".$archivo_obra[3]."/".$archivo_obra[4];
			
			
			// Extraemos el nombre de la obra
			$nombre_obra=explode(".",$archivo_obra[4]);
			
			$url_licencia="./img/galeria/".$archivo_obra[3]."/".$nombre_obra[0].".txt";
			
			// Eliminamos el archivo de la licencia
			unlink($url_licencia);
			
			echo "Obra <b>".$nombre_obra[0]."</b> eliminada!";
		?>
		<br/>
		<a href="index.php">Volver a GALERÍA</a>
	</body>
</html>
