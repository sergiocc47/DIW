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
				
					$directorio=opendir("./media"); // ruta actual
					
					$cont=0;
					
					while($archivo_cancion=readdir($directorio)){	// obtenemos un archivo y luego otro sucesivamente
						if (!is_dir($archivo_cancion)) {
							$cancion=explode(".",$archivo_cancion);	// quitamos la extensión del archivo
							
							$artista_titulo=explode(" - ",$cancion[0]);	// $cancion[0] -> Artista - Canción
							$artista=$artista_titulo[0];
							$titulo=$artista_titulo[1];
							
							$cont++;
							
							echo "<div class='cancion'>Pista $cont: $artista - $titulo<audio id='$cont' src='./media/$archivo_cancion'></audio></div>
							<div class='reproductor'>
								<button onclick='document.getElementById($cont).play()'><img src='./img/play.png'/></button>
								<button onclick='document.getElementById($cont).pause()'><img src='./img/pause.png'/></button>
								<button onclick='document.getElementById($cont).volume+=0.1'><img src='./img/volume-up.png'/></button>
								<button onclick='document.getElementById($cont).volume-=0.1'><img src='./img/volume-down.png'/></button></br>
							</div>";
						}
					}
				?>
			</div>
			<hr/>
			<div id="formulario_subida">
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