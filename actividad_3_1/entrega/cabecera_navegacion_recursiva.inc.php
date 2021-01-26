<?php
	echo "<div id='cabecera'>
			<div id='logo'>
				<a href='index.php'>
					<img src='./img/logo.gif'/>
				</a>
			</div>
			<div id='navegacion_recursiva'>
				<ul>
					<li><a href='#'>Inicio</li>
					<li><a href='#'>Mapa web</a></li>
					<li><a href='#'>Directorio</a></li>
					<li><a href='#'>Accesibilidad</a></li>
				</ul>
				<a style='float:right;'>english web site</a>
			</div>
			<div id='menu_imagen'>
				<ul>
					<li><a href='menu_subir.php'>Subir imagen</li>
					<li><a href='menu_eliminar.php'>Eliminar imagen</a></li>
					<li><a href='menu_cambiar.php'>Cambiar imagen de categoría</a></li>
				</ul>
			</div>
			<div id='titulo_principal'>
				<p>Pintores españoles: Licencias para el uso de sus obras</p>
			</div>
			<div id='buscador'>
				<form action='#' method='get'>
					<input type='text'/>
					<input id='boton_buscar' type='submit' value='Buscar'/> 
				</form>
			</div>
		</div>";
?>