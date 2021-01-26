<!doctype html>
<html lang="es">
	<head>
		<title>Actividad 4.2</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="estilo.css"/>	
	</head>
	<body>
	<?php  
			# La contraseña de acceso a la BBDD es un punto crítico de seguridad,
			# debemos escribirla en el menor número de archivos posibles.
			# La solución es crear un UNICO archivo con los datos de la conexión
			# y dentro la función que nos conecta a la BBDD
	
			# incluyo el fichero de conexion
			include("mysql.inc.php"); 
			
			# me conecto a MySQL Server
			conecta(); 

			if($c==null)
				echo "Fallo de conexion";
			else{
				// Conexión a la BBDD
				mysqli_select_db($c,"bddiwgeneradorcarteles");
				
				// Eliminación la foto del cartel
				// de la carpeta ./img/carteles/
				// creo la orden SQL (recogemos el path de la foto del cartel)
				$sql="SELECT foto FROM carteles WHERE id_cartel='".$_REQUEST['id_cartel']."'";
				
				// ejecuto la orden SQL
				$resultado=mysqli_query($c,$sql);
				
				// controlo si la orden SQL es correcta (en sintaxis)
				if($resultado){
					// orden SQL correcta
					
					// nos devuelve cuántas filas tiene $resultado
					$filas=mysqli_affected_rows($c);	// devuelve el nº de filas afectadas
					
					if($filas==0){
						echo "Sin resultados";
					}
					else{
						while($registro=mysqli_fetch_array($resultado)){
							// eliminamos la foto
							unlink($registro['foto']);
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
				
				// Eliminamos el cartel de la BBDD
				// creo la orden SQL
				$sql="DELETE FROM carteles WHERE id_cartel='".$_REQUEST['id_cartel']."'";
				
				// ejecuto la orden SQL
				$resultado=mysqli_query($c,$sql);
				
				// controlo si la orden SQL es correcta (en sintaxis)
				if($resultado){
					// orden SQL correcta
					
					// compruebo si se ejecutó el delete correctamente
					// compruebo las filas modificadas, al hacer un
					// delete habrá eliminado la fila inplicada de la
					// tabla
					$filas=mysqli_affected_rows($c);	// devuelve el nº de filas afectadas
					
					if($filas>0){
						//echo "Baja realizada!";
						header("Location: index.php");
						exit;
					}
					else{
						echo "Eliminación NO realizada!";
						echo "<br><a href='index.php'>Volver a INICIO</a>";
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
				
				mysqli_close($c);
			}	
		
	?>
	</body>
</html>