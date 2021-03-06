<!doctype html>
<html lang="es">
	<head>
		<title>Tarea 1ª Ev - Inicio</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" type="text/css" href="estilos_actual.php"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Graduate"/>
	</head>
	<body>
		<?php
			if(!isset($_POST['cambiar_estilo'])){
				echo "Error, debe seleccionar si quiere mantener o cambiar el estilo.";
				echo "<a href='configuracion.html'>Volver</a>";
			}
			else{
				// FAIL: averiguar por qué cambia los CSSs pero
				// no actualiza el cambio al ser visualizado
				$marcado=$_POST['cambiar_estilo'];
				
				if ($marcado=="cambiar"){
					rename("estilos_actual.php","estilos_auxiliar.php");
					unlink("estilos_actual.php");
					rename("estilos_anterior.php","estilos_actual.php");
					rename("estilos_auxiliar.php","estilos_anterior.php");
				}
				
				header("Location: configuracion.html");
				exit;
			}
		?>
	</body>
</html>