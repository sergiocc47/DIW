<?php
	
	if(!isset($_GET['nuevo_titulo'])){
		echo "Error en parámetro 'Nuevo Título'";
	}
	else {
		if(empty($_GET['nuevo_titulo'])){
			echo "El parámetro 'Nuevo Título' no puede estar vacío";
		}
		else{
			include("pdo.inc.php");
			
			// me conecto al PDO
			conecta();
			
			if($c==null){
				echo "<p>Error de conexion</p>";
				//echo "<br><a href='index.php'>Volver a INICIO</a>";
			}
			else{
				// creo la consulta para guardar el nuevo título
				$sql="UPDATE titulos SET titulo='".$_GET['nuevo_titulo']."' WHERE id_titulo='1'";
				//$sql="UPDATE titulos SET titulo='".$_GET['nuevo_titulo']."' WHERE id_titulo='5'";	// prueba depuración
				//$sql="UPDATE titulos SET titulo WHERE id_titulo='1'";	// prueba depuración
				
				//TODO: comprobar que la query es correcta (si el cambio a 
				// afectado a alguna fila
				$resultado = $c->query($sql);
				/*
				print_r($resultado);	// $resultado tiene contenido
				echo "<br>";
				*/
				if($resultado->rowCount()==0){
				//if($resultado->rowCount()!=0){	//FAIL: cambia igual en la base de datos
					//echo "Sin resultados";
					echo "Modificación NO realizada!";
				}
				else{
					while ($registro = $resultado->fetch()) {
						echo "Modificación realizada! -> while";	// prueba depuración
						echo "El nuevo título es: '".$registro['titulo']."' -> while";
					}
					
					echo "Modificación realizada! -> else";
					echo "El nuevo título es: '".$registro['titulo']."' -> else";	//FAIL: no muestra título nuevo
					//DUDA: si cambia el título de todas formas ¿por qué da el siguiente Notice?
					//Notice: Trying to access array offset on value of type bool in C:\xampp\htdocs\diw\practica_video\PDO\borrador_2archivosPHP\cambiar_titulo.php on line 45
				}
				
				// cierro la conexion
				$c=null;
				/*
				header("Location: index.php");
				exit;
				*/
			}
		}
		
		echo "<br><a href='index.php'>Volver a INICIO</a>";
	}
	
?>