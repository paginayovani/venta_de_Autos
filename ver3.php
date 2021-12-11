<html> 
      <head>
         <title>Ejemplo de actualización de datos en base de datos MySQL</title>
      </head> 
 
      <body>
 
      <?php
 
      // Dirección o IP del servidor MySQL
      $host = "localhost";
 
      // Puerto del servidor MySQL
      $puerto = "3306";
 
      // Nombre de usuario del servidor MySQL
      $usuario = "root";
 
      // Contraseña del usuario
      $contrasena = "";
 
      // Nombre de la base de datos
      $baseDeDatos ="venta";
 
      // Nombre de la tabla a trabajar
      $tabla = "gold";
 
      function Conectarse()
      {
         global $host, $puerto, $usuario, $contrasena, $baseDeDatos, $tabla;
 
         if (!($link = mysqli_connect($host.":".$puerto, $usuario, $contrasena))) 
         { 
            echo "Error conectando a la base de datos.<br>"; 
            exit(); 
            }
         else
         {
            echo "Listo, estamos conectados.<br>";
         }
         if (!mysqli_select_db($link, $baseDeDatos)) 
         { 
            echo "Error seleccionando la base de datos.<br>"; 
            exit(); 
         }
         else
         {
            echo "Obtuvimos la base de datos $baseDeDatos sin problema.<br>";
         }
      return $link; 
      } 
 
      $link = Conectarse();
 
      if($_POST)
      {
         $queryUpdate = "UPDATE $tabla SET Color = '".$_POST['colorForm']."',
                    	Nombre = '".$_POST['nombreForm']."',
						Direccion = '".$_POST['direccionForm']."',
						Telefono = '".$_POST['telefonoForm']."'
						WHERE IDC = ".$_POST['idcForm'].";";
 
         $resultUpdate = mysqli_query($link, $queryUpdate); 
 
         if($resultUpdate)
         {
            echo "<strong>El registro IDC ".$_POST['idcForm']." con exito</strong>. <br>";
         }
         else
         {
            echo "No se pudo actualizar el registro. <br>";
         }
 
      }
 
      $query = "SELECT IDC, Color, Nombre, Direccion, Telefono FROM $tabla;";
 
      $result = mysqli_query($link, $query); 
 
      ?>
 
      <table>
         <tr>
            <td>Color.......   </td>
            <td>Nombre................   </td>
			<td>Dirección.....   </td>
			<td>Telefono................  </td>
	         <tr>
 
      <?php
 
      while($row = mysqli_fetch_array($result))
      { 
         echo "<tr>";
         echo "<td>";
         echo $row["Color"];
         echo "</td>";
         echo "<td>";
         echo $row["Nombre"];
         echo "</td>";
		 
         echo "<td>";
         echo $row["Direccion"];
         echo "</td>";
		  
   
		 		 
         echo "<td>";
         echo "<a href=\"?idc=".$row["IDC"]."\">Actualizar</a>";
         echo "</td>";
         echo "</tr>";
 
      } 
 
      mysqli_free_result($result); 
 
      ?>
 
      </table>
      <hr>
 
      <?php
      if($_GET)
      {
         $querySelectByID = "SELECT IDC, Color, Nombre, Direccion, Telefono FROM $tabla WHERE IDC = ".$_GET['idc'].";";
 
         $resultSelectByID = mysqli_query($link, $querySelectByID); 
 
         $rowSelectByID = mysqli_fetch_array($resultSelectByID);
      ?>
 
      <form action="" method="post">
         <input type="hidden" value="<?=$rowSelectByID['IDC'];?>" name="idcForm">
          Color: <input type="text" name="colorForm" value="<?=$rowSelectByID['Color'];?>"> <br> <br>
         Nombre: <input type="text" name="nombreForm" value="<?=$rowSelectByID['Nombre'];?>"> <br> <br>
		 Direccion: <input type="text" name="direccionForm" value="<?=$rowSelectByID['Direccion'];?>"> <br> <br>
		 Telefono: <input type="text" name="telefonoForm" value="<?=$rowSelectByID['Telefono'];?>"> <br> <br>
		
         <input type="submit" value="Guardar">
      </form>
 
      <?php
      }
      mysqli_close($link);
      ?>
      </body> 
      </html>