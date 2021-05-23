<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Usuario</title>
    <link href="../../css/estilo.css" rel="stylesheet" />
    <link href="../../css/layout.css" rel="stylesheet" />
    <style type="text/css" rel="stylesheet">
    .error{
        color: red;
    }
    </style>
</head>
<body>
    <header>
        <a href="../../index.html"><img src="../../images/Agenda Telefonica.jpg"></a>
        <nav>
            <ul>
            <li><a href="../../admin/vista/user/indexBusqueda.php">Búsqueda de Contactos</a></li>
            <li><a href="../../public/vista/crearUsuario.html">Registrarse</a></li>
            <li><a href="../../public/vista/login.html">Iniciar Sesión</a></li>
            </ul>
        </nav>
    </header>
    <?php
        //incluir conexión a la base de datos
        include '../../config/conexionBD.php';
        $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
        $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
        $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
        $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
        $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
        $fechaNacimiento = isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]): null;
        $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
        $rol = isset($_POST["rol"]) ? trim($_POST["rol"]) : null;

        $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]): null;
        $tipo = isset($_POST["tipo"]) ? trim($_POST["tipo"]): null;
        $operadora = isset($_POST["operadora"]) ? trim($_POST["operadora"]): null;
        $sql = "INSERT INTO usuarios VALUES (0, '$cedula', '$nombres', '$apellidos', '$correo', MD5('$contrasena'), '$fechaNacimiento', null, null, 'N','$rol')";
        $sql2 =  "INSERT INTO telefonos VALUES (0, '$telefono', '$operadora', '$tipo', '$cedula')";
        if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
            echo "<h1>Se ha creado los datos personales correctamemte!!!</h1>";
        } else {
            if($conn->errno == 1062){
                echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
            }else{
                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            }
        }
        //cerrar la base de datos
        $conn->close();
    ?>
</body>
<footer>
      Paul Guzhñay &amp; Joseph Reinoso - Universidad Politécnica Salesiana 
        <br/>&copy; Todos los derechos reservados
</footer>
</html>-