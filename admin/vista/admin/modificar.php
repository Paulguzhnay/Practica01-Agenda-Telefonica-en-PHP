<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modificar datos de persona</title>
    <link href="../../../css/estilo.css" rel="stylesheet" />
    <link href="../../../css/layout.css" rel="stylesheet" />
    <script type="text/javascript" src="../../../public/controladores/validaciones.js"></script>
</head>
<body>
    <a href="../../../public/vista/login.html"><img src="../../../images/Agenda Telefonica.jpg"></a>
    <?php
        session_start();
        if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
            header("Location: ../../../public/vista/login.html");
        }
        $codigo = $_GET["id"];

        $sql = "SELECT * FROM usuarios where usu_id=$codigo";
        $sql2 = "SELECT usu_cedula FROM usuarios WHERE usu_id = '$codigo'";
        include '../../../config/conexionBD.php';
        $result = $conn->query($sql);
        $result2 = $conn->query($sql2);

        while ($row1 = $result2->fetch_assoc()){
            if($row1['usu_cedula']){
            $cedulacom = $row1['usu_cedula'];
        }
        }

$sql3 = "SELECT * FROM telefonos WHERE usuarios_usu_id ='$cedulacom'";
$result3= $conn->query($sql3);


 if ($result->num_rows > 0) {

 while($row = $result->fetch_assoc()) {
 ?>
 <form id="formulario01" method="POST" action="../../controladores/admin/modificar.php" onsubmit="return validarCamposObligatorios()">

    <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
    <label for="cedula">Cedula (*)</label>
    <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>"
    required placeholder="Ingrese la cedula ..." onkeyup="return validarCedula(this)"/>
    <span id="mensajeCedula" class="error"></span>

    <br>
    <label for="nombre">Nombres (*)</label>
    <input type="text" id="nombre" name="nombre" value="<?php echo $row["usu_nombre"];
    ?>" required placeholder="Ingrese los dos nombres ..." onkeyup="return validarNombre(this)"/>
    <span id="mensajeNombres" class="error"></span>

    <br>
    <label for="apellido">Apelidos (*)</label>
    <input type="text" id="apellido" name="apellido" value="<?php echo $row["usu_apellido"];
    ?>" required placeholder="Ingrese los dos apellidos ..." onkeyup="return validarApellido(this)" />
    <span id="mensajeApellidos" class="error"></span>

    <br>
    <label for="fecha">Fecha Nacimiento (*)</label>
    <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo
    $row["usu_nacimiento"]; ?>" required placeholder="Ingrese la fecha de nacimiento ..."/>

    <br>
    <label for="mail">Correo electrónico (*)</label>
    <input type="email" id="mail" name="mail" value="<?php echo $row["usu_mail"]; ?>"
    required placeholder="Ingrese el correo electrónico ..." onkeyup="return validarCorreo(this)"/>
    <span id="mensajeCorreo" class="error"></span>

    <br>
    <input type="submit" id="modificar" name="modificar" value="Modificar" />
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
<footer>
      Paul Guzhñay &amp; Joseph Reinoso - Universidad Politécnica Salesiana 
        <br/>&copy; Todos los derechos reservados
</footer>
</html>
