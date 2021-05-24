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
    $codigo = $_GET["codigo"];
    $sql = "SELECT * FROM telefonos where telf_id = $codigo";
    include '../../../config/conexionBD.php';
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        ?>
            <form id="formulario01" method="POST" action="../../controladores/user/modificar-numero.php">
                <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
                <label for="numero">Número (*)</label>
                <input type="text" id="numero" name="numero" value="<?php echo $row["telf_numero"]; ?>"
                required placeholder="Ingrese su número ..."/>
                <br><label for="tipo">Tipo de Teléfono (*)</label>
                <select id="tipo" name="tipo" value="<?php echo $row["telf_tipo"];
                ?>" required placeholder="Ingrese el tipo de teléfono ..."/>
                    <option>Móvil</option>
                    <option>Convencional</option>
                    <option>Oficina</option>
                    <option>FAX</option>
                    <option>Otro</option>
                </select>
                <br><label for="operadora">Operadora (*)</label>
                <select id="operadora" name="operadora" value="<?php echo $row["telf_operadora"];
                ?>" required placeholder="Ingrese la operadora ..."/> 
                    <option>Claro</option>
                    <option>Movistar</option>
                    <option>Tuenti</option>
                    <option>CNT</option>
                    <option>Otro</option>
                </select><br>
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