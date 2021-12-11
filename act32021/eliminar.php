<?php
$usuario="root";
$password="";
$servidor="localhost";
$bd="institucion";

$eliminar=$_POST['id'];

$conn= new mysqli($servidor,$usuario,$password,$bd);
$sql="DELETE FROM registro1 where id='$eliminar'";
$result= mysqli_query($conn,$sql);
if($result==1)
{
    echo "USUARIO ELIMINADO";
    
}else {
    echo "NO SE ENCONTRO EL USUARIO";
}
echo "<a href='eliminar.html'>REGRESAR</a>";
?>
