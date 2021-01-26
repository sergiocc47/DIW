<!doctype html>
<html lang="es">
	<head>
		<title>Actividad 4.2</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="estilo.css"/>
	</head>
	<?php
		
		include("mysql.inc.php"); 
				
		// me conecto a MySQL Server
		conecta();
		
		if($c==null){
			echo "<p>Error de conexion</p>";
		}
		else{
			// Ordenes SQL
			// Conexión a la BBDD
			mysqli_select_db($c,"bddiwgeneradorcarteles");
			
			// creo la consulta para mostrar la información del cartel
			$sql="SELECT titulo,ponente,lugar,fecha,foto,texto_explicativo,color_fondo FROM carteles WHERE id_cartel='".$_REQUEST['id_cartel']."'";
			
			// ejecuto la orden SQL
			$resultado=mysqli_query($c,$sql);
			
			if($resultado){
				// orden SQL correcta
		
				// nos devuelve cuántas filas tiene $resultado
				$filas=mysqli_num_rows($resultado);	// devuelve el nº de filas afectadas
				
				if($filas==0){
					echo "Sin resultados";
				}
				else{
					// programamos un bucle que me mueva por
					// el resultado desde la primera fila hasta
					// la última
					
					// el fetch pasa la información a $registro y
					// avanza el puntero a la siguiente fila
					
					while($registro=mysqli_fetch_array($resultado)){
						/*
						//TODO: eliminar (depuración)
						echo "<p><b>DATOS CARGADOS DESDE BDDIWGENERADORCARTELES</b></p>";
						echo $registro['titulo']."<br/>";
						echo $registro['ponente']."<br/>";
						echo $registro['lugar']."<br/>";
						echo $registro['fecha']."<br/>";
						echo $registro['foto']."<br/>";
						echo $registro['texto_explicativo']."<br/>";
						echo $registro['color_fondo']."<br/>";
						*/
						
						// guardamos los datos de la BBDD en variables
						$titulo=$registro['titulo'];
						$ponente=$registro['ponente'];
						$lugar=$registro['lugar'];
						$fecha=$registro['fecha'];
						$foto=$registro['foto'];
						$texto_explicativo=$registro['texto_explicativo'];
						$color_fondo=$registro['color_fondo'];
					}
				}
				
			}
			else{
				// orden SQL incorrecta. Incluido el error Duplicate key
				$error=mysqli_error($c);
				// lo correcto es enviar el error a un LOG y no
				// mostrar errores concretos por pantalla, pero mientras
				// programamos nos es útil verlo en pantalla
				echo $error;
			}
			
			// cierro la conexion
			mysqli_close($c);
		}
		
	?>
	<body bgColor="<?=$color_fondo?>">
		<div id="cabecera">
			<!-- TODO (eliminar): el cartel no necesita logo -->
			<!--div id="logo">
				<img id="logo" src="./img/logo.png"/>
			</div-->
			<div id="titulo_cartel">
				<h1><?=$titulo?></h1>
			</div>
		</div>
		<div id="ponentes">
			<h2>PONENTES</h2>
			<p><?=$ponente?></p>
		</div>
		<div id="lugar">
			<h2>LUGAR</h2>
			<p><?=$lugar?></p>
		</div>
		<div id="fecha">
			<h2>FECHA</h2>
			<!-- TODO: mostrar en formato dd/mm/aaaa -->
			<p><?=$fecha?></p>
		</div>
		<div id="foto">
			<img src="<?=$foto ?>"/><br/>
		</div>
		<div id="texto_explicativo">
			<h2>TEXTO EXPLICATIVO</h2>
			<p><?=$texto_explicativo?></p>
		</div>
		
		<!-- TODO: botón imprimir/convertir a PDF -->
		<!-- Ver directorio C:\xampp\htdocs\practicas6\practica_pdf -->
		
	</body>
</html>