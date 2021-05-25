<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modificar datos de persona </title>
    <link href="../../../css/estilo.css" rel="stylesheet" />
    <link href="../../../css/layout.css" rel="stylesheet" />
    
</head>
<body>
<a href="../../../public/vista/login.html"><img src="../../../images/Agenda Telefonica.jpg"></a>
    <nav>
            <ul>
            <li><a href="../../../public/controladores/indexBusqueda.php">Búsqueda de Contactos</a></li>
            <li><a href="../../../public/vista/crearUsuario.html">Registrarse</a></li>
            <li><a href="../../../public/vista/login.html">Iniciar Sesión</a></li>
            </ul>
    </nav>
<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
    header("Location: ../../../public/vista/login.html");
    }
    //incluir conexión a la base de datos
    include '../../../config/conexionBD.php';
    $codigo = $_POST["codigo"];
    $contrasena1 = isset($_POST["contrasena1"]) ? trim($_POST["contrasena1"]) : null;
    $contrasena2 = isset($_POST["contrasena2"]) ? trim($_POST["contrasena2"]) : null;
    $sqlContrasena1 = "SELECT * FROM usuarios where usu_id = $codigo and usu_password=MD5('$contrasena1')";
    $result1 = $conn->query($sqlContrasena1);

    if ($result1->num_rows > 0) {
        date_default_timezone_set("America/Guayaquil");
        $fecha = date('Y-m-d H:i:s', time());
        $sqlContrasena2 = "UPDATE usuarios " .
        "SET usu_password = MD5('$contrasena2'), " .
        "usu_fecha_modificacion = '$fecha' " .
        "WHERE usu_id = $codigo";
        if ($conn->query($sqlContrasena2) === TRUE) {
            echo "<h1>Su contraseña a sido actualizada</h1><br>"; 
        } else {
            echo "<p>Error: " . mysqli_error($conn) . "</p>";
        }

    }else{
        echo "<h1>La contraseña actual esta incorrecta </h1>";
    }

    $conn->close();
?>
</body>
<footer>
      Paul Guzhñay &amp; Joseph Reinoso - Universidad Politécnica Salesiana 
        <br/>&copy; Todos los derechos reservados
</footer>
</html>