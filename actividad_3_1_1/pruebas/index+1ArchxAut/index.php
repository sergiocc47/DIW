<?php
	$directorio=opendir("./img"); // ruta actual
	while($autor=readdir($directorio)){	// obtenemos un archivo y luego otro sucesivamente
		if(!is_file($autor) && $autor!="." && $autor!=".."){	// verificamos si es o no un directorio y descartamos . y ..
			echo "<a href='$autor.php'>$autor</a><br/>";	// problema tildes
		}
	}
?>