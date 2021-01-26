<!doctype html>
<html lang="es">
	<head>
		<title>Actividad 2.8 - Catálogo</title>
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
				<h1 class="titulo_secundario">CATÁLOGO</h1>
				<img src="./img/catalogo.png"/>
				<a class="img_pantalla_completa" href="./img/catalogo.png">Ver icono Catálogo</a>
			</div>
			<div class="articulo">
				<div class="art1de2">
					<ul>
						<li>
							<a href="#">
								<img src="./img/sudadera.png"/>
							</a>
							<a href="#">Sudadera</a>
						</li>
						<li>
							<a href="#">
								<img src="./img/pantalones.png"/>
							</a>
							<a href="#">Pantalones</a>
						</li>
					</ul>
				</div>
				<div class="art1de2">
					<ul>
						<li>
							<a href="#">
								<img src="./img/playeros.png"/>
								<a href="#">Playeros</a>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="./img/cinta_correr.png"/>
								<a href="#">Cinta de correr</a>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- PIE DE PÁGINA-->
		<?php
			include "pie_de_pagina.inc.php";
		?>
	</body>
</html>