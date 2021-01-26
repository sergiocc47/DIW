<?php
	header("Content-type: text/css");
?>

* {
	font-family: 'Graduate';
}

body {
	background-color: green;
}

h1, h4 {
    text-align: center;
}

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
	width:130px;
	height:89px;
}

div#cabecera div#titulo_principal {
	margin: auto;
	margin-bottom: inherit;
	padding-bottom: 10px; 
}

div#cuerpo {
	width: 80%;
	margin: auto;
	border: 3px solid black;
}

/* MENÚ HAMBURGUESA */
.icono_menu_desplegable {
	background-image: url('./img/menu.png');
	height: 64px;
	width: 64px;
	padding: 16px;
	border: none;
	border-radius: 10px;
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

.icono_menu_desplegable:hover .contenido_menu_desplegable {
	display: block;
}

.icono_menu_desplegable:hover {
	background-color: #4873b1;
}

/* BARRA DE NAVEGACIÓN */
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

.articulo {
	margin: auto;
	overflow: hidden;
}

.articulo a {
	text-decoration: none;
}

div#art1 img {
	width: 261px;
	/* centra la imagen */
	display: block;
	margin-left: auto;
	margin-right: auto;
}

div#art1de1 {
	width: 330px;
	margin: 10px auto;
}

.boton {
	display: block;
	margin: auto 0 auto auto;
}

div#art1de1 p, div#art1de1 a, .pie1de3 p, .pie1de3 a {
	margin: auto 10px;
}

/* PIE DE PÁGINA */
.pie2de3, .pie3de3 {
	float: left;
	width: 32%;
}

.pie1de3 {
	float: left;
	width: 280px;
}

.pie3de3 {
	text-align: right;
}

/* CATÁLOGO */
.art1de2, .art2de2 {
	float: left;
	width: 49%;
}

.art2de2 {
	float: right;
}

.art1de2 img, .art2de2 img {
	width: 94px;
}

div#pie_de_pagina {
	width: 80%;
	margin: auto;
	border: 3px solid black;
	background-color: black;
	color: white;
}

@media screen and (max-width: 539px) {
	div#cabecera {
		width: 100%;
	}
	
	div#cuerpo {
		width: 100%;
	}
	
	div#barra_navegacion {
		display: none;
		visibility: hidden;
	}
	.menu_desplegable, .img_pantalla_completa {
		display: block;
		visibility: visible;
	}
	
	.articulo {
		width: 99%;
		margin: auto;
	}
	
	.img_pantalla_completa {
		text-align: center;
	}
	
	div#art1 img {
		display: none;
		visibility: hidden;
	}
	
	.art1de2, .art2de2 {
		margin-left: 25%;
		margin-right: 25%;
	}
	
	.art2de2 {
		float: left;
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
	
	div#barra_navegacion {
		display: none;
		visibility: hidden;
	}
	
	.menu_desplegable, .img_pantalla_completa {
		display: block;
		visibility: visible;
	}
	
	.img_pantalla_completa {
		text-align: center;
	}
	
	div#art1 img {
		display: none;
		visibility: hidden;
	}
	
	.art1de2, .art2de2 {
		margin-left: 25%;
		margin-right: 25%;
	}
	
	.art2de2 {
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
	
	.menu_desplegable, .img_pantalla_completa {
		display: none;
		visibility: hidden;
	}
	
	.pie1de3 {
		width: 32%;
	}
	
	div#pie_de_pagina {
		width: 80%;
	}
}
