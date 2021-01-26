<?php
	//echo $_REQUEST['campo'];
	//print_r($_REQUEST);	// devuelve el array del formulario (1 textbox/posicionArray)
	//echo "<br/>";
	
	if(!isset($_REQUEST['titulo'])){
		echo "Error, falta el parámetro 'TÍTULO'";
	}
	else if(!isset($_REQUEST['ponente'])){
		echo "Error, falta el parámetro 'PONENTE'";
	}
	else if(!isset($_REQUEST['lugar'])){
		echo "Error, falta el parámetro 'LUGAR'";
	}
	else if(!isset($_REQUEST['fecha'])){
		echo "Error, falta el parámetro 'FECHA'";
	}
	/*
	//TODO: incluir cuando se solucione subida de foto (gestionar si se sube o no -> opcional)
	else if(!isset($_REQUEST['foto'])){
		echo "Error, falta el parámetro 'FOTO'";
	}
	*/
	else if(!isset($_REQUEST['texto_explicativo'])){
		echo "Error, falta el parámetro 'TEXTO EXPLICATIVO'";
	}
	else if(!isset($_REQUEST['color_fondo'])){
		echo "Error, falta el parámetro 'COLOR DE FONDO'";
	}
	else{
		$titulo=$_REQUEST['titulo'];
		$ponente=$_REQUEST['ponente'];
		$lugar=$_REQUEST['lugar'];
		$fecha=$_REQUEST['fecha'];
		//TODO: incluir cuando se solucione subida de foto (gestionar si se sube o no -> opcional)
		//$foto=$_REQUEST['foto'];
		//TODO: eliminar cuando se solucione subida de foto (gestionar si se sube o no -> opcional)
		//$foto="URL foto";
		$texto_explicativo=$_REQUEST['texto_explicativo'];
		$color_fondo=$_REQUEST['color_fondo'];
		
		if(empty($titulo)){
			echo "El elemento 'TÍTULO' no puede estar vacío";
		}
		else if(empty($ponente)){
			echo "El elemento 'PONENTE' no puede estar vacío";
		}
		else if(empty($lugar)){
			echo "El elemento 'LUGAR' no puede estar vacío";
		}
		else if(empty($fecha)){
			echo "El elemento 'FECHA' no puede estar vacío";
		}
		/*
		// TODO (eliminar): no es un campo obligatorio
		else if(empty($foto)){
			echo "El elemento 'FOTO' no puede estar vacío";
		}
		*/
		else if(empty($texto_explicativo)){
			echo "El elemento 'TEXTO EXPLICATIVO' no puede estar vacío";
		}
		else if(empty($color_fondo)){
			echo "El elemento 'COLOR DE FONDO' no puede estar vacío";
		}
		else{
			include("mysql.inc.php"); 
			
			// me conecto a MySQL Server
			conecta();
			
			if($c==null){
				echo "<p>Error de conexion</p>";
				echo "<br><a href='editor.php'>Volver a INICIO</a>";
			}
			else{
				// Conexión a la BBDD
				mysqli_select_db($c,"bddiwgeneradorcarteles");
				
				// $_FILES contiene la información del archivo que se ha subido al servidor
				$nombretmp=$_FILES['foto']['tmp_name']; // nombre temporal del archivo		

				// compruebo que se haya subido una foto
				if ($nombretmp!=null){
					
					$dir_subida="./img/carteles/";
					$fichero_subido=$dir_subida.basename($_FILES['foto']['name']);
					if (move_uploaded_file($_FILES['foto']['tmp_name'], $fichero_subido)){
						$sql="INSERT INTO carteles VALUES ('0','$titulo','$ponente','$lugar','$fecha','$fichero_subido','$texto_explicativo','$color_fondo')";
					}
					else{
						echo "Error al mover el archivo temporal";
					}	
				}
				else{
					$sql="INSERT INTO carteles VALUES ('0','$titulo','$ponente','$lugar','$fecha',null,'$texto_explicativo','$color_fondo')";
				}
				/*
				//TODO: comprobar cuando se solucione subida de foto (gestionar si se sube o no -> opcional)
				$sql="INSERT INTO carteles VALUES ('0','$titulo','$ponente','$lugar','$fecha','$foto','$texto_explicativo','$color_fondo')";
				*/
				// ejecuto la orden SQL
				$resultado=mysqli_query($c,$sql);
				
				// controlo si la orden SQL es correcta (en sintaxis)
				if($resultado){
					// orden SQL correcta
					$filas=mysqli_affected_rows($c);	// devuelve el nº de filas afectadas
					
					if($filas>0){
						//echo "Alta de cartel realizada!";
						header("Location: index.php");
						exit;
					}
					else{
						echo "Alta de cartel NO realizada!";
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