<?php

include('../../conexion.php');
include('../BD_&_Security/tools.php');

if(isset($_POST['name']) && 
    isset($_POST['lastname']) &&
    isset($_POST['document']) &&
    isset($_POST['email']) &&
    isset($_POST['pswApp']) &&
    isset($_POST['accountBalance']) &&
    isset($_POST['idTipeAccount']) &&
    isset($_POST['pswAccount']) 
){
  CreateUser($conn);
}

function CreateUser($conn){

    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $document = $_POST['document'];
    $email = $_POST['email'];
    $pswApp = $_POST['pswApp'];
    $accountBalance = $_POST['accountBalance'];
    $idTipeAccount = $_POST['idTipeAccount'];
    $pswAccount = $_POST['pswAccount'];

    $insertar = "EXECUTE [dbo].[CREAR_CUENTAHABIENTES]
                @NOMBRES = N'$name',
                @APELLIDOS = N'$lastname',
                @DOCUMENTO = N'$document',
                @CLAVE = N'$pswApp',
                @CORREO = N'$email',
                @ID_TIP_CUENTA = N'$idTipeAccount',
                @SALDO = N'$accountBalance',
                @CLAVECUENTA = N'$pswAccount'"; 
    
    $ejecutar = sqlsrv_query($conn, $insertar);

    if($ejecutar){
        echo '<h3>Insertado correctamente</h3>';
    }
    else
    {
        die( print_r( sqlsrv_errors(), true));
    }
}
?>