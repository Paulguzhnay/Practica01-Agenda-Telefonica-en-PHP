<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Agregar Nuevo Teléfono</title>
    <link href="../../../css/estilo.css" rel="stylesheet" />
    <link href="../../../css/layout.css" rel="stylesheet" />
    
</head>
<body>
<a href="../../../public/vista/login.html"><img src="../../../images/Agenda Telefonica.jpg"></a>
    <nav>
            <ul>
            <li><a href="../../../public/controladores/indexBusqueda.php">Búsqueda de Contactos</a></li>
            <li><a href="../../../public/vista/crearUsuario.html">Registrarse</a></li>
            <li><a href="../../../public/controladores/controlodorSesion.php">Iniciar Sesión</a></li>

            </ul>
    </nav>
<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
    header("Location: ../../../public/vista/login.html");
    }
    //incluir conexión a la base de datos
    include '../../../config/conexionBD.php';
    $usuario = $_SESSION['usuario'];
    $sql= "select usu_cedula FROM usuarios where usu_mail='$usuario';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()){
            if($row['usu_cedula']){
                $cedula = $row['usu_cedula'];
            }
        }
    }
    $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]): null;
    $tipo = isset($_POST["tipo"]) ? trim($_POST["tipo"]): null;
    $operadora = isset($_POST["operadora"]) ? trim($_POST["operadora"]): null;
    $sql =  "INSERT INTO telefonos VALUES (0, '$telefono', '$operadora', '$tipo','N', '$cedula')";
    if ($conn->query($sql) === TRUE) {
        echo "<h1>Ingreso correctamente su numero de teléfono</h1>";
    } else {
        echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
    }
    //cerrar la base de datos
    $conn->close();
?>
</body>
<footer>
      Paul Guzhñay &amp; Joseph Reinoso - Universidad Politécnica Salesiana 
        <br/>&copy; Todos los derechos reservados
</footer>
</html>