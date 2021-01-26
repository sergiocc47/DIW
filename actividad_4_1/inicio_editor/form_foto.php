<!doctype html>
<html lang="es">
	<head>
		<title>Actividad 4.1</title>
		<meta charset="utf-8"/>
		<!--link rel="stylesheet" type="text/css" href="estilo.php"/-->	<!-- Si CSS, referenciar -->
	</head>
	<body>
	<p>Subir foto de perfil</p>
		<form action="guardar_foto.php" method="post" 
			enctype="multipart/form-data">
			Seleccionar imagen
			<input name="archivo" type="file"/><br/>
			<input type="submit" value="Subir"/> 
		</form>
	</body>
</html>