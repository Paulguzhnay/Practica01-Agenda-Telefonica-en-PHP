<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Actualizar Datos del Usuario</title>
    <link href="../../../css/estilo.css" rel="stylesheet" />
    <link href="../../../css/layout.css" rel="stylesheet" />
    <script type="text/javascript" src="../../../public/controladores/validaciones.js"></script>
</head>
<body>
    <a href="../../../public/vista/login.html"><img src="../../../images/Agenda Telefonica.jpg"></a>
    <?php
        session_start();
        if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
            header("Location: ../../../public/vista/loggin.html");
        }
        $codigo = $_GET["id"];
    ?>
    <form id="formulario01" method="POST" action="../../controladores/admin/cambiarContra.php">
        <input type="hidden" id="id" name="id" value="<?php echo $codigo ?>" />
        <label for="cedula">Contraseña Actual (*)</label>
        <input type="password" id="contrasena1" name="contrasena1" value="" required
        placeholder="Ingrese su contraseña actual ..."/>
        <br>
        <label for="cedula">Contraseña Nueva (*)</label>
        <input type="password" id="contrasena2" name="contrasena2" value="" required
        placeholder="Ingrese su contraseña nueva ..." onkeyup="return validarContrasenia(this)"/>
        <span id="mensajeContrasenia" class="error"></span>
        <br>
        <input type="submit" id="modificar" name="modificar" value="Modificar" />
        <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
    </form>
</body>
<footer>
      Paul Guzhñay &amp; Joseph Reinoso - Universidad Politécnica Salesiana 
        <br/>&copy; Todos los derechos reservados
</footer>
</html>