<!doctype html>
<html lang='es'>
	<head>
		<title>Actividad 4.1</title>
		<meta charset='utf-8'/>
		<!--link rel="stylesheet" type="text/css" href="estilo.php"/-->	<!-- Si CSS, referenciar -->
	</head>
	<body>
		<h1>CURRICULUM VITAE</h1>
		<?php
			include('./ckeditor/ckeditor.php');
			$oCKeditor1=new CKeditor();	// o = nueva instancia
			$oCKeditor2=new CKeditor();	// o = nueva instancia
			$oCKeditor3=new CKeditor();	// o = nueva instancia
		?>
		<h2>PERSONAL</h2>
		<form method='post' action='guardar.php'>	<!-- El botón 'Guardar' (diskette) funciona como submit -->
			<textarea name='fichero1'>PERSONAL</textarea>
		</form>
		<?php
			$miCK['width']='1500';	// ancho del HTML (sólo caja, excluyendo menú CK editor)
			$miCK['height']='200';	// alto del HTML (sólo caja, excluyendo menú CK editor)
			$miCK['resize_enabled']=false;	// elimina la opción de redimensionar
			//$miCK['uiColor']='red';	// colorea la interfaz de usuario
			//$miCK['skin']='office2003';	// cambia la skin
			
			// Navegar en URL a directorio 'samples': para mostrar ejemplos
			//http://localhost/diw/actividad_ckeditor/ckeditor/_samples/
			$oCKeditor1->replace('fichero1',$miCK);
		?>
		<h2>FORMATIVO</h2>
		<form method='post' action='guardar.php'>	<!-- El botón 'Guardar' (diskette) funciona como submit -->
			<textarea name='fichero2'>FORMATIVO</textarea>
		</form>
		<?php
			$miCK2['width']='1500';	// ancho del HTML (sólo caja, excluyendo menú CK editor)
			$miCK2['height']='200';	// alto del HTML (sólo caja, excluyendo menú CK editor)
			$miCK2['resize_enabled']=false;	// elimina la opción de redimensionar
			//$miCK['uiColor']='red';	// colorea la interfaz de usuario
			//$miCK['skin']='office2003';	// cambia la skin
			
			// Navegar en URL a directorio 'samples': para mostrar ejemplos
			//http://localhost/diw/actividad_ckeditor/ckeditor/_samples/
			$oCKeditor2->replace('fichero2',$miCK2);
		?>
		<form method='post' action='guardar.php'>	<!-- El botón 'Guardar' (diskette) funciona como submit -->
			<textarea name='fichero3'>LABORAL</textarea>
		</form>
		<h2>LABORAL</h2>
		<?php
			$miCK3['width']='1500';	// ancho del HTML (sólo caja, excluyendo menú CK editor)
			$miCK3['height']='200';	// alto del HTML (sólo caja, excluyendo menú CK editor)
			$miCK3['resize_enabled']=false;	// elimina la opción de redimensionar
			//$miCK['uiColor']='red';	// colorea la interfaz de usuario
			//$miCK['skin']='office2003';	// cambia la skin
			
			// Navegar en URL a directorio 'samples': para mostrar ejemplos
			//http://localhost/diw/actividad_ckeditor/ckeditor/_samples/
			$oCKeditor3->replace('fichero3',$miCK3);
		?>
	</body>
</html>