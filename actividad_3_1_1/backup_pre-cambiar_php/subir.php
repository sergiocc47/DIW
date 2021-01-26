<!doctype html>
<html lang="es">
	<head>		
		<meta charset="utf-8"/>
		<title>Actividad 3.1.1</title>		
	</head>
	
	<body>
		<?php
			$autor=$_POST['autor'];
			
			$nombre_obra=$_POST['nombre_obra'];
			$tipo_licencia=$_POST['tipo_licencia'];
			
			$dir_subida="./img/galeria/$autor/"; 			
			
			$fichero_subido=$dir_subida.basename($_FILES['archivo']['name']);
			
			if(move_uploaded_file($_FILES['archivo']['tmp_name'], 
					$fichero_subido)){
				// CREACIÓN FICHERO DATOS OBRA (nombre y licencia)
				$f1=fopen("./img/galeria/$autor/$nombre_obra.txt","w");
				fwrite($f1,"$nombre_obra:$tipo_licencia:\r\n");
				fclose($f1);
				
				echo "Subido!";
			}
			else{
				echo "Error";
			}				
		?>
		<br/>
		<a href="index.php">Volver</a>
	</body>
</html>
