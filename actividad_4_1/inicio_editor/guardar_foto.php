<!doctype html>
<html lang="es">
	<head>
		<title>Actividad 4.1</title>	
		<meta charset="utf-8"/>
		<!--link rel="stylesheet" type="text/css" href="estilo.php"/-->
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
					echo "<br><a href='editor.php'>Volver a INICIO</a>";
				}
				else{
					// Ordenes SQL
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
							//TODO: cambiar 'echo' por 'header'
							// header("Location: editor.php");
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
					
					//TODO: actualizar en BBDD (UPDATE) y eliminar 
					// de carpeta img/usuario (SELECT y unlink)
					
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
			
			echo "<br/><a href='editor.php'>Volver a INICIO</a>";
		?>
	</body>
</html>
