<!doctype html>
<html lang="es">
	<head>
		<title>Actividad 4.1</title>	
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="estilo.css"/>
	</head>
	<body>
		<?php
			$dir_subida="./img/usuario/"; 			
			
			$fichero_subido=$dir_subida.basename($_FILES['archivo']['name']);
			
			if(move_uploaded_file($_FILES['archivo']['tmp_name'], 
					$fichero_subido)){
						
				include("mysql.inc.php"); 
			
				// me conecto a MySQL Server
				conecta();
				
				if($c==null){
					echo "<p>Error de conexion</p>";
					echo "<br><a href='index.php'>Volver a INICIO</a>";
				}
				else{
					// Conexión a la BBDD
					mysqli_select_db($c,"bddiwcurriculumvitae");
					
					//TODO: realizar comprobación
					/*
					if($fichero_formativo!="SELECT formativo FROM cvs WHERE id_cv='1'"){
						echo "¿Desea actualizar la sección <b>PERSONAL</b> con la nueva información introducida?"
						//TODO: algo tipo confirm de JavaScript
						//********************************************************
						//********************* SEGUIR AQUÍ **********************
						//********************************************************
					}
					*/
					// Extraemos el path de la foto a sustituir
					// creo la orden SQL
					$sql_foto="SELECT foto FROM cvs WHERE id_cv='1'";
					
					// ejecuto la orden SQL
					$resultado_foto=mysqli_query($c,$sql_foto);
					
					// controlo si la orden SQL es correcta (en sintaxis)
					if($resultado_foto){
						// orden SQL correcta
						
						// nos devuelve cuántas filas tiene $resultado
						$filas_foto=mysqli_num_rows($resultado_foto);	// devuelve el nº de filas afectadas
						
						if($filas_foto==0){
							echo "Sin resultados";
						}
						else{
							// programamos un bucle que me mueva por
							// el resultado desde la primera fila hasta
							// la última
							
							// el fetch pasa la información a $registro y
							// avanza el puntero a la siguiente fila
							
							while($registro_foto=mysqli_fetch_array($resultado_foto)){
								echo "Path foto a sustituir".$registro_foto['foto'];
								echo "<br/>";
								$path_foto_sustituida=$registro_foto['foto'];
							}
						}
					}
					else{
						// orden SQL incorrecta. Incluido el error Duplicate key
						$error=mysqli_error($c);
						// lo correcto es enviar el error a un LOG y no
						// mostrar errores concretos por pantalla, pero mientras
						// programamos nos es útil verlo en pantalla
						echo $error;
					}
					
					
					// Actualizamos la foto de perfil
					// creo la orden SQL
					$sql="UPDATE cvs SET foto='$fichero_subido' WHERE id_cv='1'";	// prueba depuración
					
					// ejecuto la orden SQL
					$resultado=mysqli_query($c,$sql);
					
					// controlo si la orden SQL es correcta (en sintaxis)
					if($resultado){
						// orden SQL correcta
						$filas=mysqli_affected_rows($c);	// devuelve el nº de filas afectadas
						
						if($filas>0){
							echo "Modificación de la foto de perfil realizada!";
							// eliminamos la foto sustituida
							unlink($path_foto_sustituida);
							//TODO: cambiar 'echo' por 'header'
							// header("Location: index.php");
							// exit;
						}
						else{
							echo "Modificación de la foto de perfil no realizada!";
						}
					}
					else{
						// orden SQL incorrecta. Incluido el error Duplicate key
						$error=mysqli_error($c);
						// lo correcto es enviar el error a un LOG y no
						// mostrar errores concretos por pantalla, pero mientras
						// programamos nos es útil verlo en pantalla
						echo $error;
					}
					// cierro la conexion
					mysqli_close($c);
					
					/*
					//TODO: eliminar si innecesario
					header("Location: index.php");
					exit;
					*/
				}
			}
			else{
				echo "Error al subir foto de perfil.";
			}
			
			echo "<br/><a href='index.php'>Volver a INICIO</a>";
		?>
	</body>
</html>
