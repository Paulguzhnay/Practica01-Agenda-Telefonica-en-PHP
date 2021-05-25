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
    $numero = isset($_POST["numero"]) ? trim($_POST["numero"]) : null;
    $operadora = isset($_POST["operadora"]) ? trim($_POST["operadora"]) : null;
    $tipo = isset($_POST["tipo"]) ? trim($_POST["tipo"]) : null;
    
    $sql = "UPDATE telefonos " .
    "SET telf_numero = '$numero', " .
    "telf_operadora = '$operadora', " .
    "telf_tipo = '$tipo' " .
    "WHERE telf_id = $codigo";
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