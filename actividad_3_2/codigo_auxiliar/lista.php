<!doctype html>
<html lang="es">
	<head>
		<script>
			var x=document.getElementById("player");

			function subirVolumen(){
				x.volume+=0.1;
			}
			   
			function bajarVolumen(){
				x.volume-=0.1;
			}
		</script>
	</head>
	<body>
		<?php
			$directorio=opendir("./canciones"); // ruta actual
			
			while($cancion=readdir($directorio)){	// obtenemos un archivo y luego otro sucesivamente
				if($cancion!="." && $cancion!=".."){	// descartamos directorios . y ..
					
					$nombre_cancion=explode(".",$cancion);
					
					echo $nombre_cancion[0]."
						<audio id='player' src='./canciones/$cancion'></audio>
							<button onclick='document.getElementById('player').play()'><img src='./img/Play.png'/></button>
							<button onclick='document.getElementById('player').pause()'><img src='./img/Stop.png'/></button>
							<button onclick='subirVolumen()'><img src='./img/SubirVolumen.png'/></button>
							<button onclick='bajarVolumen()'><img src='./img/BajarVolumen.png'/></button>
						<br/>";
				}
			}
		?>
	</body>
</html>