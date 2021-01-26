<?php
	session_start();
	
	if(!isset($_GET['autor'])){
		echo "Error, debe seleccionar una categoría.";
		//echo "Obra (if): ".$_GET['obra'];	//depuración
	}
	else{
		
		$autor=$_GET['autor'];
		$obra=$_SESSION['cambio_categoria'];
		//echo "Obra: $obra<br/>";	//depuración
		//echo "Autor: $autor<br/>";	//depuración
		
		// Almacenamos el nombre del archivo de la obra
		$archivo_obra=explode("/",$obra);
		//echo "Archivo obra: ".$archivo_obra[4]."<br/>";	//depuración
		$nueva_url_obra="./img/galeria/$autor/".$archivo_obra[4];
		
		rename($obra,$nueva_url_obra);
		
		// Almacenamos el nombre de la obra
		$nombre_obra=explode(".",$archivo_obra[4]);
		
		echo "Categoría de la obra <b>$nombre_obra[0]</b> cambiada a <b>$autor</b>!";
		
		session_destroy();
	}
	
	echo "<br/><a href='index.php'>Volver a GALERÍA</a>";
?>
