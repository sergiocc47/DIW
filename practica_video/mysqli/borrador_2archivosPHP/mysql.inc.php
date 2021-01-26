<?php

// Aunque utilicemos un try-catch, si la BBDD No est� operativa
// Se visualiza un warning en el navegador y el proyecto sigue
// funcionando, la solucion es:

// Desactivar toda notificaci�n de error
//error_reporting(0);		// lo dejamos comentado para detectar fallos mientras estemos programando

// $c representa la conexi�n de mi programa con la BBDD
$c=null;

function conecta(){
	$mysql_server="localhost";	
	$mysql_login="root";
	$mysql_pass="admin";
	
	// Creamos $c fuera de la funci�n porque si la creamos dentro
	// ser�a una variable local y al finalizar la funci�n desaparecer�a
	// y con esto tambi�n la conexi�n a la BBDD
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