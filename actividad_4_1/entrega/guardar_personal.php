<?php
	if(!isset($_REQUEST['fichero_personal'])){
		echo "Error, falta el parámetro 'PERSONAL'";
	}
	else{
		$fichero_personal=htmlspecialchars($_REQUEST['fichero_personal']);
		
		if(empty($fichero_personal)){
			echo "El elemento 'PERSONAL' no puede estar vacío";
		}
		else{
			include("mysql.inc.php"); 
			
			// me conecto a MySQL Server
			conecta();
			
			if($c==null){
				echo "<p>Error de conexion</p>";
			}
			else{
				// Conexión a la BBDD
				mysqli_select_db($c,"bddiwcurriculumvitae");
				
				// creo la orden SQL
				$sql="UPDATE cvs SET personal='$fichero_personal' WHERE id_cv='1'";	// prueba depuración
				
				// ejecuto la orden SQL
				$resultado=mysqli_query($c,$sql);
				
				// controlo si la orden SQL es correcta (en sintaxis)
				if($resultado){
					// orden SQL correcta
					$filas=mysqli_affected_rows($c);	// devuelve el nº de filas afectadas
					
					if($filas>0){
						// cierro la conexion
						mysqli_close($c);
						
						header("Location: index.php");
						exit;
					}
					else{
						echo "Modificación de la sección <b>PERSONAL</b> no realizada!";
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
			}
		}
	}
	echo "<br><a href='index.php'>Volver a INICIO</a>";
	
?>