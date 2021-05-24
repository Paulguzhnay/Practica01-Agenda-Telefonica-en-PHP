<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Modificar datos de persona</title>
</head>
<body>
 <?php
  //session_start();
  //if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
  //header("Location: /SistemaDeGestion/public/vista/login.html");
  //}
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
placeholder="Ingrese su contraseña nueva ..."/>
 <br>

 <input type="submit" id="modificar" name="modificar" value="Modificar" />
 <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
 </form>
</body>
</html>