<?php
    session_start();
    include '../../config/conexionBD.php';
    $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
    $sql = "SELECT * FROM usuarios WHERE usu_mail = '$usuario' and usu_password = MD5('$contrasena') and usu_rol = 'Administrador' and usu_eliminado='N'";
    $result = $conn->query($sql);
    $sql2 = "SELECT * FROM usuarios WHERE usu_mail = '$usuario' and usu_password = MD5('$contrasena') and usu_rol = 'Usuario' and usu_eliminado='N'";
    $result2 = $conn->query($sql2);
    if ($result->num_rows > 0) {
        $_SESSION['isLogged'] = TRUE;
        $_SESSION['usuario']= $usuario; 
        header("Location: ../../admin/vista/admin/indexAdmin.php");
        
    } else if ($result2->num_rows > 0) {
        $_SESSION['isLogged'] = TRUE;
        $_SESSION['usuario']= $usuario;
        header("Location: ../../admin/vista/user/indexUsuario.php?correo=$usuario");
    } else {
        header("Location: ../vista/login.html");
    }
 $conn->close();
?>