<!doctype html>
<html lang="es">
	<head>
		<title>Actividad 3.1.1 - Inicio</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" type="text/css" href="estilos_actual.php"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Graduate"/>
	</head>
	<body>
		<div id="cabecera">
			<div id="logo">
				<a href="index.html">
					<img src="./img/logo.png"/>
				</a>
			</div>
			<div id="titulo_principal">
				<h1>Venta de material deportivo</h1>
			</div>
		</div>
			<div id="barra_navegacion">
				<ul>
					<li><a href="index.html">Subir imagen</li>
					<li><a href="catalogo.html">Eliminar imagen</a></li>
					<li><a href="configuracion.html">Cambiar imagen de categoría</a></li>
				</ul>
			</div>

<?php

	$directorio=opendir("./img/galeria"); // ruta actual
	
	while($autor=readdir($directorio)){	// obtenemos un archivo y luego otro sucesivamente
		if(!isset($_GET['autor'])){
			if(!is_file($autor) && $autor!="." && $autor!=".."){	// verificamos si es o no un directorio y descartamos . y ..
			//echo "<a href='autor.php'>$autor</a><br/>";
			
			//echo "<a href='autor.php?autor=Goya'>Goya</a><br/>";	// una por cada autor
			
			echo "<a href='index.php?autor=$autor'>$autor</a><br/>";
			}
		}
		else{
			$autor=$_GET['autor'];
			
			// SUBIR IMAGEN
			echo "<form action='subir.php?autor=$autor' method='post' 
				enctype='multipart/form-data'> 
					Subir imagen
					<input name='archivo' type='file'  />  <br/><br/>
					<input type='submit' value='Subir' /> 
				</form>";
			
			$directorio=opendir("./img/galeria/$autor");
			//TODO: menú subir imágenes, eliminar imágenes y cambiar una imagen de categoría
			while($obra=readdir($directorio)){	// obtenemos un archivo y luego otro sucesivamente
				if($obra!="." && $obra!=".."){	// descartamos . y ..
					//TODO: width mejor en CSS
					echo "<a href='./img/galeria/$autor/$obra'>
						<img src='./img/galeria/$autor/$obra' width=100px/></a><br/>";	// falla si lleva "" en el nombre
					$nombre_obra=explode(".",$obra);
					echo $nombre_obra[0]." ";
					
					// DESCARGAR IMAGEN
					echo "<a href='descargar.php?obra=./img/galeria/$autor/$obra'>Descargar</a><br/><br/>";
					
					//TODO: añadir texto licencia
					// Idea David -> mostrar "menú" y resto de información 
					// al maximizar imagen
				}
			}
		}
	}
	
?>