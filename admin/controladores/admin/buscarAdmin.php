<?php
 //incluir conexión a la base de datos
 include "../../../config/conexionBD.php";
 $cedula = $_GET['cedula'];
 //echo "Hola " . $cedula;
echo("<h1>Resultados</h1>");
if(strlen($cedula)==10){
    $sql="SELECT usu_cedula,usu_nombre,usu_apellido,usu_mail,usu_nacimiento, telf_numero,telf_tipo,telf_operadora FROM usuarios u, telefonos te WHERE u.usu_cedula=te.usuarios_usu_id";    $result = $conn->query($sql);
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
    echo " <td>" . $row['usu_mail'] . "</td>";
    echo " <td>" . $row['usu_nacimiento'] . "</td>";
    echo " <td>" . $row['telf_numero'] . "</td>";
    echo " <td>" . $row['telf_operadora'] ."</td>";
    echo " <td>" . $row['telf_tipo'] . "</td>";
    echo "</tr>";
            
        
    }
    } else {
    echo "<tr>";
    echo " <td colspan='8'> No existen usuarios registradas en el sistema </td>";
    echo "</tr>";
    }
    echo "</table>";
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
        $sql2="SELECT usu_cedula,usu_nombre,usu_apellido,usu_mail,usu_nacimiento, telf_numero,telf_tipo,telf_operadora FROM usuarios u, telefonos te WHERE u.usu_cedula=te.usuarios_usu_id";
        //$result = $conn->query($sql3);
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
        if ($result2->num_rows > 0) {
        while($row = $result2->fetch_assoc()) {
        echo "<tr>";
        echo " <td>" . $row['usu_cedula'] . "</td>";
        echo " <td>" . $row['usu_nombre'] ."</td>";
        echo " <td>" . $row['usu_apellido'] . "</td>";
        echo " <td>" . $row['usu_mail'] . "</td>";
        echo " <td>" . $row['usu_nacimiento'] . "</td>";
        echo " <td>" . $row['telf_numero'] . "</td>";
        echo " <td>" . $row['telf_operadora'] ."</td>";
        echo " <td>" . $row['telf_tipo'] . "</td>";
        echo "</tr>";
        }
  
        }else {
        echo "<tr>";
        echo " <td colspan='8'> No existen usuarios registradas en el sistema </td>";
        echo "</tr>";
        }
        echo "</table>";
        $conn->close();
        }
?>