<?php
$id=$_POST['id'];
$matricula=$_POST['matricula'];
$nombre=$_POST['nombre'];
$apellidos=$_POST['apellidos'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];
$fechaent=$_POST['fechaent'];
$horaent=$_POST['horaent'];
$fechasal=$_POST['fechasal'];
$horasal=$_POST['horasal'];



$usuario = "root";
$password = "";
$servidor = "localhost";
$bd = "institucion";

$conn = new mysqli($servidor,$usuario,$password,$bd);
$query = "INSERT INTO registro1(id, matricula, nombre, apellidos, telefono, correo, fechaent, horaent, fechasal, horasal) VALUES ('$id','$matricula','$nombre','$apellidos','$telefono','$correo','$fechaent','$horaent','$fechasal','$horasal')";

$insert = mysqli_query($conn,$query);

if ($insert === TRUE)  {
	echo "<a href='index2.html'>CAPTURAR OTRO REGISTRO</a>";
	
} else  {
    echo "Error: c:c";
}

	
mysqli_close($conn);
?>