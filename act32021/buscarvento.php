<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="CSS/buscar.css">
<body>
	<center>
		<font color="BLUE"><h1>BUSCA DE AUTOS VENTOS</h1></font>
		<form action = "<?php echo $_SERVER['PHP_SELF']?>" method = "post">
			<table>
				<tr><td><strong>NOMBRE: </strong></td><td><input type="text" name="nombre" size="30"></td></tr>
				<tr><input type="submit" name="BUSCAR" value = "BUSCAR REGISTRO"></td></tr>
			</table>
		</form>
	</center>

<?php
$usuario = "root";
$password = "";
$servidor = "localhost";
$bd = "venta";
$conn = new mysqli($servidor,$usuario,$password,$bd);

if (isset($_POST['BUSCAR']))
{
	$buscar = $_POST['nombre'];
	$sql = "SELECT * FROM vento WHERE idc='$buscar'";
	$result = mysqli_query($conn, $sql);

	if ($fila = mysqli_fetch_array($result))
	{
		do{
			echo "<table style=\"width: 800px;\"border=1>

			<tr>
			<th id=fila12>idc</th>
			<th id=fila12>color</th>
			<th id=fila12>nombre</th>
			<th id=fila12>direccion</th>
			<th id=fila12>telefono</th>
			</tr>

			<tr>
			<td style=\"width: 53px; overflow: auto;\" id=fila22>".$fila['idc']."</td>
			<td style=\"width: 194px; overflow: auto;\" id=fila22>".$fila['color']."</td>
			<td style=\"width: 255px; overflow: auto;\" id=fila22>".$fila['nombre']."</td>
			<td style=\"width: 255px; overflow: auto;\" id=fila22>".$fila['direccion']."</td>
			<td id=fila22>".$fila['telefono']."</td>
			</tr>

			</table>";
		}
		while ($fila = mysqli_fetch_array($result));
	}
	else 
		echo "PRODUCTO NO ENCONTRADO!!!!";
}
mysqli_close($conn);
?>
</body>
</html>