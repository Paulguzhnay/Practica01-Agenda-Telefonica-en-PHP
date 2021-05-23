<!DOCTYPE html>
<html>
    
<head>
<link href="../../../css/estilo.css" rel="stylesheet" />
 <meta charset="UTF-8">
 <script type="text/javascript" src="../../../config/buscarPorCedula.js"></script>
 <title>Gestión de usuarios</title>
</head>
<body>
<header>
        <img src="../../../images/Agenda Telefonica.jpg">
        <nav>
            <ul>
            <li><a href="admin/vista/user/indexBusqueda.php">Búsqueda de Contactos</a></li>
            <li><a>Registrarse</a></li>
            <li><a>Iniciar Sesión</a></li>
            </ul>
        </nav>

    </header>
<!--
    BOTON CEDULA 
-->
<br>
<form onsubmit="return buscarPorCedula()">
<div id="Busqueda"><b>Buscar por Cedula o Correo</b></div>
<br>
<input type="text" id="cedula" name="cedula" value="">
 <input type="button" id="buscar" name="buscar" value="Buscar" onclick="buscarCE()">
 <br>
 <br>

 
</form>

<div id="informacion"><b>Datos de la persona</b></div>

<br>
<br>
<br>






</body>
<footer>
      Paul Guzhñay &amp; Joseph Reinoso - Universidad Politécnica Salesiana 
        <br/>&copy; Todos los derechos reservados
</footer>
</html>