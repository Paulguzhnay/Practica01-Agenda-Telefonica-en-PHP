<?php
    include '../../config/conexionBD.php';
    session_start();
    $usuario = $_SESSION['usuario'];
    $sql= "select usu_rol FROM usuarios where usu_mail='$usuario';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()){
            if($row['usu_rol']){
                $rol = $row['usu_rol'];
            }
        }
    }
    echo($rol);
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: ../../public/vista/login.html");
    }else if((($_SESSION['isLogged']) || $_SESSION['isLogged'] === TRUE) and $rol==='Administrador' ){
        header("Location: ../../admin/vista/admin/indexAdmin.php");

    }else if((($_SESSION['isLogged']) || $_SESSION['isLogged']===TRUE) and $rol==='Usuario'){
        header("Location: ../../admin/vista/user/indexUsuario.php");

    }else {
        header("Location: ../../public/vista/login.html");
    }
?>