<?php
$usuario = "root";
$password = "";
$servidor = "localhost";
$bd = "institucion";

$conn = new mysqli($servidor,$usuario,$password,$bd);

$consulta = "SELECT * FROM registro2";
$resultado = mysqli_query($conn,$consulta);

while ($fila = mysqli_fetch_array($resultado))
{
     echo "ID: ".$fila['id'].
           "<br> MATRICULA: ".$fila['matricula'].
		   "<br> NOMBRE: ".$fila['nombre'].
		   "<br> APELLIDO: ".$fila['apellidos'].
		   "<br> TELEFONO: ".$fila['telefono'].
		   "<br> CORREO: ".$fila['correo']. "<hr>";
}
?>