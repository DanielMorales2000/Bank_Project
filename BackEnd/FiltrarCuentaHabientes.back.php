<?php 
include('../../conexion.php');

if(isset($_POST['mostrar'])){

}
function validateDataFilter($conn, $name, $lastname,$document, $email){
    if( (strlen($name) < 30 && is_string($name))&& 
        (strlen($lastname) < 30 && is_string($lastname)) &&
        (strlen($document) < 30 && is_string($document)) &&
        (strlen($email) < 30 && is_string($email))
    ){
        filtrarCuentaHabientes($conn, $name, $lastname,$document, $email);
    }
    else{
        echo '<h3>Los datos no cumplen con las caracterísiticas de seguridad</h3>';
    }
}

function filtrarCuentaHabientes($conn, $name, $lastname,$document, $email){
    $nombre = htmlentities(addslashes($name));
    $apellido = htmlentities(addslashes($lastname));
    $documento = htmlentities(addslashes($document));
    $email = htmlentities(addslashes($email));

    $consulta= "EXEC [dbo].[FILTRAR_CUENTAHABIENTES]
            @NOMBRES = N'$nombre',
            @APELLIDOS = N'$apellido',
            @DOCUMENTO = N'$documento',
            @CORREO = N'$email'";
    $resultado=sqlsrv_query($conn, $consulta);
    echo'
    <table class="table table-bordered">
    <thead>
    <tr align="center">
        <th width="100" align="center">Nombre</th>
        <th width="100" align="center">Apellido</th>
        <th width="100" align="center">Documento</th>
        <th width="300" align="center">Correo</th>
    </tr>
    </thead>
    <tbody>';
    while($fila = sqlsrv_fetch_array($resultado)){
        $nombre = $fila['NOMBRES'];
        $apellido = $fila['APELLIDOS'];
        $documento = $fila['DOCUMENTO'];
        $email = $fila['CORREO'];

        echo 
        '
        <tr align="center">
        <td>'. $documento .'</td>
        <td>'. $nombre .'</td>
        <td>'. $apellido .'</td>
        <td>'. $email .'</td>
        <td>
        <form method="post">
            <input type="submit" name="mostrar" value="Mostrar Datos">
            <input name="doc" type="hidden" value="'.$documento.'">
        </form>
        </tr>';
    }
    echo'</tbody>';
}
?>