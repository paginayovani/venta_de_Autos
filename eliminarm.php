<html>
<head>
	<meta charset="UTF-8"/>
	<meta name="description" content="Ejemplo de HTML5">
	<meta name="keywords" content="HTML5,CSS3">
	<title>Eliminar</title>
	<link rel="stylesheet" href="CSS/misestilos.css">
</head>
<body>

<center><font color="black"><h1>RESULTADO DE LA ELIMINACION</h1></font></center>

<?php
$usuario = "root";
$password = "";
$servidor = "localhost";
$bd = "venta";
$idc = $_POST['idc'];
$conn = new mysqli($servidor,$usuario,$password,$bd);
$sql = "DELETE FROM cavalier WHERE idc='$idc'";
$resultado = mysqli_query($conn, $sql);

if($resultado == 1){
   echo " ELIMINADO CORRECTAMENTE ";
    
}else{
    echo "ERROR NO SE ENCONTRO EL PRODUCTO ";
}

 echo"<center><a href=eliminarcavalier.html>salir</a></center>";


 ?>
 </p>
<center><a href="eliminarcavalier.php">ELIMINAR OTRO PRODUCTO</a></CENTER>
	
</body>
</html>