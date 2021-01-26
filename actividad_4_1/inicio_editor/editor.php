<!doctype html>
<html lang="es">
	<head>
		<title>Actividad 4.1</title>
		<meta charset="utf-8"/>
		<!--link rel="stylesheet" type="text/css" href="estilo.php"/-->	<!-- Si CSS, referenciar -->
	</head>
	<body>
		<?php
			
			include("mysql.inc.php"); 
					
					// me conecto a MySQL Server
					conecta();
					
					if($c==null){
						echo "<p>Error de conexion</p>";
					}
					else{
						// Ordenes SQL
						// Conexión a la BBDD
						mysqli_select_db($c,"bddiwcurriculumvitae");
						
						// creo la consulta para mostrar el título
						$sql="SELECT nombre,foto,personal,formativo,laboral FROM cvs WHERE id_cv='1'";
						
						// ejecuto la orden SQL
						$resultado=mysqli_query($c,$sql);
						
						if($resultado){
							// orden SQL correcta
					
							// nos devuelve cuántas filas tiene $resultado
							$filas=mysqli_num_rows($resultado);	// devuelve el nº de filas afectadas
							
							if($filas==0){
								echo "Sin resultados";
								//TODO ¿location?
							}
							else{
								// programamos un bucle que me mueva por
								// el resultado desde la primera fila hasta
								// la última
								
								// el fetch pasa la información a $registro y
								// avanza el puntero a la siguiente fila
								
								while($registro=mysqli_fetch_array($resultado)){
									/*
									//TODO: eliminar (depuración)
									echo "<p><b>DATOS CARGADOS DESDE BDDIWCURRICULUMVITAE</b></p>";
									echo $registro['nombre']."<br/>";
									echo $registro['foto']."<br/>";
									echo $registro['personal']."<br/>";
									echo $registro['formativo']."<br/>";
									echo $registro['laboral']."<br/>";
									*/
									
									// guardamos los datos de la BBDD en variables
									$nombre=$registro['nombre'];
									$foto=$registro['foto'];
									$personal=$registro['personal'];
									$formativo=$registro['formativo'];
									$laboral=$registro['laboral'];
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
						
						// cierro la conexion
						mysqli_close($c);
					}
			
			
		?>
		
		<h1>CURRICULUM VITAE</h1>
		<h2><?php echo $nombre ?></h2>
		<form method="post" action="form_foto.php">
			<img src="<?php echo $foto ?>" alt="Foto de usuario"/>
			<input type="submit" name="cambiar_foto" value="CAMBIAR" />
		</form>
		<!--
			TODO: para controlar que sólo se envíe la modificación del cuadro 
			o cuadros deseados crear una funcionalidad tipo:
				if(cuadroXmodificado){
					solicitar confirmación;
					if(confirmado){
						se guarda;
					}
				}
		-->
		<?php
			include('./ckeditor/ckeditor.php');
			$oCKeditor1=new CKeditor();
			$oCKeditor2=new CKeditor();
			$oCKeditor3=new CKeditor();
		?>
		<form method='post' action='guardar_personal.php'>	<!-- El botón 'Guardar' (diskette) funciona como submit -->
			<h2>PERSONAL</h2>
			<textarea name='fichero_personal'><?php echo $personal ?></textarea>
		</form>
		<form method='post' action='guardar_formativo.php'>
			<h2>FORMATIVO</h2>
			<textarea name='fichero_formativo'><?php echo $formativo ?></textarea>
		</form>
		<form method='post' action='guardar_laboral.php'>
			<h2>LABORAL</h2>
			<textarea name='fichero_laboral'><?php echo $laboral ?></textarea>
		</form>
		<?php
			// $miCK1['width']='600';	// ancho del HTML (sólo caja, excluyendo menú CK editor)
			// $miCK1['height']='400';	// alto del HTML (sólo caja, excluyendo menú CK editor)
			// $miCK1['resize_enabled']=false;	// elimina la opción de redimensionar
			// $oCKeditor1->replace('fichero1',$miCK1);
			$oCKeditor1->replace('fichero_personal');	// se ajusta a ancho de pantalla
			
			// $miCK2['width']='600';	// ancho del HTML (sólo caja, excluyendo menú CK editor)
			// $miCK2['height']='400';	// alto del HTML (sólo caja, excluyendo menú CK editor)
			// $miCK2['resize_enabled']=false;	// elimina la opción de redimensionar
			// $oCKeditor2->replace('fichero2',$miCK2);
			$oCKeditor2->replace('fichero_formativo');	// se ajusta a ancho de pantalla
			
			// $miCK3['width']='600';	// ancho del HTML (sólo caja, excluyendo menú CK editor)
			// $miCK3['height']='400';	// alto del HTML (sólo caja, excluyendo menú CK editor)
			// $miCK3['resize_enabled']=false;	// elimina la opción de redimensionar
			// $oCKeditor3->replace('fichero3',$miCK3);
			$oCKeditor3->replace('fichero_laboral');	// se ajusta a ancho de pantalla
		?>
		<!-- TODO: botón submit para mandar cambios a 'Enviar' -->
	</body>
</html>