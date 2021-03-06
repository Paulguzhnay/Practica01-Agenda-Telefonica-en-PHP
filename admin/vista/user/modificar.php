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
    $sql = "SELECT * FROM usuarios where usu_id = $codigo";
    include '../../../config/conexionBD.php';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        ?>
            <form id="formulario01" method="POST" action="../../controladores/user/modificar.php" onsubmit="return validarCamposObligatorios()">
                <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
                <label for="cedula">Cedula (*)</label>
                <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?> "
                required placeholder="Ingrese la cedula ..." onkeyup="return validarCedula(this)"/>
                <span id="mensajeCedula" class="error"></span>
                <br>
                <label for="nombres">Nombres (*)</label>
                <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombre"];
                ?>" required placeholder="Ingrese los dos nombres ..." onkeyup="return validarNombre(this)"/>
                <span id="mensajeNombres" class="error"></span>
                <br>
                <label for="apellidos">Apelidos (*)</label>
                <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellido"];
                ?>" required placeholder="Ingrese los dos apellidos ..." onkeyup="return validarApellido(this)"/>
                <span id="mensajeApellidos" class="error"></span>
                <br>
                <label for="fecha">Fecha Nacimiento (*)</label>
                <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["usu_nacimiento"]; ?>" required placeholder="Ingrese la fecha de nacimiento ..."/>
                <br>
                <label for="correo">Correo electr??nico (*)</label>
                <input type="email" id="correo" name="correo" value="<?php echo $row["usu_mail"]; ?>"
                required placeholder="Ingrese el correo electr??nico ..." onkeyup="return validarCorreo(this)"/>
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
      Paul Guzh??ay &amp; Joseph Reinoso - Universidad Polit??cnica Salesiana 
        <br/>&copy; Todos los derechos reservados
</footer>
</html>