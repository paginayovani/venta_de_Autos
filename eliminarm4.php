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
$sql = "DELETE FROM vento WHERE idc='$idc'";
$resultado = mysqli_query($conn, $sql);

if($resultado == 1){
   echo " ELIMINADO CORRECTAMENTE ";
    
}else{
    echo "ERROR NO SE ENCONTRO EL PRODUCTO ";
}

 echo"<center><a href=eliminarvento.html>salir</a></center>";


 ?>
 </p>
<center><a href="eliminarvento.php">ELIMINAR OTRO PRODUCTO</a></CENTER>
	
</body>
</html>