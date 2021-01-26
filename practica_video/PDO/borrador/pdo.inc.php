<?php

/* 

Este script contiene los datos de conexion a la BD y una función que nos
conecta a la BD y nos devuelve un canal de conexión con la clase PDO

La extensión Objetos de Datos de PHP (PDO) define una interfaz ligera para 
poder acceder a bases de datos en PHP. Cada controlador de bases de datos que 
implemente la interfaz PDO puede exponer características específicas de la 
base de datos, como las funciones habituales de la extensión.

*/

// parametros de conexion a la BD
$mysql_server="localhost";		// servidor donde se encuentra la BD	
$mysql_login="root";			// usuario MySQL que utilizo en la conexion																
$mysql_pass="admin";			// passwd del usuario en MySQL												
$mysql_bbdd="bddiwpracticavideo";			// BBDD
		  

// creo una variable $c sin asignarle ningún valor
// para que pueda recoger el identificador de conexión
// una vez que se haya establecido esta
$c;


function conecta(){

    // para usar las variables anteriores en la funcion
    // debo de definirlas como globales
    global $c, $mysql_server, $mysql_login, $mysql_pass,$mysql_bbdd;
	
	$dsn="mysql:host=".$mysql_server.";dbname=".$mysql_bbdd;
	try{		
		$c=new PDO($dsn, $mysql_login, $mysql_pass);		
	}
	catch(PDOException $ex) {
		echo "Error en la conexión"; 
		echo $ex->getMessage();
	}
}

// esta función asignará a $c el valor del identificador de la BBDD abierta

?>