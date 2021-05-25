<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modificar datos de persona </title>
    <link href="../../../css/estilo.css" rel="stylesheet" />
    <link href="../../../css/layout.css" rel="stylesheet" />
</head>
<body>
<header>
    <a href="../../../public/vista/login.html"><img src="../../../images/Agenda Telefonica.jpg"></a>
    <nav>
            <ul>
            <li><a href="../../../public/controladores/indexBusqueda.php">Búsqueda de Contactos</a></li>
            <li><a href="../../../public/vista/crearUsuario.html">Registrarse</a></li>
            <li><a href="../../../public/vista/login.html">Iniciar Sesión</a></li>
            </ul>
    </nav>
</header>
<br>
<?php
     session_start();
     if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
     header("Location: ../../../public/vista/login.html");
     }
    //incluir conexión a la base de datos
    
    include '../../../config/conexionBD.php';
    $codigo = $_POST["codigo"];
    $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
    $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
    $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
    $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
    $fechaNacimiento = isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]): null;
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());
    $sql = "UPDATE usuarios " .
    "SET usu_cedula = '$cedula', " .
    "usu_nombre = '$nombres', " .
    "usu_apellido = '$apellidos', " .
    "usu_mail = '$correo', " .
    "usu_nacimiento = '$fechaNacimiento', " .
    "usu_fecha_modificacion = '$fecha' " .
    "WHERE usu_id = $codigo";
    if ($conn->query($sql) === TRUE) {
        echo "<h1>Se han Actualizado sus Datos de Manera Correcta</h1><br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
    }
    $conn->close();
?>
<footer>
      Paul Guzhñay &amp; Joseph Reinoso - Universidad Politécnica Salesiana 
        <br/>&copy; Todos los derechos reservados
</footer>
</body>
</html>
