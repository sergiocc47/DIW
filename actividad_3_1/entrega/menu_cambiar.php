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
			<p class="titulo_cuerpo">Cambiar imagen de categoría</p>
			<?php
					
				$directorio=opendir("./img/galeria"); // ruta actual
				
				while($autor=readdir($directorio)){	// obtenemos un archivo y luego otro sucesivamente
					if(!isset($_GET['autor'])){
						if(!is_file($autor) && $autor!="." && $autor!=".."){	// verificamos si es o no un directorio y descartamos . y ..
							echo "<li class='item_autor'><a href='menu_cambiar.php?autor=$autor'>$autor</a></li>";
						}
					}
					else{
						$autor=$_GET['autor'];
						
						$directorio=opendir("./img/galeria/$autor");
						
						while($obra=readdir($directorio)){	// obtenemos un archivo y luego otro sucesivamente
							if($obra!="." && $obra!=".." && substr($obra,-4)!=".txt"){	// descartamos directorios . y .. y archivos .txt
								//TODO: width mejor en CSS
								echo "<a href='./img/galeria/$autor/$obra'>
									<img class='imagen_obra' src='./img/galeria/$autor/$obra' width=100px/></a><br/>";	// ¡OJO! Falla si lleva "" en el nombre
								$nombre_obra=explode(".",$obra);
								echo $nombre_obra[0]." ";
								
								// Mostramos el link para cambiar la imagen de categoría
								echo "<a href='seleccionar_categoria.php?obra=./img/galeria/$autor/$obra'>Cambiar de categoría</a><br/><br/>";
							}
						}
					}
				}
				
			?>
		</div>
		<!-- PIE DE PÁGINA -->
		<?php
			include "pie_de_pagina.inc.php";
		?>
	</body>
</html>