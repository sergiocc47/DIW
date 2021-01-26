<?php
	
	if(!isset($_GET['nuevo_titulo'])){
		echo "Error en parámetro 'Nuevo título'";
	}
	else {
		$nuevo_titulo=$_GET['nuevo_titulo'];
		
		if(empty($_GET['nuevo_titulo'])){
			echo "El parámetro 'Nuevo título' no puede estar vacío";
		}
		else{
			include("mysql.inc.php"); 
			
			// me conecto a MySQL Server
			conecta();
			
			if($c==null){
				echo "<p>Error de conexion</p>";
				//echo "<br><a href='index.php'>Volver a INICIO</a>";
			}
			else{
				// Ordenes SQL
				// Conexión a la BBDD
				mysqli_select_db($c,"bddiwpracticavideo");
				
				// creo la orden SQL
				$sql="UPDATE titulos SET titulo='".$_GET['nuevo_titulo']."' WHERE id_titulo='1'";	// prueba depuración
				
				// ejecuto la orden SQL
				$resultado=mysqli_query($c,$sql);
				
				// controlo si la orden SQL es correcta (en sintaxis)
				if($resultado){
					// orden SQL correcta
					$filas=mysqli_affected_rows($c);	// devuelve el nº de filas afectadas
					
					if($filas>0){
						echo "Modificación de título realizada!";
					}
					else{
						echo "Modificación de título NO realizada!";
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
				header("Location: index.php");
				exit;
				*/
			}
		}
	}
	echo "<br><a href='index.php'>Volver a INICIO</a>";
	
?>