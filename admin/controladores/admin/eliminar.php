<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Eliminar datos de persona </title>
</head>
<body>
<?php
 //session_start();
 //if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
 //header("Location:../../../public/vista/login.html ");
 //}
 //incluir conexión a la base de datos
 include '../../../config/conexionBD.php';
 $codigo = $_POST["codigo"];

 //Si voy a eliminar físicamente el registro de la tabla
 //$sql = "DELETE FROM usuario WHERE codigo = '$codigo'";
 date_default_timezone_set("America/Guayaquil");
 $cedulacom = 0;
 $fecha = date('Y-m-d H:i:s', time());
 $sql = "UPDATE usuarios SET usu_eliminado = 'S', usu_fecha_modificacion = '$fecha' WHERE usu_id = $codigo";
 $sql2 = "SELECT usu_cedula FROM usuarios where usu_id =$codigo";

 $result3 = $conn->query($sql2);

 while ($row1 = $result3->fetch_assoc()){
    if($row1['usu_cedula']){
        $cedulacom = $row1['usu_cedula'];
    }
}

$sql3 = "UPDATE telefonos SET telf_eliminado='S'  WHERE usuarios_usu_id ='$cedulacom'";

 if ($conn->query($sql) === TRUE ) {
     if($conn->query($sql3)==TRUE){
        echo "<p>Se ha eliminado los datos correctamemte!!!</p>";
     }else {
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
        }
 } 
 echo "<a href='../../vista/admin/indexAdmin.php'>Regresar</a>";
 $conn->close();

?>
</body>
</html>