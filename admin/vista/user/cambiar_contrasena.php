<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modificar datos de persona</title>
    <link href="../../../css/estilo.css" rel="stylesheet" />
    <link href="../../../css/layout.css" rel="stylesheet" />
    
</head>
<body>
<a href="../../../public/vista/login.html"><img src="../../../images/Agenda Telefonica.jpg"></a>
 <?php
  session_start();
  if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
  header("Location: ../../../public/vista/login.html");
  }
    $codigo = $_GET["codigo"];
 ?>
 <form id="formulario01" method="POST" action="../../controladores/user/cambiar_contrasena.php">
    <h1>Cambiar la Contraseña</h1>
    <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
    <label for="cedula">Contraseña Actual (*)</label>
    <input type="password" id="contrasena1" name="contrasena1" value="" required placeholder="Ingrese su contraseña actual ..."/>
    <br>
    <label for="cedula">Contraseña Nueva (*)</label>
    <input type="password" id="contrasena2" name="contrasena2" value="" required placeholder="Ingrese su contraseña nueva ..."/>
    <br>

    <input type="submit" id="modificar" name="modificar" value="Cambiar Contraseña" />
    <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
 </form>
</body>
</html>