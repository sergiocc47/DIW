<?php
	header("Content-type: text/css");
?>

* {
	font-family: Arial;
}

body {
	margin: 0 auto;
	background-color: #b0aeae;
}

/*
Tipografía (pág. 17 Guía de estilo)
Para el sitio web se ha empleado Arial una de las tipografías estándar en
HTML que aseguran una perfecta legibilidad en web. Usada en su versión regular y a un tamaño
mínimo de 0.6em.
*/
/* ESTRUCTURA = Galería de imágenes - Home (págs. 44-45 y 52 Guía de estilo) */

/*
ANCHOS(pág. 4 Guía de estilo)
	TOTAL: 1000 px
	MENÚ IZDA: 250 px
	CUERPO PRINCIPAL: 750 px
*/

/*
GALERíA (pág. 28-29 Guía de estilo)
Imagen de acceso aplicacion galería de imágenes 230 x 150 px
Imagen aplicación galería de imágenes 90 x 65px
*/

/* COLORES (págs. 18-19 y 54-55 Guía de estilo)*/

div#cabecera {
	overflow: hidden;
	margin: 0 auto;
	width: 1000px;
	background-color: white;
}

div#logo {
	width: 700px;
	float: left;
	padding: 10px 0 0 50px;
	background-color: white;
}

div#logo img {
	width: 345px;
}

div#menu_imagen {
	width: 249px;
	height: 99px;	/* la del logo */
	padding: 25px 0;
	float: right;
	border-left: 1px solid #e8e5e0;
}

div#menu_imagen ul {
	list-style: none;
}

div#menu_imagen li a {
	text-decoration: none;
	color: #78797c;
	font-size: 0.7em;
}

div#titulo_principal {
	height: 75px;
	width: 730px;
	padding-left: 20px;
	float: left;
	background-color: #dd6d10;
	font-size: 1.5em;
	color: white;
}

div#buscador {
	width: 250px;
	height: 75px;	/* la del titulo_principal */
	float: right;
	text-align: center;
	background-color: #78797c;
	/* CENTRADO */
	display: flex;
	justify-content: center;
	align-items: center;
}

input#boton_buscar {
	color: white;
	background-color: #123645;
	border: solid #123645;
}

div#cuerpo {
	margin: 30px auto auto auto;
	/*padding: 10px 20px 10px 0;*/
	padding: 10px 20px;
	width: 960px;
	background-color: white;
}

.titulo_cuerpo {
	padding-left: 270px;
	font-size: 2em;
	color: #123645;
}

.titulo_autor {
	padding-left: 20px;
	font-size: 1.5em;
	color: #dd6d10;
}

.item_autor {
	list-style: none;
	margin-left: 0;
	padding: 10px 20px;
	width: 208px;
	border: 1px solid #e8e5e0;
}

.item_autor a {
	text-decoration: none;
	color: #123645;
	font-size: 1.2em;
}

.imagen_obra {
	/*height: 150px;*/
	width:230px;
}

/* PIE DE PÁGINA */
div#pie_de_pagina {
	margin: auto;
	width: 1000px;
	height: 120px;
	text-align: center;
	color: #78797c;
	font-size: 0.6em;
}

div#copyright {
	font-weight: bold;
}

div#estandares_web {
	margin: auto;
	height: 100px;
	background-color: white;
}

p#conformidad {
  padding-top: 33px;
}
p#web_control {
  padding-bottom: 33px;
}
