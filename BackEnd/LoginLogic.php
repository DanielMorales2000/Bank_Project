<?php

include('../../conexion.php');
include('../BD_&_Security/tools.php');

if(isset($_POST['txtUser']) && isset($_POST['txtPassword'])){
  validateLogin($conn);
}

/**
 * Validación de Login
 */
function validateLogin($conn){
  $usuario= htmlentities(addslashes($_POST['txtUser']));
  $contraseña=md5(htmlentities(addslashes($_POST['txtPassword'])));

  //Se valida la sesion del usuario
  $consulta= "EXEC [dbo].[PA_LOGIN]
      @DOCUMENT = N'$usuario',
      @PASSWORD = N'$contraseña'";

  $resultado=sqlsrv_query($conn, $consulta);
  $filas=sqlsrv_fetch_array($resultado);
  if($filas){
    session_start();
    session_destroy();
    session_start();
    $_SESSION["nombre"]=$filas[0];
    $_SESSION["apellido"]= $filas[1];
    $_SESSION["documento"]= $filas[2];
    $_SESSION["tip_user"]= $filas[3];

    header("Location: ../FrontEnd/index.php");

  }else{
      ?>
      <?php
      include("../frontend/login.php");
      
    ?>
    <h1 class="bad">CREDENCIALES INCORRECTAS</h1>
    <?php
  }
  sqlsrv_close($conn);
}
//sqlsrv_free_stmt($resultado);
?>