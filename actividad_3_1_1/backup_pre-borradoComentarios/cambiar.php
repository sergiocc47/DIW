<?php
	session_start();
	
	if(!isset($_GET['autor'])){
		echo "Error, debe seleccionar una categoría.";
		//echo "Obra (if): ".$_GET['obra'];	//depuración
	}
	else{
		
		$autor=$_GET['autor'];
		$obra=$_SESSION['cambio_categoria'];
		echo "Obra: $obra<br/>";	//depuración
		//echo "Autor: $autor<br/>";	//depuración
		
		// Almacenamos el nombre del archivo de la obra
		$archivo_obra=explode("/",$obra);
		//echo "Archivo obra: ".$archivo_obra[4]."<br/>";	//depuración
		$nueva_url_obra="./img/galeria/$autor/".$archivo_obra[4];
		
		// Renombramos la obra a cambiar
		rename($obra,$nueva_url_obra);
		
		// Extraemos el nombre de la obra
		$nombre_obra=explode(".",$archivo_obra[4]);
		
		$url_licencia="./img/galeria/".$archivo_obra[3]."/".$nombre_obra[0].".txt";
		$nueva_url_licencia="./img/galeria/$autor/".$nombre_obra[0].".txt";
		
		// Renombramos la licencia a cambiar
		rename($url_licencia,$nueva_url_licencia);
		
		echo "Categoría de la obra <b>$nombre_obra[0]</b> cambiada a <b>$autor</b>!";
		
		session_destroy();
	}
	
	echo "<br/><a href='index.php'>Volver a GALERÍA</a>";
?>
