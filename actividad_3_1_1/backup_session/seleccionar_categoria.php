<!doctype html>
<html lang="es">
	<head>		
		<meta charset="utf-8"/>
		<title>Actividad 3.1.1</title>		
	</head>
	
	<body>
		<?php
			//TODO: borrar si innecesario
			$obra=$_GET['obra'];
			echo '<form action="cambiar.php?obra=$obra" method="get">';
			/*echo '<form action="cambiar.php?obra=<?=$obra?>" method="get">';*/	// si no, meter en HTML
		?>
			Seleccionar categoría:<br/>
			<input type="radio" name="autor" value="Dalí"/>Dalí<br/>
			<input type="radio" name="autor" value="El Bosco"/>El Bosco<br/>
			<input type="radio" name="autor" value="El Greco"/>El Greco<br/>
			<input type="radio" name="autor" value="Goya"/>Goya<br/>
			<input type="radio" name="autor" value="Murillo"/>Murillo<br/>
			<input type="radio" name="autor" value="Picasso"/>Picasso<br/>
			<input type="radio" name="autor" value="Sorolla"/>Sorolla<br/>
			<input type="radio" name="autor" value="Velázquez"/>Velázquez<br/>
			<input type="radio" name="autor" value="Zurbarán"/>Zurbarán<br/>
			<br/>
			<input type="submit" value="Seleccionar"/> 
		</form>
		
		<?php
			/*if(!isset($_GET['autor'])){
				echo "Error, debe seleccionar una categoría.";	// CORREGIR: se muestra desde el principio
				echo "Obra (if): ".$_GET['obra'];	//depuración
			}
			else{
				$autor=$_GET['autor'];
				$obra=$_GET['obra'];
				echo "Obra (else): $obra";	//depuración
				/*$nueva_url_obra=".img/galeria/$autor";
				
				unlink($obra);
				//PRUEBA: rename (de un autor a otro)
				
				echo "Categoría de la obra $obra cambiada!";*/
			//}*/
			
			//echo "Obra (método GET): ".$_GET['obra'];	//depuración
			//echo "<br/>";
			//echo "Obra (variable obra): $obra";	//depuración
			
			session_start();
			$_SESSION['cambio_categoria']=$obra;
		?>
		<br/>
		<a href="index.php">Volver a GALERÍA</a>
	</body>
</html>
