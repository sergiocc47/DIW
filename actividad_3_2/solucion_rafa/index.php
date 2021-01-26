<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <title>titulo</title>
</head>
<body>
    <div id="cabecera">
        <img src="./img/logo.jfif" alt="">
        <h1>Reproductor de musica</h1>
    </div>

<div id="cuerpo">
        <div class="musica">
        <?php
        $c=0;
        $dir = opendir("./musica/");

        while ($file = readdir($dir)) {
            if (!is_dir($file)) {
                $c++;
                echo "$file pista $c <audio src='musica/$file' id='$c'></audio>
                <div class='botones'>
                <button onclick='document.getElementById($c).play()'><img src='./img/Play.png'/></button>
                <button onclick='document.getElementById($c).pause()'><img src='./img/pause.png'/></button>
                <button onclick='document.getElementById($c).volume+=0.1'><img src='./img/mas.png'/></button>
                <button onclick='document.getElementById($c).volume-=0.1'><img src='./img/menos.png'/></button></br>
                </div>";
            }
        }  
       
        ?>
        <br/><form action="subir.php" method="post" enctype="multipart/form-data"> 		
			Selecciona el archivo a subir al servidor <br/>
			<input name="archivo" type="file" />  
			<br/><br/>
            <input type="submit" value="Enviar" /> 
            <br/>			
        </form>
        </div>
    </div>
</body>
</html>