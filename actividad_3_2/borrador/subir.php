<!doctype html>
<html lang="es">
	<head>		
		<meta charset="utf-8"/>
		<title>Actividad 3.2</title>		
	</head>
	
	<body>
		<?php
			if(!isset($_REQUEST['titulo'])){
				echo "Error, falta el parámetro 'Título'.";
			}
			else if(!isset($_REQUEST['artista'])){
				echo "Error, falta el parámetro 'Artista'.";
			}
			else{
				$titulo=$_REQUEST['titulo'];
				$artista=$_REQUEST['artista'];
				
				// Solamente comprobamos si se recibe el título ya que
				// estimamos que el artista no es imprescindible e
				// incluso podría no conocerse
				if(empty($titulo)){
					echo "Error, el parámetro 'Título' no puede estar vacío.";
				}
				else{
					// si no se introduce artista
					if($artista=="" || $artista==null){
						$artista="Artista desconocido";
					}
					
					$dir_subida="./media/"; 			
					
					$cancion_subida=$dir_subida.basename($_FILES['cancion']['name']);
					
					if(move_uploaded_file($_FILES['cancion']['tmp_name'], $cancion_subida)){
						// Extraemos la extensión de la canción subida
						$extension=explode(".",$cancion_subida);
						// Renombramos la canción subida con el título introducido
						rename($cancion_subida,"./media/$artista - $titulo.$extension[2]");
						
						//echo "Canción <b>$titulo</b> de <b>$artista</b> subida a la lista de reproducción!";
						header('Location: index.php');
						exit;
					}
					else{
						echo "Error, debe seleccionar una canción.";
					}
				}
			}
		?>
		<br/>
		<a href="index.php">Volver a LISTA DE REPRODUCCIÓN</a>
	</body>
</html>
