<!doctype html>
<html lang="es">
	<head>
		<title>Práctica de vídeo</title>
		<meta charset="utf-8"/>
		<!--link rel="stylesheet" type="text/css" href="estilos_actual.php"/-->	<!-- Si CSS, referenciar -->
		<!--link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Graduate"/-->	<!-- Elegir Google Fonts -->
		<!-- TODO: imagen girando en un mismo punto, sin desplazamiento -->
		<style>
			@keyframes mianim {
				from {background-color: red; transform: rotate(0deg); font-size: 16px;}
				50% {background-color: green;}
				to {background-color: blue; transform: rotate(360deg); font-size: 64px;}
			}
			
			#anim {
				width: 83px;
				height: 83px;
				border: 1px solid black;
				position: relative;
			}
			
			/* efectos de animación por separado */
			#anim {
				animation-name: mianim;
				animation-duration: 5s;
				animation-iteration-count: infinite;
				/*animation-direction: alternate;*/
				animation-timing-function: linear;	/* hace que no pare de girar, si no vuelta -> acelerada y parada */
			}
		</style>
	</head>
	<!-- TODO: estilo en CSS -->
	<body style="padding:20px;">	<!-- TODO: quitar padding a resto de elementos -->
		<div id="cabecera" style="border: 1px solid red;overflow: auto;padding:20px;">
			<div id="anim" width="100%" style="float:left;"></div>
			<div id="titulo" style="border: 1px solid red;overflow: auto;text-align: center">
				<h1 style="float:left;border: 1px solid red;width:99%;padding:0 auto;">
				<?php
					include("pdo.inc.php");
					
					// me conecto al PDO
					conecta();
					
					if($c==null){
						echo "<p>Error de conexion</p>";
					}
					else{
						// creo la consulta para mostrar el título
						$sql="SELECT titulo FROM titulos WHERE id_titulo='1'";
						
						$resultado = $c->query($sql);
						
						if($resultado->rowCount()==0){
							echo "<p>Sin resultados</p>";
							//TODO ¿location?
						}
						else{
							while ($registro = $resultado->fetch()) {
								echo "<p class='titulo'>".$registro['titulo']."</p>";
							}
						}
						
						// cierro la conexion
						$c=null;
					}
				?>
				</h1>
				
			</div>
		</div>
		<!--div id="formulario" action="index.php?titulo=$_GET['titulo']" style="border: 1px solid red;padding:20px;"-->
		<div id="formulario" style="border: 1px solid red;padding:20px;">
			<form method="get" action="cambiar_titulo.php">
				Introduzca un nuevo título <input type="text" name="nuevo_titulo"/>
				<input type="submit" value="Modificar título"/>
			</form>
		</div>
		<h2>Versión "embebida"</h2>
		<!-- CÓDIGO YOUTUBE EMBEBIDO -->
		<iframe width="560" height="315" src="https://www.youtube.com/embed/QC8iQqtG0hg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		<br>
		<!-- NOTA: Firefox necesita WebKit -->
		<!--
		<video src="./video/MilkyWayRise_360p.mp4"/></video>	
		-->
		<h2>Versión modificada a un formato mpeg4</h2>
		<video controls>
			<source src="./video/MilkyWayRise_360p.mp4" type="video/mp4"/>
		</video>
		
		<div>
			<!--?php
				/*
				TRACKLIST
				Los Bengala - Jodidamente Loco
				*/
				$directorio=opendir("./canciones"); // ruta actual
				
				// Mostramos la lista tabulada
				//echo "<table>";
				
				$cont=0;
				
				while($cancion=readdir($directorio)){	// obtenemos un archivo y luego otro sucesivamente
					//if($cancion!="." && $cancion!=".."){	// descartamos directorios . y ..
					if (!is_dir($cancion)) {	// FUNCIONA!!
						$nombre_cancion=explode(".",$cancion); // FAIL: corregir visualización nombre_cancion
						// Código Rafa
						$cont++;
						echo "Pista $cont - $nombre_cancion <audio src='canciones/$cancion' id='$cont'></audio>
						<div class='controles'>
							<button onclick='document.getElementById($cont).play()'><img src='./img/Play.png'/></button>
							<button onclick='document.getElementById($cont).pause()'><img src='./img/Stop.png'/></button>
							<button onclick='document.getElementById($cont).volume+=0.1'><img src='./img/SubirVolumen.png'/></button>
							<button onclick='document.getElementById($cont).volume-=0.1'><img src='./img/BajarVolumen.png'/></button></br>
						</div>";
						/*
						// SEMI-FAIL: no puede llevar ' o " (' doble) en el nombre
						//*********************************************************
						//********************** SEGUIR AQUÍ **********************
						//*********************************************************
						// PRUEBA: PLAYER[cont]
						echo "<tr><td>".$nombre_cancion[0]."</td><td>
							<audio id='player' src='./canciones/$cancion'></audio>
								<button onclick='document.getElementById('player').play()'><img src='./img/Play.png'/></button>
								<button onclick='document.getElementById('player').pause()'><img src='./img/Stop.png'/></button>
								<button onclick='subirVolumen()'><img src='./img/SubirVolumen.png'/></button>
								<button onclick='bajarVolumen()'><img src='./img/BajarVolumen.png'/></button>
							</td></tr>";
						
						//cont++;*/
					}
				}
				//echo "</table>";
			?-->
		</div>
	</body>
</html>