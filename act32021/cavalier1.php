<html>
<head>
<link rel="stylesheet" href="CSS/consultas.css">
</head>
<body>
<font color="#AC7490 "><h1> AUTOS CAVALIER</h1> </font>
<?php
$usuario="root";
$password="";
$servidor="localhost";
$bd="venta";

$conn=new mysqli($servidor,$usuario,$password,$bd);
$consulta="SELECT * FROM cavalier";
$resultado= mysqli_query($conn,$consulta);

echo "<table style=\"width:800px;\" border =1 id=cabecera>
      <tr> <th>ID</th> <th>COLOR</th> <th>NOMBRE</th>  <th>DIRECCION</th> <th>TELEFONO</th> </tr>
      </table>";

while ($fila = mysqli_fetch_array($resultado))
{
    echo "<table style=\"width: 800px;\" border=1 id=fila>
    <tr><td style=\"width:45px; overflow:auto;\">".$fila['idc']."</td><td style=\"width:135px;\">".$fila['color']."</td><td style=\"width:165px;\">".$fila['nombre']."</td><td style=\"width:210px;\">".$fila['direccion']."</td> <td>" .$fila['telefono']."</td> </tr>
    </table>";
   
}

?>
<br><br><br><br><br>
<a href="index.html">VOLVER</a>
</body>
  </html>