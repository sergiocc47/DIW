<!doctype html>
<html lang="es">
	<head>
		<title>Actividad 4.1</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="estilo.css"/>
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
		<div id="cabecera">
			<div id="logo">
				<img id="logo" src="./img/curriculum-vitae_custom.png"/>
			</div>
			<div id="nombre_cv">
				<h1><?php echo $nombre ?></h1>
			</div>
		</div>
		<div id="foto_usuario">
			<img src="<?php echo $foto ?>" alt="Foto de usuario"/><br/>
			<form method="post" action="form_foto.html">
				<input type="submit" class="boton_cambiar" name="cambiar_foto" value="CAMBIAR" />
			</form>
		</div>
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
			$miCK1['resize_enabled']=false;
			$miCK1['toolbar'] = array(
				array('Save','NewPage','DocProps','Preview','Maximize','Print','-','Templates'),
				array('Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo'),
				array('Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt'),
				array('Link','Unlink'),
				'/',
				array('Bold','Italic','Underline','Subscript','Superscript','-','RemoveFormat'),
				array('NumberedList','BulletedList','-','Outdent','Indent','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl'),
				array('Image','Table','HorizontalRule','SpecialChar'),
				'/',
				array('Styles','Format','Font','FontSize'),
				array('TextColor','BGColor')
			);
			$oCKeditor1->replace('fichero_personal',$miCK1);
			
			$miCK2['resize_enabled']=false;
			$miCK2['toolbar'] = array(
				array('Save','NewPage','DocProps','Preview','Maximize','Print','-','Templates'),
				array('Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo'),
				array('Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt'),
				array('Link','Unlink'),
				'/',
				array('Bold','Italic','Underline','Subscript','Superscript','-','RemoveFormat'),
				array('NumberedList','BulletedList','-','Outdent','Indent','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl'),
				array('Image','Table','HorizontalRule','SpecialChar'),
				'/',
				array('Styles','Format','Font','FontSize'),
				array('TextColor','BGColor')
			);
			$oCKeditor2->replace('fichero_formativo',$miCK2);
			
			$miCK3['resize_enabled']=false;
			$miCK3['toolbar'] = array(
				array('Save','NewPage','DocProps','Preview','Maximize','Print','-','Templates'),
				array('Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo'),
				array('Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt'),
				array('Link','Unlink'),
				'/',
				array('Bold','Italic','Underline','Subscript','Superscript','-','RemoveFormat'),
				array('NumberedList','BulletedList','-','Outdent','Indent','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl'),
				array('Image','Table','HorizontalRule','SpecialChar'),
				'/',
				array('Styles','Format','Font','FontSize'),
				array('TextColor','BGColor')
			);
			$oCKeditor3->replace('fichero_laboral',$miCK3);
		?>
	</body>
</html>