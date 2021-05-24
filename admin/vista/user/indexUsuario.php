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
        <a href="../../../public/vista/login.html"><img src="../../../images/Agenda Telefonica.jpg"></a>
    </header>


    <br>
    <?php
 // session_start();
//  if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
//  header("Location: /SistemaDeGestion/public/vista/login.html");
 // }
 include '../../../config/conexionBD.php';
 $mail = $_GET['mail'];
 $sql = "SELECT usu_id FROM usuario WHERE usu_mail=$mail";
 $result = $conn->query($sql);
//    TABLA DE OPCIONES 


if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo " <td> <a href='eliminar.php?codigo=" . $row['usu_id'] . "'>Eliminar</a> </td>";
        echo " <td> <a href='modificar.php?codigo=" . $row['usu_id'] . "'>Modificar</a> </td>";
        echo " <td> <a href='cambiar_contrasena.php?codigo=" . $row['usu_id'] . "'>Cambiar
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

</body>
<footer>
      Paul Guzhñay &amp; Joseph Reinoso - Universidad Politécnica Salesiana 
        <br/>&copy; Todos los derechos reservados
</footer>
</html>