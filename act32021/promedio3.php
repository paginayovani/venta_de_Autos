<?php
$idc=$_POST['idc'];
$color=$_POST['color'];
$nombre=$_POST['nombre'];
$direccion=$_POST['direccion'];
$telefono=$_POST['telefono'];



$usuario = "root";
$password = "";
$servidor = "localhost";
$bd = "venta";

$conn = new mysqli($servidor,$usuario,$password,$bd);
$query = "INSERT INTO gold(idc, color, nombre, direccion, telefono) VALUES ('$idc','$color','$nombre','$direccion','$telefono')";

$insert = mysqli_query($conn,$query);

if ($insert === TRUE)  {
	echo "<a href='gold.html'>CAPTURAR OTRO REGISTRO</a>";
	
} else  {
    echo "Error: c:c";
}

	
mysqli_close($conn);
?>