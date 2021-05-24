<!DOCTYPE html>
<html>
<head>
    <link href="../../../css/estilo.css" rel="stylesheet" />
    <link href="../../../css/layout.css" rel="stylesheet" />
    <meta charset="UTF-8">
    <script type="text/javascript" src="../../controladores/user/buscarUser.js"></script>
    <title>Gestión de Usuarios</title>
</head>
<body>
    <header>
        <a href="../../../index.html"><img src="../../../images/Agenda Telefonica.jpg"></a>
    </header>
<!--
    BOTON CEDULA 
-->

    <br>
    <table style="width:100%">
 <tr>
 <th>Cedula</th>
 <th>Nombres</th>
 <th>Apellidos</th>
 <th>Correo</th>
 <th>Fecha Nacimiento</th>
 <th>Estado</th>
 </tr>
 </tr>
 <?php
  //session_start();
  //if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
  //header("Location: /SistemaDeGestion/public/vista/login.html");
  //}
 include '../../../config/conexionBD.php';
 $sql = "SELECT * FROM usuarios ";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo " <td>" . $row["usu_cedula"] . "</td>";
        echo " <td>" . $row['usu_nombre'] ."</td>";
        echo " <td>" . $row['usu_apellido'] . "</td>";
        echo " <td>" . $row['usu_mail'] . "</td>";
        echo " <td>" . $row['usu_nacimiento'] . "</td>";
        echo " <td>" . $row['usu_eliminado'] . "</td>";
        echo " <td> <a href='eliminar.php?id=" . $row['usu_id'] . "'>Eliminar</a> </td>";
        echo " <td> <a href='modificar.php?id=" . $row['usu_id'] . "'>Modificar</a> </td>";
        echo " <td> <a href='cambiarContra.php?id=" . $row['usu_id'] . "'>Cambiar
       contraseña</a> </td>";
        echo "</tr>";
       }

       
 } else {
 echo "<tr>";
 echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
 echo "</tr>";
 }
 echo " <td> <a href='../../../config/cerrar_sesion.php'>Cerrar Sesion</a> </td>";

 $conn->close();
 ?>
 </table>

</body>
</html>