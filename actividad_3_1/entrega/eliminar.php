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
				
				// Eliminamos el archivo de la imagen
				unlink($obra);
				
				// Almacenamos el nombre del archivo de la obra
				$archivo_obra=explode("/",$obra);			
				
				// Extraemos el nombre de la obra
				$nombre_obra=explode(".",$archivo_obra[4]);
				
				$url_licencia="./img/galeria/".$archivo_obra[3]."/".$nombre_obra[0].".txt";
				
				// Eliminamos el archivo de la licencia
				unlink($url_licencia);
				
				echo "Obra <b>".$nombre_obra[0]."</b> eliminada!";
				
			?>
			<br/>
			<a href="index.php">Volver a GALERÍA</a>
		</div>
		<!-- PIE DE PÁGINA -->
		<?php
			include "pie_de_pagina.inc.php";
		?>
	</body>
</html>
