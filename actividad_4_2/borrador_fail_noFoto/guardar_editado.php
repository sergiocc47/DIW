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
		$id_cartel=$_REQUEST['id_cartel'];
		$titulo=$_REQUEST['titulo'];
		$ponente=$_REQUEST['ponente'];
		$lugar=$_REQUEST['lugar'];
		$fecha=$_REQUEST['fecha'];
		//TODO: incluir cuando se solucione subida de foto (gestionar si se sube o no -> opcional)
		//$foto=$_REQUEST['foto'];
		//TODO: eliminar cuando se solucione subida de foto (gestionar si se sube o no -> opcional)
		//$foto="URL foto";
		//$cambio_foto=$_REQUEST['cambio_foto'];
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
			
			/*
			if($cambio_foto=="si"){
				// header("Location: form_foto_editado.php?id_cartel=$id_cartel");
				// header("Location: form_foto_editado.php");
				// exit;
				
				// echo "<form action='guardar_foto_editado.php?id_cartel=$id_cartel' method='post' 
				echo "<form action='guardar_foto_editado.php?id_cartel=$id_cartel' method='post' 
					enctype='multipart/form-data'>
					Seleccionar imagen
					<input name='archivo' type='file'/><br/>
					<input type='submit' value='Subir'/>";
			}
			else{
			*/
			
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
				$nombretmp=$_FILES['foto_nueva']['tmp_name']; // nombre temporal del archivo

				// compruebo que se haya subido una foto
				if ($nombretmp!=null){
					
					$dir_subida="./img/carteles/";
					$fichero_subido=$dir_subida.basename($_FILES['foto_nueva']['name']);
					if (move_uploaded_file($_FILES['foto_nueva']['tmp_name'], $fichero_subido)){
						$sql="UPDATE carteles 
							SET titulo='$titulo',
								ponente='$ponente',
								lugar='$lugar',
								fecha='$fecha',
								foto='$fichero_subido',
								texto_explicativo='$texto_explicativo',
								color_fondo='$color_fondo'
							WHERE id_cartel='$id_cartel'";
						
						// eliminamos la foto de la carpeta
						unlink($_REQUEST['foto']);
					}
					else{
						echo "Error al mover el archivo temporal";
					}	
				}
				else{
					$sql="UPDATE carteles 
							SET titulo='$titulo',
								ponente='$ponente',
								lugar='$lugar',
								fecha='$fecha',
								foto=null,
								texto_explicativo='$texto_explicativo',
								color_fondo='$color_fondo'
							WHERE id_cartel='$id_cartel'";
				}
				/*
				// creo la orden SQL
				$sql="UPDATE carteles 
					SET titulo='$titulo',
					ponente='$ponente',
					lugar='$lugar',
					fecha='$fecha',
					foto='$foto',
					texto_explicativo='$texto_explicativo',
					color_fondo='$color_fondo'
					WHERE id_cartel='$id_cartel'";
					*/
				// ejecuto la orden SQL
				$resultado=mysqli_query($c,$sql);
				
				// controlo si la orden SQL es correcta (en sintaxis)
				if($resultado){
					// orden SQL correcta
					$filas=mysqli_affected_rows($c);	// devuelve el nº de filas afectadas
					
					if($filas>0){
						echo "Modificación de cartel realizada!";	// para editado
						// echo "Alta de cartel realizada!";	// para nuevo
						//TODO: cambiar 'echo' por 'header'
						// header("Location: editor.php");
						// exit;
					}
					else{
						echo "Modificación de cartel NO realizada!";	// para editado
						// echo "Alta de cartel NO realizada!";		// para nuevo
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
				header("Location: editor.php");
				exit;
				*/
			}
			//}//fin else cambio_foto=no
		}
	}
	echo "<br><a href='index.php'>Volver a INICIO</a>";
	
?>