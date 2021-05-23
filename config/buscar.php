<?php
 //incluir conexión a la base de datos
 include "conexionBD.php";
 $cedula = $_GET['cedula'];
 //echo "Hola " . $cedula;

if(strlen($cedula)==10){
    $sql = "SELECT * FROM usuarios WHERE usu_eliminado = 'N' and usu_cedula='$cedula'";
    $sql2 ="SELECT * FROM telefonos WHERE usuarios_usu_id ='$cedula'";
    $result = $conn->query($sql);
    $result2= $conn->query($sql2);
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
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

    echo "<tr>";
    echo " <td>" . $row['usu_cedula'] . "</td>";
    echo " <td>" . $row['usu_nombre'] ."</td>";
    echo " <td>" . $row['usu_apellido'] . "</td>";
    echo " <td>" . $row['usu_mail'] . "</td>";
    echo " <td>" . $row['usu_nacimiento'] . "</td>";
    
        if ($result2->num_rows > 0){
            while ($row = $result2->fetch_assoc()){
                echo " <td>" . $row['telf_numero'] . "</td>";
                echo " <td>" . $row['telf_operadora'] ."</td>";
                echo " <td>" . $row['telf_tipo'] . "</td>";
                echo "</tr>";
            }
        }
    }
    } else {
    echo "<tr>";
    echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
    echo "</tr>";
    }
    echo "</table>";
    $conn->close();
}else {
        $sql = "SELECT usu_cedula FROM usuarios WHERE usu_eliminado = 'N' and usu_mail='$cedula'";
        $result5 = $conn->query($sql);
        while ($row1 = $result5->fetch_assoc()){
            if($row1['usu_cedula']){
                $cedulacom = $row1['usu_cedula'];
            }
        }
        $sql3 = "SELECT * FROM usuarios WHERE usu_eliminado = 'N' and usu_mail='$cedula'";
        $sql2 = "SELECT * FROM telefonos WHERE usuarios_usu_id ='$cedulacom'";
        $result = $conn->query($sql3);
        $result2= $conn->query($sql2);
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
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo " <td>" . $row['usu_cedula'] . "</td>";
        echo " <td>" . $row['usu_nombre'] ."</td>";
        echo " <td>" . $row['usu_apellido'] . "</td>";
        echo " <td>" . $row['usu_mail'] . "</td>";
        echo " <td>" . $row['usu_nacimiento'] . "</td>";
            if ($result2->num_rows > 0){
                while ($row = $result2->fetch_assoc()){
                    echo " <td>" . $row['telf_numero'] . "</td>";
                    echo " <td>" . $row['telf_operadora'] ."</td>";
                    echo " <td>" . $row['telf_tipo'] . "</td>";
                    echo "</tr>";
                }
            }
        }
        } else {
        echo "<tr>";
        echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
        echo "</tr>";
        }
        echo "</table>";
        $conn->close();
        }
?>