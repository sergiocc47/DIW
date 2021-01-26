<?php
	//TODO: style en CSS
	echo "<div id='menu_principal' style='float:left'>";
	
	$directorio=opendir("./img/galeria"); // ruta actual

	while($autor=readdir($directorio)){	// obtenemos un archivo y luego otro sucesivamente
		if(!isset($_GET['autor'])){
			if(!is_file($autor) && $autor!="." && $autor!=".."){	// verificamos si es o no un directorio y descartamos . y ..
				echo "<a class='item_autor' href='galeria_autor.php?autor=$autor'>$autor</a><br/>";
			}
		}
	}
	
	echo "</div>";
?>