<!doctype html>
<html lang="es">
	<head>
		<title>HTML común - Configuración</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" type="text/css" href="estilos_actual.php"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Graduate"/>
	</head>
	<body>
		<!-- CABECERA -->
		<?php
			include "cabecera.inc.php";
		?>
		<div id="cuerpo">
			<!-- MENÚ DESPLEGABLE -->
			<?php
				include "menu_desplegable.inc.php";
			?>
			<!-- BARRA DE NAVEGACIÓN -->
			<?php
				include "barra_navegacion.inc.php";
			?>
			<div class="articulo" id="art1">
				<h1 class="titulo_secundario">CONFIGURACIÓN</h1>
				<img src="./img/configuracion.png"/>
				<a class="img_pantalla_completa" href="./img/configuracion.png">Ver icono Configuración</a>
			</div>
			<div class="articulo" id="art1de1">
				<form method="post" action="configurar.php">
					<input name="cambiar_estilo" type="radio" value="mantener" checked />Mantener configuración actual<br/>
					<input name="cambiar_estilo" type="radio" value="cambiar"/>Cambiar configuración<br/>
					<br/>
					<input class="boton" type="submit" value="Aplicar"/> 
				</form>
			</div>
		</div>
		<!-- PIE DE PÁGINA-->
		<?php
			include "pie_de_pagina.inc.php";
		?>
	</body>
</html>