<?php
	header("Content-type: text/css");
?>
/*
	TODOs:
	✓ Centrar menú de configuración.
	~ Editar dimensiones imágenes (falta logo).
	3) Listas (Catálogo):
		- Centrar texto respecto a imágenes.
		- Al disminuir de tamaño el texto se mete bajo la foto
*/

* {
	font-family: 'Graduate';
}

body {
	background-color: green;
}

h1, h4 {
    text-align: center;
}

/* MENÚ HAMBURGUESA */
/* Extraído de  https://www.w3schools.com/howto/howto_css_dropdown.asp */
.icono_menu_desplegable {
	background-image: url('./img/menu.png');	/* FAIL: pierde transparencia */
	height: 64px;	/* dimensiones reales de la imagen, si */
	width: 64px;	/* no aparece cortada o multiplicada   */
	padding: 16px;
	border: none;
	border-radius: 10px;	/* Esta jugada de los border hace el apaño */
}

.menu_desplegable {
	position: relative;
	display: inline-block;
}

.contenido_menu_desplegable {
	display: none;
	position: absolute;
	margin: 32px 0 0 -18px;
	background-color: black;
	min-width: 160px;
	z-index: 1;
}

.contenido_menu_desplegable a {
	color: white;
	border: 3px solid #000000;
	padding: 12px 16px;
	text-decoration: none;
	display: block;
}

.contenido_menu_desplegable a:hover {
	background-color: #4873b1;
}

.menu_desplegable:hover .contenido_menu_desplegable {
	display: block;
}

.menu_desplegable:hover .icono_menu_desplegable {
	background-color: #4873b1;
}
/* FIN MENÚ HAMBURGUESA */

ul {
	list-style: none;
}

div#cabecera {
	width: 80%;
	margin: auto;
	padding-bottom:0;
	border: 3px solid black;
	background-color: black;
	color: white;
}

div#cabecera div#logo {
	margin-bottom: inherit;
	float: left; 
}

div#logo img {
	/* NOTA: Al cambiar (width: 103px) se mete margen al 
	menú hamburguesa en pantalla de tamaño intermedio */
	width:130px;
	height:89px;
}

div#cabecera div#titulo_principal {
	/* TODO: corregir centrado vertical respecto logo */
	margin: auto;
	margin-bottom: inherit;
	padding-bottom: 10px; 
}

div#cuerpo {
	width: 80%;
	margin: auto;
	border: 3px solid black;
}

/* BARRA DE NAVEGACIÓN */
/* TODO: eliminar CSS innecesario, 
probablemente desde menú secundario */
div#barra_navegacion {
	font-size: 15px;
}

div#barra_navegacion ul {
	background: black;
	height: 35px;
	list-style: none;
	border: 3px solid #000000;
	/* elimina el margen izquierdo de las listas desplegables */
	margin:0;
	padding:0;
}

div#barra_navegacion li {
	width: 20%;
	float: left;
	padding: 0px;
}

div#barra_navegacion li a {
	background: black;
	display: block;
	text-align: center;
	text-decoration: none;
	color: #fff;
	line-height: 35px;
	padding: 0px 25px;
	
}

div#barra_navegacion li a:hover {
	text-decoration: none;
	background: #4873b1;
	color: #ffffff;
}

/* Menú secundario */

div#barra_navegacion li ul {
	position: absolute;
	background: black;
	/*display: none;	 para poder ver en Inspector con F12 */
	display: none;
	height: auto;
	/*width: 237px;		visualización portátil acer */
	width: 300.5px;		/* visualización monitor BENQ */
}

div#barra_navegacion li:hover > ul{
	display: block
}

div#barra_navegacion li li {
    position: relative;
	display: block;
	float: none;
	/*width: 237px;		visualización acer */
	width: 300.5px;		/* visualización monitor BENQ */
}

div#barra_navegacion li ul a {
	text-align: left;
	display: block;
	height: 35px;
	padding: 0px 10px 0px 25px;
}

div#barra_navegacion li li ul {
	position: absolute;
    top: 0;
    left: 100%;
}
/* FIN BARRA DE NAVEGACIÓN */

.articulo {
	margin: auto;
	overflow: hidden;
}

.articulo a {
	text-decoration: none;
}

div#art1 img {
	/*height: 250px;	eliminado y correcto */
	width: 261px;
	/* centra la imagen */
	display: block;
	margin-left: auto;
	margin-right: auto;
}

div#art1de1 {
	width: 330px;
	margin: 10px auto;
	/*margin-left: auto;
	margin-right: auto;*/
	/*border: 3px solid yellow;*/
}

.boton {
	display: block;
	margin: auto 0 auto auto;
}

div#art1de1 p, div#art1de1 a, .pie1de3 p, .pie1de3 a {
	margin: auto 10px;
}

/* PIE DE PÁGINA */
/* Clases creadas para "Pie de página" */
/* TODO: pie1de3 debería tener un tamaño fijo y no 
saltar de línea al disminuir tamaño de pantalla */
.pie1de3, .pie2de3, .pie3de3 {
	float: left;
	width: 32%;
}

/* CATÁLOGO */
/* Clases creadas para "Catálogo" */
/* TODO: quitar espacio separación al meter art2de2 bajo art1de2 */
.art1de2, .art2de2 {
	float: left;
	width: 49%;
}

.art2de2 {
	float: right;
}

.art1de2 img, .art2de2 img {
	height: 125px;
	width: 100px;
}

div#pie_de_pagina {
	width: 80%;
	margin: auto;
	border: 3px solid black;
	background-color: black;
	color: white;
}

div#pie3 {
	text-align: right;
}

@media screen and (max-width: 539px) {
	div#cabecera {
		width: 100%;
	}
	
	div#cuerpo {
		width: 100%;
	}
	/* INICIO MENÚS RESPONSIVE */
	div#barra_navegacion {
		display: none;
		visibility: hidden;
	}
	.menu_desplegable {
		display: block;
		visibility: visible;
	}
	/* FIN MENÚS RESPONSIVE */
	.articulo {
		width: 99%;
		margin: auto;
	}
	
	.img_pantalla_completa {
		display: block;
		visibility: visible;
		text-align: center;
	}
	
	div#art1 img {
		display: none;
		visibility: hidden;
	}
	
	.art1de2, .art2de2 , .art1de4, .art2de4, .art3de4, .art4de4 {
		margin-left: 25%;
		margin-right: 25%;
	}
	
	.art2de2, .art2de4, .art4de4 {
		float: left;
	}
	
	.art1de4, .art2de4, .art3de4, .art4de4 {
		height: 25%;
	}
	
	div#pie_de_pagina {
		width: 100%;
		float: left;
	}
}

@media screen and (min-width: 540px) and (max-width: 799px) {
	div#cabecera {
		width: 100%;
	}
	
	div#cuerpo {
		width: 100%;
	}
	/* INICIO MENÚS RESPONSIVE */
	div#barra_navegacion {
		display: none;
		visibility: hidden;
	}
	
	.menu_desplegable {
		display: block;
		visibility: visible;
	}
	/* FIN MENÚS RESPONSIVE */
	.img_pantalla_completa {
		display: block;
		visibility: visible;
		text-align: center;
	}
	
	div#art1 img {
		display: none;
		visibility: hidden;
	}
	
	.art1de2, .art2de2 , .art1de4, .art2de4, .art3de4, .art4de4 {
		margin-left: 25%;
		margin-right: 25%;
	}
	
	.art1de4, .art2de4, .art3de4, .art4de4 {
		height: 30%;
	}
	
	.art2de2, .art2de4, .art4de4 {
		float: left;
	}
	
	div#pie_de_pagina {
		width: 100%;
	}
}

@media screen and (min-width: 800px) {
	div#cabecera {
		width: 80%;
	}
	
	div#cuerpo {
		width: 80%;
	}
	/* INICIO MENÚS RESPONSIVE */
	div#barra_navegacion {
		display: block;
		visibility: visible;
	}
	
	.menu_desplegable {
		display: none;
		visibility: hidden;
	}
	/* FIN MENÚS RESPONSIVE */
	.img_pantalla_completa {
		display: none;
		visibility: hidden;
	}
	
	div#pie_de_pagina {
		width: 80%;
	}
}
