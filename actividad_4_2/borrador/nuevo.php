<!doctype html>
<html lang="es">
	<head>
		<title>Actividad 4.2</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="estilo.css"/>
	</head>
	<body>
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
		?>
		<form method="post" action="guardar_nuevo.php" enctype="multipart/form-data">
			<h2>TÍTULO</h2>
			<input type="text" name="titulo" value=""/>
			<h2>PONENTES</h2>
			<textarea name="ponente"></textarea>
			<h2>LUGAR</h2>
			<input type="text" name="lugar" value=""/>
			<h2>FECHA</h2>
			<input type="date" name="fecha" value=""/>
			<h3>AÑADIR FOTO</h3>
			<input type="file" name="foto" value=""/>
			<h2>TEXTO EXPLICATIVO</h2>
			<textarea name="texto_explicativo"></textarea>
			<h2>COLOR DE FONDO</h2>
			<input type="color" name="color_fondo" value="#ffffff"/>
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