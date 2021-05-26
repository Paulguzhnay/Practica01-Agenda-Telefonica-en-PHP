<!DOCTYPE html>
<html>
<head>
    <link href="../../../css/estilo.css" rel="stylesheet" />
    <link href="../../../css/layout.css" rel="stylesheet" />
    <meta charset="UTF-8">
    <script type="text/javascript" src="../../controladores/user/buscarUser.js"></script>
    <script type="text/javascript" src="../../../public/controladores/validaciones.js"></script>
    <title>Agregar tu nuevo teléfono</title>
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
    $codigo = $_GET["codigo"];
     
     ?>
     
     <form id="formulario01" method="POST" action="../../controladores/admin/agregar-telf.php">
    <h1>Agregar nuevo número de teléfono</h1>
     </select>
        <br><label for="telefono">Teléfono (*)</label>
        <input type="text" id="telefono" name="telefono" value="" placeholder="Ingrese su número telefónico..." onkeyup="return validarTelefono(this)" />
        <span id="mensajeTelefono" class="error"></span>
        <br><label for="rol">Tipo de Teléfono (*)</label>
        <select id="tipo" name="tipo">
            <option>Móvil</option>
            <option>Convencional</option>
            <option>Oficina</option>
            <option>FAX</option>
            <option>Otro</option>
        </select>
        <br><label for="rol">Operadora (*)</label>
        <select id="operadora" name="operadora"> 
            <option>Claro</option>
            <option>Movistar</option>
            <option>Tuenti</option>
            <option>CNT</option>
            <option>Otro</option>
        </select><br>
        <input type="submit" id="agregar" name="agregar" value="Agregar Teléfono" /> 
        <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
    </form>
</body>
<footer>
      Paul Guzhñay &amp; Joseph Reinoso - Universidad Politécnica Salesiana 
        <br/>&copy; Todos los derechos reservados
</footer>
</html>