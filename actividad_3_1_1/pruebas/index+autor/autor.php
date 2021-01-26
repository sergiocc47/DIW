<?php
	// FAIL: no recoge nada de la session
	// https://stackoverflow.com/questions/19125982/php-passing-variable-from-one-php-file-to-another-php-file
	session_start();
	$autor=$_SESSION['autor'];
	
	$directorio=opendir("./img/$autor"); // ruta actual
	
	while($obra=readdir($directorio)){	// obtenemos un archivo y luego otro sucesivamente
		if($obra!="." && $obra!=".."){	// descartamos . y ..
			//TODO: width mejor en CSS
			echo "<img src='./img/$autor/$obra' width=100px/><br/>";	// falla si lleva "" en el nombre
			$nombre_obra=explode(".",$obra);
			echo "<p>".$nombre_obra[0]."</p>";
			//TODO: añadir texto licencias
		}
	}
?>