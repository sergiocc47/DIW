<!doctype html>
<html lang="es">
	<head>
		<title>Actividad 4.2</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="estilo.css"/>
	</head>
	<body>
		<!-- TODO: estilo en CSS -->
		<div id="cabecera">
			<div id="logo">
				<img id="logo" src="./img/conference.png"/>
			</div>
			<div id="titulo">
				<h1>GENERADOR DE CARTELES</h1>
			</div>
		</div>
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
				
				// creo la consulta para mostrar el título
				$sql="SELECT id_cartel,titulo FROM carteles ORDER BY fecha;";
				
				// ejecuto la orden SQL
				$resultado=mysqli_query($c,$sql);
				
				if($resultado){
					// orden SQL correcta
			
					// nos devuelve cuántas filas tiene $resultado
					$filas=mysqli_num_rows($resultado);	// devuelve el nº de filas afectadas
					
					if($filas==0){
						echo "Sin resultados";
						//TODO ¿location?
					}
					else{
						// programamos un bucle que me mueva por
						// el resultado desde la primera fila hasta
						// la última
						
						// el fetch pasa la información a $registro y
						// avanza el puntero a la siguiente fila
						
						while($registro=mysqli_fetch_array($resultado)){
							// guardamos en variables
							$id_cartel=$registro['id_cartel'];
							$titulo=$registro['titulo'];
							
							// mostramos la lista de carteles con sus 
							// respectivos botones EDITAR y ELIMINAR
							// TODO (recomendación Fidel): Eliminar mediante JS
							echo "<a href='cartel.php?id_cartel=$id_cartel'>$titulo</a>
								<form method='post' action='editar.php?id_cartel=$id_cartel'>
									<input type='submit' name='id_cartel' value='$id_cartel' style='display:none'/>
									<input type='submit' name='action' value='Editar'/>
									<input type='submit' name='action' value='Eliminar'/>";
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
			<br/>
			<br/>
			<!-- TODO (duda): necesario form para mandar a php -->
			<input type="submit" name="action" value="Generar nuevo cartel"></input>
		</form>
	</body>
</html>