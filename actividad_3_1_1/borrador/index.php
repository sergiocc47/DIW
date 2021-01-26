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
					<img src="./img/logo.gif"/>
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

		<h1>GALERÍA</h1>
		
		<?php

			$directorio=opendir("./img/galeria"); // ruta actual
			
			while($autor=readdir($directorio)){	// obtenemos un archivo y luego otro sucesivamente
				if(!isset($_GET['autor'])){
					if(!is_file($autor) && $autor!="." && $autor!=".."){	// verificamos si es o no un directorio y descartamos . y ..
						echo "<a href='index.php?autor=$autor'>$autor</a><br/>";
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
			
		?>

	</body>
</html>