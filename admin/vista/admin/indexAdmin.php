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
    <table style="width:100%" border='1' align='center'  >
  
 <tr>
 <th colspan ='6'>  Datos Personales</th>
 <th colspan ='3'>  Opciones Administrador</th>
</tr>
<tr>
 <th>Cedula</th>
 <th>Nombres</th>
 <th>Apellidos</th>
 <th>Correo</th>
 <th>Fecha Nacimiento</th>
 <th>Estado</th>
 <th>Eliminar Usuario</th>
 <th>Modificar Datos</th>
 <th>Cambiar contraseña</th>
</tr>

 <?php
 session_start();
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
 header("Location: ../../../public/vista/login.html");
 }
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
        echo " <td> <a href='cambiarContra.php?id=" . $row['usu_id'] . "'>Cambiar contraseña</a> </td>";
        echo "</tr>";
       }
 } else {
    echo "<tr>";
    echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
    echo "</tr>";
 }


 $conn->close();
 ?>

</table>
<br>
<br>
<br>
<table >
<td> <a href='../../../public/vista/crearUsuario.html'>Agregar </a> </td>
<td> <a href='indexBusquedaAdmin.php'>Buscar </a> </td>

</table>
<form id='formulario01' method='POST' action='../../../config/cerrarSesion.php'>
 <input type='submit' id='cerrar' name='cerrar' value='Cerrar Sesión' /> </form> 

<br>
<br>
<br>    

</body>
<footer>
      Paul Guzhñay &amp; Joseph Reinoso - Universidad Politécnica Salesiana 
        <br/>&copy; Todos los derechos reservados
</footer>
</html>