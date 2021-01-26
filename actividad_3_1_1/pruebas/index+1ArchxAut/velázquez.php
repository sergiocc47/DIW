<?php
	$directorio=opendir("./img/Velázquez"); // ruta actual
	
	while($obra=readdir($directorio)){	// obtenemos un archivo y luego otro sucesivamente
		if($obra!="." && $obra!=".."){	// descartamos . y ..
			//TODO: width mejor en CSS
			echo "<img src='./img/Velázquez/$obra' width=100px/><br/>";	// falla si lleva "" en el nombre
			$nombre_obra=explode(".",$obra);
			echo "<p>".$nombre_obra[0]."</p>";
			//TODO:
		}
	}
?>