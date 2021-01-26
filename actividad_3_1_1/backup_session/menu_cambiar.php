<!doctype html>
<html lang="es">
	<head>
		<title>Actividad 3.1.1</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" type="text/css" href="estilos_actual.php"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Graduate"/>
	</head>
	<body>
		<div id="cabecera">
			<div id="logo">
				<a href="index.php">
					<img src="./img/logo.png"/>
				</a>
			</div>
			<div id="titulo_principal">
				<h1>Pintores españoles: Licencias para el uso de sus obras</h1>
			</div>
		</div>
		<div id="cuerpo">
			<div id="barra_navegacion">
				<ul>
					<li><a href="menu_subir.html">Subir imagen</li>
					<li><a href="menu_eliminar.php">Eliminar imagen</a></li>
					<li><a href="menu_cambiar.php">Cambiar imagen de categoría</a></li>
				</ul>
			</div>
		</div>
		
		<h1>CAMBIAR IMAGEN DE CATEGORÍA</h1>
		<?php

			$directorio=opendir("./img/galeria"); // ruta actual
			
			while($autor=readdir($directorio)){	// obtenemos un archivo y luego otro sucesivamente
				if(!isset($_GET['autor'])){
					if(!is_file($autor) && $autor!="." && $autor!=".."){	// verificamos si es o no un directorio y descartamos . y ..
						echo "<a href='menu_cambiar.php?autor=$autor'>$autor</a><br/>";
					}
				}
				else{
					$autor=$_GET['autor'];
					
					$directorio=opendir("./img/galeria/$autor");
					
					while($obra=readdir($directorio)){	// obtenemos un archivo y luego otro sucesivamente
						if($obra!="." && $obra!=".."){	// descartamos . y ..
							//TODO: width mejor en CSS
							echo "<a href='./img/galeria/$autor/$obra'>
								<img src='./img/galeria/$autor/$obra' width=100px/></a><br/>";	// falla si lleva "" en el nombre
							$nombre_obra=explode(".",$obra);
							echo $nombre_obra[0]." ";
							
							// CAMBIAR IMAGEN DE CATEGORÍA
							//echo "<a href='cambiar_categoria.php?obra=./img/galeria/$autor/$obra'>Cambiar de categoría</a><br/><br/>";
							echo "<a href='seleccionar_categoria.php?obra=./img/galeria/$autor/$obra'>Cambiar de categoría</a><br/><br/>";
							
							//TODO: mover tb. txt licencia
						}
					}
				}
			}
			
		?>

	</body>
</html>