<?php

	if(!isset($_GET['obra'])){
		header("location: index.php");
	}
	//echo "Obra a descargar: ".$_GET['obra'];
	// compruebo que el fichero a descargar existe
	if(file_exists($_GET['obra'])){
		$obra=$_GET['obra'];
				
		// creo la cabecera HTTP para que automaticamente descarge el fichero indicado
		header("Content-Description: File Transfer");
		header("Content-Type: application/octet-stream");
		header("Content-Disposition: attachment; filename=".basename($obra));
		header ("Content-Length: ".filesize($obra)); 
		readfile($obra); 
	}
	else{
		header("location: index.php");
	}	
	
?>
	