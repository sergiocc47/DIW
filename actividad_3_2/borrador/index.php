<!doctype html>
<html lang="en">
	<head>
		<title>Actividad 3.2</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="estilo.css"/>	<!-- Si CSS, referenciar -->
		<!--link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Graduate"/-->	<!-- Elegir Google Fonts -->
	</head>
	<body>
		<div id="cabecera">
			<div id="logo">
				<img id="logo" src="./img/logo.png"/>
			</div>
			<div id="titulo">
				<h1>LISTA DE REPRODUCCIÓN</h1>
			</div>
		</div>
		<div id="cuerpo">
			<div id="lista_reproduccion">
				<?php
					/*
					TRACKLIST
					Love - Maybe the People Would Be the Times or Between Clark and Hilldale
					Los Saicos - Demolición
					Los Bengala - Jodidamente Loco
					*/
					$directorio=opendir("./media"); // ruta actual
					/*
					//FAIL: lista de reproducción tabulada
					//TODO: centrar th como en Título
					echo "<table>
						<tr><th>Pista</th><th>Artista</th><td><b>Título</b></td><th></th></tr>";
					*/
					$cont=0;
					
					while($archivo_cancion=readdir($directorio)){	// obtenemos un archivo y luego otro sucesivamente
						if (!is_dir($archivo_cancion)) {
							$cancion=explode(".",$archivo_cancion);	// quitamos la extensión del archivo
							
							$artista_titulo=explode(" - ",$cancion[0]);	// $cancion[0] -> Artista - Canción
							$artista=$artista_titulo[0];
							$titulo=$artista_titulo[1];
							
							//Otra forma
							// $artista_cancion=explode("-",$cancion_raw[0]);	// $cancion[0] -> Artista - Canción
							// 1) trim
							// https://www.php.net/manual/es/function.trim.php 
							// $artista=trim($artista_titulo[0]);
							// $titulo=trim($artista_titulo[1]);
							// 2) substr
							// https://www.php.net/manual/es/function.substr.php
							// $artista=substr($artista_titulo[0],0,-1);
							// 3) substr_replace
							// https://www.php.net/manual/es/function.substr-replace.php
							// $artista=substr_replace($artista_titulo[0],"",-1);
							
							$cont++;
							
							echo "<div class='cancion'>Pista $cont: $artista - $titulo<audio id='$cont' src='./media/$archivo_cancion'></audio></div>
							<div class='reproductor'>
								<button onclick='document.getElementById($cont).play()'><img src='./img/play.png'/></button>
								<button onclick='document.getElementById($cont).pause()'><img src='./img/pause.png'/></button>
								<button onclick='document.getElementById($cont).volume+=0.1'><img src='./img/volume-up.png'/></button>
								<button onclick='document.getElementById($cont).volume-=0.1'><img src='./img/volume-down.png'/></button></br>
							</div>";
							/*
							// FAIL: tabla -> Uncaught SyntaxError: expected expression, got '}' en index.php:2
							echo "<tr><td class='num_pista'>$cont</td><td>$artista</td><td>$titulo</td><td>
								<audio id='$cont' src='./media/$archivo_cancion'></audio>
									<div>
										<button onclick='document.getElementById('$cont').play()'><img src='./img/Play.png'/></button>
										<button onclick='document.getElementById('$cont').pause()'><img src='./img/Stop.png'/></button>
										<button onclick='document.getElementById($cont).volume+=0.1'><img src='./img/SubirVolumen.png'/></button>
										<button onclick='document.getElementById($cont).volume-=0.1'><img src='./img/BajarVolumen.png'/></button>
									</div>
								</td></tr>";
							*/
						}
					}
					//echo "</table>";	//FAIL
				?>
			</div>
			<hr/>
			<div id="formulario_subida">
				<!--
				INTERESANTE: mostrar subida de archivo si se pulsa sobre título o artista y perder 
				foco (dejar de visualizarlo) si se sale de alguno de ellos (que no sea el otro)
				-->
				<form action="subir.php" method="post" 
					enctype="multipart/form-data">
					Seleccionar canción
					<input name="cancion" type="file"/>
					<br/>
					<table>
						<tr>
							<td><label for="titulo">Título </label></td>
							<td><input name="titulo"/></td>
						</tr>
						<tr>
							<td><label for="artista">Artista </label></td>
							<td><input name="artista"/></td>
						</tr>
						<tr>
							<td></td>
							<td><input id="boton_subir" type="submit" value="Subir"/></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</body>
</html>