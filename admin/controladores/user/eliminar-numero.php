<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Eliminar Datos Usuario </title>
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
    //Si voy a eliminar físicamente el registro de la tabla
    //$sql = "DELETE FROM usuario WHERE codigo = '$codigo'";
    $sql = "UPDATE telefonos SET telf_eliminado = 'S' WHERE telf_id = $codigo";
    if ($conn->query($sql) === TRUE) {
        echo "<h1>Su Teléfono a sido Eliminado</h1><br>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
    }
    $conn->close();
    ?>
</body>
<footer>
      Paul Guzhñay &amp; Joseph Reinoso - Universidad Politécnica Salesiana 
        <br/>&copy; Todos los derechos reservados
</footer>
</html>