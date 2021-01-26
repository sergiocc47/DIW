<?php
	
	if(!isset($_GET['nuevo_titulo'])){
		echo "Error en parámetro 'título'";
	}
	else {
		if(empty($_GET['nuevo_titulo'])){
			echo "El parámetro 'título' no puede estar vacío";
		}
		else{
			include("pdo.inc.php");
			
			// me conecto al PDO
			conecta();
			
			if($c==null){
				echo "<p>Error de conexion</p>";
			}
			else{
				// creo la consulta para guardar el nuevo título
				$sql="UPDATE titulos SET titulo='".$_GET['nuevo_titulo']."' WHERE id_titulo='1'";
				//$sql="UPDATE titulos SET titulo WHERE id_titulo='1'";	// prueba depuración
				
				$resultado = $c->query($sql);
				
				print_r($resultado);	// $resultado tiene contenido
				echo "<br>";
				
				if($resultado->rowCount()==0){
				//if($resultado->rowCount()!=0){	//FAIL: cambia igual en la base de datos
					echo "Modificación NO realizada!";
				}
				else{
					while ($registro = $resultado->fetch()) {
						echo "Modificación realizada! -> while";	// prueba depuración
					}
					
					echo "Modificación realizada! -> else";
				}
				
				// cierro la conexion
				$c=null;
				
				
				
			}
		}
			
		echo "<br><a href='index.php'>Volver a INICIO</a>";
	}
	
?>