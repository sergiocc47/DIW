<?php

// Aunque utilicemos un try-catch, si la BBDD No está operativa
// Se visualiza un warning en el navegador y el proyecto sigue
// funcionando, la solucion es:

// Desactivar toda notificación de error
//error_reporting(0);		// lo dejamos comentado para detectar fallos mientras estemos programando

// $c representa la conexión de mi programa con la BBDD
$c=null;

function conecta(){
	$mysql_server="localhost";	
	$mysql_login="root";
	$mysql_pass="admin";
	
	// Creamos $c fuera de la función porque si la creamos dentro
	// sería una variable local y al finalizar la función desaparecería
	// y con esto también la conexión a la BBDD
    global $c;

	try{
		$c=mysqli_connect($mysql_server,$mysql_login,$mysql_pass);		
	}
	catch(Exception $e){
		// Si salta la excepcion es mejor registrar el fallo
		// en un LOG simplemente. Evitar mostrar mensajes 
		// dentro de una funcion
		echo $e->getMessage();
	}
}

?>