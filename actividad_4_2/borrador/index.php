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
		<div>
			<?php
				
				include("mysql.inc.php"); 
				
				// me conecto a MySQL Server
				conecta();
				
				if($c==null){
					echo "<p>Error de conexion</p>";
				}
				else{
					// Conexión a la BBDD
					mysqli_select_db($c,"bddiwgeneradorcarteles");
					
					// creo la consulta para mostrar el título (ordenado por fecha)
					// $sql="SELECT id_cartel,titulo FROM carteles ORDER BY fecha;";
					$sql="SELECT id_cartel,titulo,fecha,foto FROM carteles ORDER BY fecha;";
					
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
								// guardamos en variables
								$id_cartel=$registro['id_cartel'];
								$titulo=$registro['titulo'];
								$fecha=$registro['fecha'];
								$foto=$registro['foto'];
								
								// mostramos la lista de carteles con sus 
								// respectivos botones EDITAR y ELIMINAR
								// TODO (recomendación Fidel): Eliminar mediante JS
								echo "<p>$fecha</p>
									<a href='cartel.php?id_cartel=$id_cartel'>$titulo</a>
									<form method='post' action='editar.php?id_cartel=$id_cartel'>
										<input type='submit' value='Editar'/>
									</form>
									<form method='post' action='eliminar.php?id_cartel=$id_cartel&foto=$foto'>
										<input type='submit' value='Eliminar'/>
									</form>";
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
		</div>
		<br/>
		<br/>
		<div>
			<form method="post" action="nuevo.php">
				<input type="submit" class="boton_editor" value="NUEVO CARTEL"/>
			</form>
		</div>
	</body>
</html>