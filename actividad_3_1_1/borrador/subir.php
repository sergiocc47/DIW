<!doctype html>
<html lang="es">
	<head>		
		<meta charset="utf-8"/>
		<title>Actividad 3.1.1</title>		
	</head>
	
	<body>
		<?php
		
			if(!isset($_POST['autor'])){
				echo "Error, debe seleccionar una categoría.";
			}
			else if(!isset($_POST['nombre_obra'])){
				echo "Error, debe introducir el nombre de la obra.";
			}
			else if(!isset($_POST['tipo_licencia'])){
				echo "Error, introducir el tipo de licencia.";
			}
			else{
				$autor=$_POST['autor'];
				
				$nombre_obra=$_POST['nombre_obra'];
				$tipo_licencia=$_POST['tipo_licencia'];
				
				$dir_subida="./img/galeria/$autor/"; 			
				
				$fichero_subido=$dir_subida.basename($_FILES['archivo']['name']);
				
				if(move_uploaded_file($_FILES['archivo']['tmp_name'], 
						$fichero_subido)){
					// Extraemos la extensión del archivo subido
					$extension=explode(".",$fichero_subido);
					// Renombramos archivo subido con el nombre introducido
					rename($fichero_subido,"./img/galeria/$autor/$nombre_obra.$extension[2]");
					
					// CREACIÓN FICHERO DATOS OBRA (nombre_obra.txt y licencia)
					$f1=fopen("./img/galeria/$autor/$nombre_obra.txt","w");
					fwrite($f1,"$tipo_licencia");
					fclose($f1);
					
					echo "Obra <b>$nombre_obra</b> subida a la categoría <b>$autor</b>!";
				}
				else{
					echo "Error al subir obra.";
				}
			}
			
		?>
		<br/>
		<a href="index.php">Volver a GALERÍA</a>
	</body>
</html>
