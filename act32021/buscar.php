<?php


$usuario = "root";
$password = "";
$servidor = "localhost";
$bd = "institucion";

$buscar =  $_POST['palabra'];

$conn = new mysqli($servidor,$usuario,$password,$bd);
$sql = "SELECT * FROM registro2 WHERE nombre='$buscar'";
$result = mysqli_query($conn, $sql);


if ($fila = mysqli_fetch_array($result))
  {
    do{  
	   echo "<strong> ID:</strong>".$fila['id'].
	        "<br> <strong> MATRICULA: </trong>" .$fila['matricula'].
			"<br> <strong> NOMBRE: </trong>" .$fila['nombre'].
			"<br> <strong> APELLIDOS: </trong>" .$fila['apellidos'].
			"<br> <strong> TELEFONO: </strong> ".$fila['telefono'].
			"<br> <strong> CORREO: </trong>" .$fila['correo'].  "<hr>";
		}
		
	while ($fila = mysqli_fetch_array($result));
	
} else  
echo "REGISTRO NO ENCONTRADO!!!!! :C";

	

?>