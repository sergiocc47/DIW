<!doctype html>
<html lang="es">
	<head>
		<title>Actividad 4.2</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="estilo.css"/>
	</head>
	<body>
		<!-- TODO (mejora): mandar por get el cartel -->
		<!-- si hay cartel -> edicion -->
		<!-- si NO hay cartel -> nuevo -->
		<?php
			
			// Faltan validaciones (isset, etc.)
			$id_cartel=$_REQUEST['id_cartel'];
			
			include("mysql.inc.php"); 
					
			// me conecto a MySQL Server
			conecta();
			
			if($c==null){
				echo "<p>Error de conexion</p>";
			}
			else{
				// Conexión a la BBDD
				mysqli_select_db($c,"bddiwgeneradorcarteles");
				
				// creo la consulta para mostrar el título
				$sql="SELECT titulo,ponente,lugar,fecha,foto,texto_explicativo,color_fondo FROM carteles WHERE id_cartel='$id_cartel'";
				
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
							$titulo=$registro['titulo'];
							$ponente=$registro['ponente'];
							$lugar=$registro['lugar'];
							$fecha=$registro['fecha'];
							$foto=$registro['foto'];
							$texto_explicativo=$registro['texto_explicativo'];
							$color_fondo=$registro['color_fondo'];
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
		<!-- TODO: estilo en CSS -->
		<div id="cabecera">
			<div id="logo">
				<img id="logo" src="./img/conference.png"/>
			</div>
			<div id="titulo_cartel">
				<h1>GENERADOR DE CARTELES</h1>
			</div>
		</div>
		<?php
			include("./ckeditor/ckeditor.php");
			$oCKeditor1=new CKeditor();
			$oCKeditor2=new CKeditor();
			
			// NOTA: pasamos el path de la foto que vamos a sustituir
			// para eliminarla con unlink() de la carpeta ./img/carteles
			echo "<form method='post' enctype='multipart/form-data' 
			action='guardar_editado.php?id_cartel=$id_cartel&foto=$foto'>";
		?>
		
			<h2>TÍTULO</h2>
			<input type="text" name="titulo" value="<?=$titulo?>"/>
			<h2>PONENTES</h2>
			<textarea name="ponente"><?=$ponente?></textarea>
			<h2>LUGAR</h2>
			<input type="text" name="lugar" value="<?=$lugar?>"/>
			<h2>FECHA</h2>
			<input type="date" name="fecha" value="<?=$fecha?>"/>
			<!-- TODO: carga mediante form_foto.html y guardar_foto.php -->
			<h2>FOTO</h2>
			<img src="<?=$foto?>"/><br/>
			<h3>CAMBIAR FOTO</h3>
			<input type="file" name="foto_nueva">
			<h2>TEXTO EXPLICATIVO</h2>
			<textarea name="texto_explicativo"><?=$texto_explicativo?></textarea>
			<h2>COLOR DE FONDO</h2>
			<input type="color" name="color_fondo" value="<?=$color_fondo?>"/>
			<br/>
			<br/>
			<input type="submit" class="boton_editor" name="guardar" value="GUARDAR" />
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
			$oCKeditor1->replace('ponente',$miCK1);
			
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
			$oCKeditor2->replace('texto_explicativo',$miCK2);
			
		?>
	</body>
</html>