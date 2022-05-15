<?php
include('../../conexion.php');
include('../BD_&_Security/tools.php');
session_start();
LimpiarEntradas();

if(isset($_POST['name']) && 
    isset($_POST['lastname']) &&
    isset($_POST['document']) &&
    isset($_POST['email']) &&
    isset($_POST['pswApp']) &&
    isset($_POST['accountBalance']) &&
    isset($_POST['idTipeAccount']) &&
    isset($_POST['pswAccount']) 
){

    if( (strlen($_POST['name']) < 50 && is_string($_POST['name']) )&& 
        (strlen($_POST['lastname']) < 50 && is_string($_POST['lastname']) ) &&
        (strlen($_POST['document']) && is_numeric($_POST['document']) ) &&
        (strlen($_POST['email']) < 50 && is_string($_POST['email']) ) &&
        (strlen($_POST['pswApp']) < 50 && strlen($_POST['pswApp']) > 4 && is_string($_POST['pswApp']) ) &&
        (strlen($_POST['accountBalance']) && is_numeric($_POST['accountBalance']) ) &&
        (strlen($_POST['idTipeAccount']) && is_numeric($_POST['idTipeAccount']) ) &&
        (strlen($_POST['pswAccount']) < 50 && strlen($_POST['pswAccount']) > 4 && is_string($_POST['pswAccount']) )
    ){
        CreateUser($conn);
    }
    else{
        echo '<h3>Los datos no cumplen con las caracterísiticas de seguridad</h3>';
        header("Location: ../FrontEnd/CreateAccountHolder.front.php");
    }
}



function CreateUser($conn){
    $name = htmlentities(addslashes($_POST['name']));
    $lastname = htmlentities(addslashes($_POST['lastname']));
    $document = htmlentities(addslashes($_POST['document']));
    $email = htmlentities(addslashes($_POST['email']));
    $pswApp = md5(htmlentities(addslashes($_POST['pswApp'])));
    $accountBalance = htmlentities(addslashes($_POST['accountBalance']));
    $idTipeAccount = htmlentities(addslashes($_POST['idTipeAccount']));
    $pswAccount = md5(htmlentities(addslashes($_POST['pswAccount'])));

    $insrt_stmt =
    $conn->prepare( "EXECUTE [dbo].[CREAR_CUENTAHABIENTES]
                @NOMBRES = N':Name',
                @APELLIDOS = N':LastName',
                @DOCUMENTO = N':Documento',
                @CLAVE = N':PswApp',
                @CORREO = N':Email',
                @ID_TIP_CUENTA = N':IdTipeAccount',
                @SALDO = N':AccountBalance',
                @CLAVECUENTA = N':PswAccount',
                @ID_SUCURSAL = N'$_SESSION[id_sucursal]'"); 

    $insrt_stmt->bindParam(':Name', $name);
    $insrt_stmt->bindParam(':LastName', $lastname); 
    $insrt_stmt->bindParam(':Documento', $document); 
    $insrt_stmt->bindParam(':PswApp', $pswApp); 
    $insrt_stmt->bindParam(':Email', $email); 
    $insrt_stmt->bindParam(':IdTipeAccount', $idTipeAccount); 
    $insrt_stmt->bindParam(':AccountBalance', $accountBalance); 
    $insrt_stmt->bindParam(':PswAccount', $pswAccount); 
    // $insrt_stmt->bindParam(':EstadoCivil', $EstadoCivil); 
    
    try {
        if ($insrt_stmt->execute()) {
            //echo "New record created successfully";
            return TRUE;
        } else {
            //echo "Unable to create record";
            return FALSE;
        }			
        //code...
    } catch (\Throwable $th) {
        return FALSE;
    }

    // if($ejecutar){
        
    //     echo '<h3>Insertado correctamente</h3>';
    //     header("Location: ../FrontEnd/CreateAccountHolder.front.php");
    // }
    // else
    // {
    //     die( print_r( sqlsrv_errors(), true));
    // }
}

    ////////////////////copia codigo///////
    // function CreateUser($conn){
    //     $name = htmlentities(addslashes($_POST['name']));
    //     $lastname = htmlentities(addslashes($_POST['lastname']));
    //     $document = htmlentities(addslashes($_POST['document']));
    //     $email = htmlentities(addslashes($_POST['email']));
    //     $pswApp = md5(htmlentities(addslashes($_POST['pswApp'])));
    //     $accountBalance = htmlentities(addslashes($_POST['accountBalance']));
    //     $idTipeAccount = htmlentities(addslashes($_POST['idTipeAccount']));
    //     $pswAccount = md5(htmlentities(addslashes($_POST['pswAccount'])));
    
    //     $insertar = "EXECUTE [dbo].[CREAR_CUENTAHABIENTES]
    //                 @NOMBRES = N'$name',
    //                 @APELLIDOS = N'$lastname',
    //                 @DOCUMENTO = N'$document',
    //                 @CLAVE = N'$pswApp',
    //                 @CORREO = N'$email',
    //                 @ID_TIP_CUENTA = N'$idTipeAccount',
    //                 @SALDO = N'$accountBalance',
    //                 @CLAVECUENTA = N'$pswAccount',
    //                 @ID_SUCURSAL = N'$_SESSION[id_sucursal]'"; 
        
    //     $ejecutar = sqlsrv_query($conn, $insertar);
    
    //     if($ejecutar){
            
    //         echo '<h3>Insertado correctamente</h3>';
    //         header("Location: ../FrontEnd/CreateAccountHolder.front.php");
    //     }
    //     else
    //     {
    //         die( print_r( sqlsrv_errors(), true));
    //     }
    // }
?>