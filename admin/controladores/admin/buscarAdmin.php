<?php
 session_start();
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
 header("Location: ../../../public/vista/loggin.html");
 }
 //incluir conexión a la base de datos
 include "../../../config/conexionBD.php";
 $cedula = $_GET['cedula'];
echo("<h1>Resultados</h1>");

if(strlen($cedula)==10){

    $sql2 = "SELECT * FROM telefonos WHERE usuarios_usu_id ='$cedula' and telf_eliminado='N'";
    $result6= $conn->query($sql2);

    $sql="SELECT usu_cedula,usu_nombre,usu_apellido,usu_mail,usu_nacimiento,usu_id, telf_numero,telf_operadora,telf_tipo 
    FROM usuarios u, telefonos te WHERE u.usu_cedula=te.usuarios_usu_id and u.usu_cedula='$cedula'";    
   
    $result2= $conn->query($sql);

    
    //cambiar la consulta para puede buscar por ocurrencias de letras
    //$result2= $conn->query($sql2);
    echo " <table style='width:100%' border='1' align='center'>
    <tr>
    <th colspan='5'>  Datos Personales </th>
    <th colspan ='3'>  Teléfonos</th>
    </tr>
    <tr>
    <th>Cédula</th>
    <th>Nombres</th>
    <th>Apellidos</th>
    <th>Correo</th>
    <th>Fecha Nacimiento</th>
    <th>Teléfono</th>
    <th>Tipo</th>
    <th>Operadora</th>
    </tr>";
    //-----------------
    if ($result2->num_rows > 0) {
    while($row = $result2->fetch_assoc()) {

    echo "<tr>";
    echo " <td>" . $row['usu_cedula'] . "</td>";
    echo " <td>" . $row['usu_nombre'] ."</td>";
    echo " <td>" . $row['usu_apellido'] . "</td>";
    echo " <td> <a class:mail href=mailto:>" . $row['usu_mail'] . "</a></td>";
    echo " <td>" . $row['usu_nacimiento'] . "</td>";
    echo " <td> <a class:telefono href=tel:>" . $row['telf_numero'] . "</a> </td>";
echo " <td>" . $row['telf_operadora'] ."</td>";
    echo " <td>" . $row['telf_tipo'] . "</td>";
    echo " <td> <a href='../admin/eliminar.php?id=" . $row['usu_id'] . "'>Eliminar</a> </td>";
    echo " <td> <a href='../admin/modificar.php?id=" . $row['usu_id'] . "'>Modificar</a> </td>";
    echo " <td> <a href='../admin/cambiarContra.php?id=" . $row['usu_id'] . "'>Cambiar contraseña</a> </td>";
    echo "</tr>";
            
        
    }
    } else {
    echo "<tr>";
    echo " <td colspan='8'> No existen usuarios registradas en el sistema </td>";
    echo "</tr>";
    }
    echo "</table>";


    echo("<h1>Tus Contactos</h1>");
    echo " <table style='width:100%' border='1' align='center'>
    <tr>
    <th>Telefono</th>
    <th>Operadora</th>
    <th>Tipo</th>
    </tr>";
    if ($result6->num_rows > 0) {
        while($row = $result6->fetch_assoc()) {
            echo "<tr>";
            echo " <td>" . $row['telf_numero'] . "</td>";
            echo " <td>" . $row['telf_operadora'] ."</td>";
            echo " <td>" . $row['telf_tipo'] . "</td>";
            echo " <td> <a href='eliminar-telf.php?codigo=" . $row['telf_id'] . "'>Eliminar</a> </td>";
            echo " <td> <a href='modificar-telf.php?codigo=" . $row['telf_id'] . "'>Modificar Numero</a> </td>";
            echo "</tr>";
        } 
    } else {
    echo "<tr>";
    echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
    echo "</tr>";
    }

    $conn->close();
}else {
    $cedulacom = 0;
   
        $sql = "SELECT usu_cedula FROM usuarios WHERE usu_eliminado = 'N' and usu_mail='$cedula'";
        $result5 = $conn->query($sql);
        while ($row1 = $result5->fetch_assoc()){
            if($row1['usu_cedula']){
                $cedulacom = $row1['usu_cedula'];
            }
        }
        //$sql3 = "SELECT * FROM usuarios WHERE usu_eliminado = 'N' and usu_mail='$cedula'";
        //$sql2 = "SELECT * FROM telefonos WHERE usuarios_usu_id ='$cedulacom'";
        $sql2="SELECT usu_cedula,usu_nombre,usu_apellido,usu_mail,usu_nacimiento,usu_id, telf_numero,telf_tipo,telf_operadora
         FROM usuarios u, telefonos te WHERE u.usu_cedula=te.usuarios_usu_id and u.usu_cedula='$cedulacom'";
        //$result = $conn->query($sql3);
        $result2= $conn->query($sql2);

        $sql6 = "SELECT * FROM telefonos WHERE usuarios_usu_id ='$cedulacom' and telf_eliminado='N'";
        $result6= $conn->query($sql6); 


        //cambiar la consulta para puede buscar por ocurrencias de letras
        //$result2= $conn->query($sql2);

        
        echo " <table style='width:100%' border='1' align='center'>
        <tr>
        <th colspan='5'>  Datos Personales </th>
        <th colspan ='3'>  Teléfonos</th>
        </tr>
        <tr>
        <th>Cédula</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Correo</th>
        <th>Fecha Nacimiento</th>
        <th>Teléfono</th>
        <th>Tipo</th>
        <th>Operadora</th>
        </tr>";
        //-----------------
        if ($result2->num_rows > 0) {
        while($row = $result2->fetch_assoc()) {
        echo "<tr>";
        echo " <td>" . $row['usu_cedula'] . "</td>";
        echo " <td>" . $row['usu_nombre'] ."</td>";
        echo " <td>" . $row['usu_apellido'] . "</td>";
        echo " <td> <a class:mail href=mailto:>" . $row['usu_mail'] . "</a></td>";
        echo " <td>" . $row['usu_nacimiento'] . "</td>";
        echo " <td> <a class:telefono href=tel=>" . $row['telf_numero'] . "</a> </td>";
        echo " <td>" . $row['telf_operadora'] ."</td>";
        echo " <td>" . $row['telf_tipo'] . "</td>";
        echo " <td> <a href='../admin/eliminar.php?id=" . $row['usu_id'] . "'>Eliminar</a> </td>";
        echo " <td> <a href='../admin/modificar.php?id=" . $row['usu_id'] . "'>Modificar</a> </td>";
        echo " <td> <a href='../admin/cambiarContra.php?id=" . $row['usu_id'] . "'>Cambiar contraseña</a> </td>";
        echo "</tr>";
        }
  
        }else {
        echo "<tr>";
        echo " <td colspan='8'> No existen usuarios registradas en el sistema </td>";
        echo "</tr>";
        }
        echo "</table>";
        

    echo("<h1>Tus Contactos</h1>");
    echo " <table style='width:100%' border='1' align='center'>
    <tr>
    <th>Telefono</th>
    <th>Operadora</th>
    <th>Tipo</th>
    </tr>";
    if ($result6->num_rows > 0) {
        while($row = $result6->fetch_assoc()) {
            echo "<tr>";
            echo " <td>" . $row['telf_numero'] . "</td>";
            echo " <td>" . $row['telf_operadora'] ."</td>";
            echo " <td>" . $row['telf_tipo'] . "</td>";
            echo " <td> <a href='eliminar-telf.php?codigo=" . $row['telf_id'] . "'>Eliminar</a> </td>";
            echo " <td> <a href='modificar-telf.php?codigo=" . $row['telf_id'] . "'>Modificar Numero</a> </td>";
            echo "</tr>";
        } 
    } else {
    echo "<tr>";
    echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
    echo "</tr>";
    }
        $conn->close();
        }
?>