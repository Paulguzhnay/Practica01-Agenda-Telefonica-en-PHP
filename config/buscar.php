<?php
 //incluir conexión a la base de datos
 include "conexionBD.php";
 $cedula = $_GET['cedula'];
 //echo "Hola " . $cedula;
if(strlen($cedula)==10){
    $sql = "SELECT * FROM usuario WHERE usu_eliminado = 'N' and usu_cedula='$cedula'";
}else {
    $sql = "SELECT * FROM usuario WHERE usu_eliminado = 'N' and usu_mail='$cedula'";
}
//cambiar la consulta para puede buscar por ocurrencias de letras
 $result = $conn->query($sql);
 echo " <table style='width:100%'>
 <tr>
 <th>Cedula</th>
 <th>Nombres</th>
 <th>Apellidos</th>
 <th>Telefono</th>
 <th>Correo</th>
 <th>Fecha Nacimiento</th>
 <th></th>
 <th></th>
 <th></th>
 </tr>";
 if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {

 echo "<tr>";
 echo " <td>" . $row['usu_cedula'] . "</td>";
 echo " <td>" . $row['usu_nombre'] ."</td>";
 echo " <td>" . $row['usu_apellido'] . "</td>";
 echo " <td>" . $row['usu_telefono'] . "</td>";
 echo " <td>" . $row['usu_correo'] . "</td>";
 echo " <td>" . $row['usu_nacimiento'] . "</td>";
 echo "</tr>";
 }
 } else {
 echo "<tr>";
 echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
 echo "</tr>";
 }
 echo "</table>";
 $conn->close();

?>