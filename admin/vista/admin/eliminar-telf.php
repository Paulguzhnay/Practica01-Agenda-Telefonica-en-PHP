<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modificar datos de persona</title>
    <link href="../../../css/estilo.css" rel="stylesheet" />
    <link href="../../../css/layout.css" rel="stylesheet" />
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
    $sql = "SELECT * FROM telefonos where telf_id = $codigo";
    include '../../../config/conexionBD.php';
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        ?>
            <form id="formulario01" method="POST" action="../../controladores/admin/eliminar-telf.php">
                <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
                <label for="numero">Número (*)</label>
                <input type="text" id="numero" name="numero" value="<?php echo $row["telf_numero"]; ?>"
                required placeholder="Ingrese su número ..."  disabled/>
                <br><label for="tipo">Tipo de Teléfono (*)</label>
                <input id="tipo" name="tipo" value="<?php echo $row["telf_tipo"];
                ?>" required placeholder="Ingrese el tipo de teléfono ..."  disabled/>
                <br><label for="operadora">Operadora (*)</label>
                <input id="operadora" name="operadora" value="<?php echo $row["telf_operadora"];
                ?>" required placeholder="Ingrese la operadora ..."  disabled/> <br>
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
<footer>
      Paul Guzhñay &amp; Joseph Reinoso - Universidad Politécnica Salesiana 
        <br/>&copy; Todos los derechos reservados
</footer>
</html>