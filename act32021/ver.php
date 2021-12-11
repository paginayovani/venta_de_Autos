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
      $baseDeDatos ="institucion";
 
      // Nombre de la tabla a trabajar
      $tabla = "registro2";
 
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
         $queryUpdate = "UPDATE $tabla SET Nombre = '".$_POST['nombreForm']."',
                        Apellidos = '".$_POST['apellidoForm']."',
						Matricula = '".$_POST['matriculaForm']."',
						Telefono = '".$_POST['telefonoForm']."',
						Correo = '".$_POST['correoForm']."'						
                        WHERE ID = ".$_POST['idForm'].";";
 
         $resultUpdate = mysqli_query($link, $queryUpdate); 
 
         if($resultUpdate)
         {
            echo "<strong>El registro ID ".$_POST['idForm']." con exito</strong>. <br>";
         }
         else
         {
            echo "No se pudo actualizar el registro. <br>";
         }
 
      }
 
      $query = "SELECT ID, Nombre, Apellidos, Matricula, Telefono, Correo FROM $tabla;";
 
      $result = mysqli_query($link, $query); 
 
      ?>
 
      <table>
         <tr>
            <td>Nombre.......   </td>
            <td>Apellidos................   </td>
			<td>Matricula.....   </td>
			<td>Telefono................  </td>
			<td>Correo...............    </td>
			
         <tr>
 
      <?php
 
      while($row = mysqli_fetch_array($result))
      { 
         echo "<tr>";
         echo "<td>";
         echo $row["Nombre"];
         echo "</td>";
         echo "<td>";
         echo $row["Apellidos"];
         echo "</td>";
		 
         echo "<td>";
         echo $row["Matricula"];
         echo "</td>";
		  
         echo "<td>";
         echo $row["Telefono"];
         echo "</td>";
		 
         echo "<td>";
         echo $row["Correo"];
         echo "</td>";
         echo "<td>";
         echo "<a href=\"?id=".$row["ID"]."\">Actualizar</a>";
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
         $querySelectByID = "SELECT ID, Nombre, Apellidos, Matricula, Telefono, Correo FROM $tabla WHERE ID = ".$_GET['id'].";";
 
         $resultSelectByID = mysqli_query($link, $querySelectByID); 
 
         $rowSelectByID = mysqli_fetch_array($resultSelectByID);
      ?>
 
      <form action="" method="post">
         <input type="hidden" value="<?=$rowSelectByID['ID'];?>" name="idForm">
         Nombre: <input type="text" name="nombreForm" value="<?=$rowSelectByID['Nombre'];?>"> <br> <br>
         Apellidos: <input type="text" name="apellidoForm" value="<?=$rowSelectByID['Apellidos'];?>"> <br> <br>
		 Matricula: <input type="text" name="matriculaForm" value="<?=$rowSelectByID['Matricula'];?>"> <br> <br>
		 Telefono: <input type="text" name="telefonoForm" value="<?=$rowSelectByID['Telefono'];?>"> <br> <br>
		 Correo: <input type="text" name="correoForm" value="<?=$rowSelectByID['Correo'];?>"> <br> <br>
         <input type="submit" value="Guardar">
      </form>
 
      <?php
      }
      mysqli_close($link);
      ?>
      </body> 
      </html>