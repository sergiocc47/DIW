<!doctype html>
<html lang="es">
	<head>		
		<meta charset="utf-8"/>
		<title> Titulo </title>		
	</head>
	
	<body>
	
		<?php 
			$dir_subida = "./musica/";
			
			$nombreArchivo=basename($_FILES['archivo']['name']);
			$ruta = $dir_subida.$nombreArchivo;

			if (move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta )){				
               
                    echo "cancion subida correctamente!<br/>";
                    echo "<a href='index.php'>Volver";
                
			}
			else {
				echo "Error en el envío de la cancion";
			}
			
		?>

	</body>
</html>