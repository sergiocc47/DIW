<!doctype html>
<html lang="es">
	<head>		
		<meta charset="utf-8"/>
		<title>Actividad 3.1.1</title>		
	</head>
	
	<body>
		<?php
			$autor=$_GET['autor'];
			
			$dir_subida="./img/$autor/"; 			
			
			$fichero_subido=$dir_subida.basename($_FILES['archivo']['name']);
			
			if(move_uploaded_file($_FILES['archivo']['tmp_name'], 
					$fichero_subido)){				
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
