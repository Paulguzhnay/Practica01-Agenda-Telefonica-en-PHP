<!DOCTYPE html>
<html>
<head>
    <link href="../../../css/estilo.css" rel="stylesheet" />
    <link href="../../../css/layout.css" rel="stylesheet" />
    <meta charset="UTF-8">
    <script type="text/javascript" src="../../controladores/user/buscarUser.js"></script>
    <title>Tu Usuario</title>
</head>
<body>
    <header>
    <a href="../../../index.html"><img src="../../../images/Agenda Telefonica.jpg"></a>
        
    </header>
    <br>
    <?php
     session_start();
     if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
     header("Location: ../../../public/vista/login.html");
     }
    include '../../../config/conexionBD.php';
    $correo  = $_SESSION['usuario'];
    echo("<h1>Datos Personales</h1>");
    $sql = "SELECT usu_cedula FROM usuarios WHERE usu_mail = '$correo'";
    $result5 = $conn->query($sql);
    while ($row1 = $result5->fetch_assoc()){
        if($row1['usu_cedula']){
            $cedulacom = $row1['usu_cedula'];
        }
    }
    $sql3 = "SELECT * FROM usuarios WHERE usu_eliminado = 'N' and usu_mail = '$correo'";
    $sql2 = "SELECT * FROM telefonos WHERE usuarios_usu_id ='$cedulacom'";
    $result = $conn->query($sql3);
    $result2= $conn->query($sql2);
    //    TABLA DE OPCIONES 
    echo " <table style='width:100%' border='1' align='center'>
        <tr>
        <th>Cédula</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Correo</th>
        <th>Fecha Nacimiento</th>
        </tr>";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo " <td>" . $row['usu_cedula'] . "</td>";
            echo " <td>" . $row['usu_nombre'] ."</td>";
            echo " <td>" . $row['usu_apellido'] . "</td>";
            echo " <td>" . $row['usu_mail'] . "</td>";
            echo " <td>" . $row['usu_nacimiento'] . "</td>";
            echo " <td> <a href='eliminar.php?codigo=" . $row['usu_id'] . "'>Eliminar</a> </td>";
            echo " <td> <a href='modificar.php?codigo=" . $row['usu_id'] . "'>Modificar</a> </td>";
            echo " <td> <a href='cambiar_contrasena.php?codigo=" . $row['usu_id'] . "'>Cambiar Contraseña</a> </td>";
            echo "</tr>";
        } 
    } else {
    echo "<tr>";
    echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
    echo "</tr>";
    }
    echo "</table>";
    echo("<h1>Tus Contactos</h1>");
    echo " <table style='width:100%' border='1' align='center'>
    <tr>
    <th>Telefono</th>
    <th>Operadora</th>
    <th>Tipo</th>
    </tr>";
    if ($result2->num_rows > 0) {
        while($row = $result2->fetch_assoc()) {
            echo "<tr>";
            echo " <td>" . $row['telf_numero'] . "</td>";
            echo " <td>" . $row['telf_operadora'] ."</td>";
            echo " <td>" . $row['telf_tipo'] . "</td>";
            echo " <td> <a href='eliminar_numero.php?codigo=" . $row['telf_id'] . "'>Eliminar</a> </td>";
            echo " <td> <a href='modificar-numero.php?codigo=" . $row['telf_id'] . "'>Modificar Numero</a> </td>";
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
    <form id='formulario01' method='POST' action='../../../config/cerrarSesion.php'>
    <input type='submit' id='cerrar' name='cerrar' value='Cerrar Sesión' /> </form> 
</body>
<footer>
      Paul Guzhñay &amp; Joseph Reinoso - Universidad Politécnica Salesiana 
        <br/>&copy; Todos los derechos reservados
</footer>
</html>