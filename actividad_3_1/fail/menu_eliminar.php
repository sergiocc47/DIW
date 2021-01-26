<!doctype html>
<html lang="es">
	<head>
		<title>Universidad de Cádiz</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" type="text/css" href="estilo.css"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Graduate"/>
	</head>
	<body>
		<!-- CABECERA -->
		<?php
			include "cabecera.inc.php";
		?>
		<!-- BARRA DE NAVEGACIÓN -->
		<?php
			include "utilidades.inc.php";
		?>
		</div>
		<div id="cuerpo">
			<h1>ELIMINAR IMAGEN</h1>
			<?php
				//FAIL: prueba tipo galeria_autor
				// Menú principal
				echo "<div id='menu_principal'>";
				$directorio=opendir("./img/galeria"); // ruta actual
				
				//echo "<ul id='lista_autores'>";	//FAIL: muestra autor y marcador duplicado
				
				while($autor=readdir($directorio)){	// obtenemos un archivo y luego otro sucesivamente
					if(!is_file($autor) && $autor!="." && $autor!=".."){	// verificamos si es o no un directorio y descartamos . y ..
						echo "<a class='item_autor' href='galeria_autor.php?autor=$autor'>$autor</a><br/>";
					}
				}
				echo "</div>";
				// FIN Menú principal
				
				$directorio=opendir("./img/galeria"); // ruta actual
				
				/*while($autor=readdir($directorio)){	// obtenemos un archivo y luego otro sucesivamente
					if(!isset($_GET['autor'])){
						if(!is_file($autor) && $autor!="." && $autor!=".."){	// verificamos si es o no un directorio y descartamos . y ..
							echo "<a href='menu_eliminar.php?autor=$autor'>$autor</a><br/>";
						}
					}
					else{*/
						$autor=$_GET['autor'];
						
						$directorio=opendir("./img/galeria/$autor");
						
						while($obra=readdir($directorio)){	// obtenemos un archivo y luego otro sucesivamente
							if($obra!="." && $obra!=".." && substr($obra,-4)!=".txt"){	// descartamos directorios . y .. y archivos .txt
								//TODO: width mejor en CSS
								echo "<a href='./img/galeria/$autor/$obra'>
									<img src='./img/galeria/$autor/$obra' width=100px/></a><br/>";	// falla si lleva "" en el nombre
								$nombre_obra=explode(".",$obra);
								echo $nombre_obra[0]." ";
								
								// Mostramos el link para eliminar la imagen
								echo "<a href='eliminar.php?obra=./img/galeria/$autor/$obra'>Eliminar</a><br/><br/>";
							}
						}
					//}
				//}
				
			?>
		</div>
	</body>
</html>