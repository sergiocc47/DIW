<!doctype html>
<html lang="es">
	<head>
		<title>Universidad de Cádiz</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" type="text/css" href="estilo.css"/>
	</head>
	<body>
		<!-- CABECERA -->
		<?php
			include "cabecera.inc.php";
		?>
		<div id="cuerpo">
			<!-- BARRA DE NAVEGACIÓN -->
			<?php
				include "utilidades.inc.php";
			?>

		<!-- TODO: ¿incluir h1 en div cuerpo? -->
		<h1>GALERÍA</h1>
		<!-- TODO: incluir php en div cuerpo y mostrar menú autores de forma estática -->
		<?php

			$directorio=opendir("./img/galeria"); // ruta actual
			
			
			echo "<div id='menu_categoria'><ul>";
					
			while($autor=readdir($directorio)){	// obtenemos un archivo y luego otro sucesivamente
				if(!isset($_GET['autor'])){
					if(!is_file($autor) && $autor!="." && $autor!=".."){	// verificamos si es o no un directorio y descartamos . y ..
						echo "<li><a href='index.php?autor=$autor'>$autor</a><li/>";
					}
				}
				else{
					$autor=$_GET['autor'];
					
					$directorio=opendir("./img/galeria/$autor");
					
					echo "<h1>$autor</h1>";	// mostramos el nombre del autor
					
					while($obra=readdir($directorio)){	// obtenemos un archivo y luego otro sucesivamente
						if($obra!="." && $obra!=".." && substr($obra,-4)!=".txt"){	// descartamos directorios . y .. y archivos .txt
							//TODO: width mejor en CSS
							echo "<a href='./img/galeria/$autor/$obra'>
								<img src='./img/galeria/$autor/$obra' width=100px/></a><br/>";	// falla si lleva ' (simple o doble) en el nombre
							$nombre_obra=explode(".",$obra);
							echo $nombre_obra[0]." ";	// mostramos el nombre de la obra
							
							// Mostramos el link para descargar la imagen
							echo "<a href='descargar.php?obra=./img/galeria/$autor/$obra'>Descargar</a><br/>";
							
							// Controlamos excepciones al trabajar con ficheros
							try{
								// compruebo si el fichero existe
								if (file_exists("./img/galeria/$autor/$nombre_obra[0].txt")){
									// Mostramos el tipo de licencia
									$f1=fopen("./img/galeria/$autor/$nombre_obra[0].txt","r");
									$licencia=fgets($f1);
									echo $licencia."<br/><br/>";
								}
								else{
									echo "Falta la licencia";
								}
							}
							catch (Exception $e){
								echo $e->getMessage();
							}
						}
					}
				}
			}
			echo "</ul></div>";
			
		?>
		
		</div>
	</body>
</html>