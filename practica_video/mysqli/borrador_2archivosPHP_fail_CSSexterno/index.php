<!doctype html>
<html lang="es">
	<head>
		<title>Práctica de vídeo</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="estilo.php"/>	<!-- Si CSS, referenciar -->
		<!--link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Graduate"/-->	<!-- Elegir Google Fonts -->
		<!-- TODO: imagen girando en un mismo punto, sin desplazamiento -->
		<style>
		@keyframes mianim {
			from {background-color: red; transform: rotate(0deg);}
			50% {background-color: green;}
			to {background-color: blue; transform: rotate(360deg);}
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
	<!--body style="padding: 20px"-->
	<body>
		<!--div id="cabecera" style="border: 1px solid red;overflow: auto;padding: 20px;"-->
		<div id="cabecera">
			<!--div id="anim" width="100%" style="float:left;"></div-->
			<div id="anim"></div>
			<!--div id="titulo" style="border: 1px solid red;overflow: auto;text-align: center"-->
			<div id="titulo">
				<!--h1 style="float:left;border: 1px solid red;width: 99%;padding: 0 auto;"-->
				<h1>
				<?php
					include("mysql.inc.php"); 
					
					// me conecto a MySQL Server
					conecta();
					
					if($c==null){
						echo "<p>Error de conexion</p>";
					}
					else{
						// Ordenes SQL
						// Conexión a la BBDD
						mysqli_select_db($c,"bddiwpracticavideo");
						
						// creo la consulta para mostrar el título
						$sql="SELECT titulo FROM titulos WHERE id_titulo='1'";
						
						// ejecuto la orden SQL
						$resultado=mysqli_query($c,$sql);
						
						if($resultado){
							// orden SQL correcta
					
							// nos devuelve cuántas filas tiene $resultado
							$filas=mysqli_num_rows($resultado);	// devuelve el nº de filas afectadas
							
							if($filas==0){
								echo "Sin resultados";
								//TODO ¿location?
							}
							else{
								// programamos un bucle que me mueva por
								// el resultado desde la primera fila hasta
								// la última
								
								// el fetch pasa la información a $registro y
								// avanza el puntero a la siguiente fila
								
								while($registro=mysqli_fetch_array($resultado)){
									//echo "El nuevo título es: ".$registro['titulo'];
									echo $registro['titulo'];
								}
							}
							
						}
						else{
							// orden SQL incorrecta. Incluido el error Duplicate key
							$error=mysqli_error($c);
							// lo correcto es enviar el error a un LOG y no
							// mostrar errores concretos por pantalla, pero mientras
							// programamos nos es útil verlo en pantalla
							echo $error;
						}
						
						// cierro la conexion
						mysqli_close($c);
					}
				?>
				</h1>
				
			</div>
		</div>
		<!--div id="formulario" style="border: 1px solid red;padding: 20px;"-->
		<div id="formulario">
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
		<!--video id="video_mp4" width="560" height="315" controls-->
		<video id="video_mp4" controls>
			<source src="./video/MilkyWayRise_360p.mp4" type="video/mp4"/>
		</video>
	</body>
</html>