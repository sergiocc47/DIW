<!doctype html>
<html lang='es'>
	<head>
		<title>CK editor</title>
		<meta charset='utf-8'/>
		<!--link rel="stylesheet" type="text/css" href="estilo.php"/-->	<!-- Si CSS, referenciar -->
	</head>
	<body>
		<?php
			include('./ckeditor/ckeditor.php');
			$oCKeditor=new CKeditor();	// o = nueva instancia
		?>
		<form method='post' action='guardar.php'>	<!-- El botón 'Guardar' (diskette) funciona como submit -->
			<textarea name='fichero'>HOLA</textarea>
		</form>
		<?php
			$miCK['width']='600';	// ancho del HTML (sólo caja, excluyendo menú CK editor)
									// default: se ajusta a ancho de pantalla
			$miCK['height']='400';	// alto del HTML (sólo caja, excluyendo menú CK editor)
			$miCK['resize_enabled']=false;	// elimina la opción de redimensionar
			//$miCK['uiColor']='red';	// colorea la interfaz de usuario
			//$miCK['skin']='office2003';	// cambia la skin
			
			// Navegar en URL a directorio 'samples': para mostrar ejemplos
			//http://localhost/diw/actividad_ckeditor/ckeditor/_samples/
			$oCKeditor->replace('fichero',$miCK);
			// $oCKeditor->replace('fichero');	// al no pasar la instancia como parámetro se carga la configuración por defecto
		?>
	</body>
</html>