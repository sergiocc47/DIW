<?php
	//echo $_REQUEST['fichero'];
	print_r($_REQUEST);	// devuelve el array del formulario (1 textbox/posicionArray)
	echo "<br/>";
	
	//TODO (corrección): el botón guardar envía todos los textarea,
	// no sólo el del textarea pulsado
	/*
	TODO: para controlar que sólo se envíe la modificación del cuadro 
	o cuadros deseados crear una funcionalidad tipo:
		if(cuadroXmodificado){
			solicitar confirmación;
			if(confirmado){
				se guarda;
			}
		}
	*/
	
	//TODO: revisar si mandamos a index (editor) desde cada isset
	if(!isset($_REQUEST['fichero_laboral'])){
		echo "Error, falta el parámetro 'LABORAL'";
	}
	else{
		$fichero_laboral=$_REQUEST['fichero_laboral'];
		
		if(empty($fichero_laboral)){
			echo "El elemento 'LABORAL' no puede estar vacío";
		}
		else{
			include("mysql.inc.php"); 
			
			// me conecto a MySQL Server
			conecta();
			
			if($c==null){
				echo "<p>Error de conexion</p>";
				echo "<br><a href='index.php'>Volver a INICIO</a>";
			}
			else{
				// Ordenes SQL
				// Conexión a la BBDD
				mysqli_select_db($c,"bddiwcurriculumvitae");
				/*
				if($fichero_laboral!="SELECT laboral FROM cvs WHERE id_cv='1'"){
					echo "¿Desea actualizar la sección <b>LABORAL</b> con la nueva información introducida?"
					//TODO: algo tipo confirm de JavaScript
					//********************************************************
					//********************* SEGUIR AQUÍ **********************
					//********************************************************
				}
				*/
				// creo la orden SQL
				$sql="UPDATE cvs SET laboral='$fichero_laboral' WHERE id_cv='1'";	// prueba depuración
				
				// ejecuto la orden SQL
				$resultado=mysqli_query($c,$sql);
				
				// controlo si la orden SQL es correcta (en sintaxis)
				if($resultado){
					// orden SQL correcta
					$filas=mysqli_affected_rows($c);	// devuelve el nº de filas afectadas
					
					if($filas>0){
						echo "Modificación de la sección <b>LABORAL</b> realizada!";
						//TODO: cambiar 'echo' por 'header'
						// header("Location: index.php");
						// exit;
					}
					else{
						echo "Modificación de la sección <b>LABORAL</b> no realizada!";
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