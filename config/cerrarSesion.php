<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modificar datos de persona </title>
    <link href="../css/estilo.css" rel="stylesheet" />
    <link href="../css/layout.css" rel="stylesheet" />
</head>
<body>
<a href="../public/vista/login.html"><img src="../images/Agenda Telefonica.jpg"></a>
    <nav>
            <ul>
            <li><a href="../public/controladores/indexBusqueda.php">Búsqueda de Contactos</a></li>
            <li><a href="../public/vista/crearUsuario.html">Registrarse</a></li>
            <li><a href="../public/vista/login.html">Iniciar Sesión</a></li>
            </ul>
    </nav>
<?php
    session_start();
    $_SESSION['isLogged'] = FALSE;
    session_destroy();
    echo("<h1>Sesión Cerrada</h1>");
    header("Location ../Practica01-Agenda-Telefonica-en-PHP/index.html");
?>
</body>
<footer>
      Paul Guzhñay &amp; Joseph Reinoso - Universidad Politécnica Salesiana 
        <br/>&copy; Todos los derechos reservados
</footer>
</html>