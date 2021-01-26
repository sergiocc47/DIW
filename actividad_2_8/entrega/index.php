<!doctype html>
<html lang="es">
	<head>
		<title>Actividad 2.8 - Inicio</title>
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
				<h1 class="titulo_secundario">INICIO</h1>
				<img src="./img/inicio.png"/>
				<a class="img_pantalla_completa" href="./img/inicio.png">Ver icono Inicio</a>
			</div>
			<div class="articulo">
				<p>
					Nuestra empresa nace en 2013 en Ponferrada (León) y su sentido es hacer accesible, de manera sostenible, el placer y los beneficios de la práctica del deporte al mayor número de personas.
				</p>
				<p>
					En todos los países en los que estamos presentes compartimos una cultura de empresa fuerte y única, reforzada por nuestros dos valores: la vitalidad y la responsabilidad.
				</p>
				<p>
					Mantenemos una firme apuesta por la innovación en todas las fases de nuestra cadena de valor: desde la investigación y el desarrollo hasta la venta, pasando por la concepción, el diseño, la producción y la logística, y por crecer de forma responsable con el medioambiente.
				</p>
				<p>
					Somos diseñadores, fabricantes y distribuidores de nuestros propios productos, lo que nos permite revisar de forma continua tanto nuestra política de precios como la calidad de toda nuestra oferta con el objetivo de ofrecer a nuestros usuarios la mejor relación tecnicidad – precio.
				</p>
				<p>
					A través de nuestras marcas propias y gracias a nuestra red logística, nuestros servicios y a nuestros equipos de apasionados deportistas al servicio de los usuarios, ofrecemos acceso a más de 110 disciplinas deportivas.
				</p>
				<p>
					Nuestros productos están destinados a todos los apasionados del deporte, desde el principiante hasta el usuario deportista más experimentado.
				</p>
				<p>
					Hoy, más de 90.000 colaboradores de más de 80 nacionalidades trabajan cada día para hacer accesible el deporte al mayor número de personas.
				</p>
			</div>
		</div>
		<!-- PIE DE PÁGINA-->
		<?php
			include "pie_de_pagina.inc.php";
		?>
	</body>
</html>