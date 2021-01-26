<!doctype html>
<html lang='es'>
	<head>
		<title>CK editor - Toolbar</title>
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
			//$miCK['resize_enabled']=false;	// elimina la opción de redimensionar
			/*
			// Ejemplo PDF
			$miCK['toolbar'] = array(
				array('Save'),
				array('Bold','Italic','Underline','-','Subscript','Superscript','-','NumberedList', 'BulletedList' ),
				array('Cut','Copy','Paste','PasteText','PasteFromWord','-','Print' ),
				array('Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat' ),
				array('JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ),
				array('Outdent','Indent' ),
				array('/'),
				array('Styles','Format','Font','FontSize'),
				array('TextColor','BGColor'),
				array('Table','HorizontalRule','SpecialChar','BidiLtr','BidiRtl' )
			);
			*/
			// TOOLBAR POR DEFECTO
			// adaptación de  plugins/toolbar/plugin.js
			// https://docs-old.ckeditor.com/ckeditor_api/symbols/CKEDITOR.config.html#.toolbar
			$miCK['toolbar'] = array(
				array('Source','-','Save','NewPage','DocProps','Preview','Print','-','Templates'),
				array('Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo'),
				array('Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt'),
				array('Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'),
				'/',	// mete un "salto de línea"
				array('Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat'),
				array('NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl'),
				array('Link','Unlink','Anchor'),
				array('Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'),
				'/',	// mete un "salto de línea"
				array('Styles','Format','Font','FontSize'),
				array('TextColor','BGColor'),
				array('Maximize', 'ShowBlocks','-','About')
			);
			// TOOLBAR CUSTOMIZADA (Actividad 4.1)
			$miCK1['toolbar'] = array(
				array(/*'Source','-',*/'Save','NewPage','DocProps','Preview','Print','-','Templates'),
				array('Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo'),
				array('Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt'),
				//array('Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'),
				'/',	// mete un "salto de línea"
				array('Bold','Italic','Underline',/*'Strike',*/'Subscript','Superscript','-','RemoveFormat'),
				array('NumberedList','BulletedList','-','Outdent','Indent','-',/*'Blockquote','CreateDiv','-'*/,'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl'),
				array('Link','Unlink'/*,'Anchor'*/),
				array('Image',/*'Flash',*/'Table','HorizontalRule',/*'Smiley',*/'SpecialChar'/*,'PageBreak','Iframe'*/),
				'/',	// mete un "salto de línea"
				array('Styles','Format','Font','FontSize'),
				array('TextColor','BGColor'),
				array('Maximize'/*,'ShowBlocks','-','About'*/)
			);
			
			
			// Navegar en URL a directorio 'samples': para mostrar ejemplos
			//http://localhost/diw/actividad_ckeditor/ckeditor/_samples/
			$oCKeditor->replace('fichero',$miCK);
			// $oCKeditor->replace('fichero');	// al no pasar la instancia como parámetro se carga la configuración por defecto
		?>
	</body>
</html>