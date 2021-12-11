<?php
$usuario="root";
$password="";
$servidor="localhost";
$bd="institucion";
$eliminar=$_POST['nombre'];

$conn= new mysqli($servidor,$usuario,$password,$bd);
$sql="DELETE FROM registro1 where nombre='$eliminar'";
$result= mysqli_query($conn,$sql);
if($result==1)
{
    echo "USUARIO ELIMINADO";

}else {
    echo "USUARIO NO ENCONTRADO";
}
    echo "<a href='eliminar.html'>REGRESAR</a>";
?>
