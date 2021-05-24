<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Eliminar datos de persona</title>
</head>
<body>
 <?php
 session_start();
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
 header("Location: ../../../public/vista/loggin.html");
 }
 $codigo = $_GET["id"];
 $sql = "SELECT * FROM usuarios where usu_id=$codigo";

 include '../../../config/conexionBD.php';
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {

 while($row = $result->fetch_assoc()) {
 ?>
 <form id="formulario01" method="POST" action="../../controladores/admin/eliminar.php">
 <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
 <label for="cedula">Cedula (*)</label>
 <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>"
disabled/>
 <br>
 <label for="nombres">Nombres (*)</label>
 <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombre"];
?>" disabled/>
 <br>
 <label for="apellidos">Apelidos (*)</label>
 <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellido"];
?>" disabled/>
 <br>
 <label for="fecha">Fecha Nacimiento (*)</label>
 <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo
$row["usu_nacimiento"]; ?>" disabled/>
 <br>
 <label for="mail">Correo electrónico (*)</label>
 <input type="email" id="mail" name="mail" value="<?php echo $row["usu_mail"]; ?>"
disabled/>
 <br>

 <input type="submit" id="eliminar" name="eliminar" value="Eliminar" />
 <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
 </form>
 <?php
 }
 } else {
 echo "<p>Ha ocurrido un error inesperado !</p>";
 echo "<p>" . mysqli_error($conn) . "</p>";
 }
 $conn->close();
 ?>
</body>
</html>
