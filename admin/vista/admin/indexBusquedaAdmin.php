<!DOCTYPE html>
<html>
<head>
    <link href="../../../css/estilo.css" rel="stylesheet" />
    <link href="../../../css/layout.css" rel="stylesheet" />
    <meta charset="UTF-8">
    <script type="text/javascript" src="../../controladores/admin/buscarCE.js"></script>
    <title>Gestión de Usuarios</title>
</head>
<body>
    <header>
        <a href="../../index.html"><img src="../../../images/Agenda Telefonica.jpg"></a>
    </header>
<!--
    BOTON CEDULA 
-->
    <br>
    <form onsubmit="return buscarCE()">
        <div id="Busqueda" align="center"><h1>Buscar por Cédula o Correo Electrónico</h1></div>
        <br>
        <input type="text" id="cedula" name="cedula" value="">
        <input type="button" id="buscar" name="buscar" value="Buscar" onclick="buscarCE()">
        <br>
        <br>
    </form>

<div id="informacion"><h1>Datos de la persona</h1></div>

<br>
<br>
<br>






</body>
<footer>
      Paul Guzhñay &amp; Joseph Reinoso - Universidad Politécnica Salesiana 
        <br/>&copy; Todos los derechos reservados
</footer>
</html>
