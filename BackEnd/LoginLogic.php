<?php

include('../../conexion.php');
$usuario= htmlentities(addslashes($_POST['usuario']));
$contraseña=md5(htmlentities(addslashes($_POST['contraseña'])));

//Se valida la sesion del usuario
$consulta="EXEC	[dbo].[PA_LOGIN]
@USUARIO = N'$usuario',
@CLAVE = N'$contraseña'";

$resultado=sqlsrv_query($conn, $consulta);
$filas=sqlsrv_fetch_array($resultado);

if($filas){
  session_start();
  session_destroy();
  
  session_start();
  $_SESSION["nombre"]=$resultado[0];
  $_SESSION["apellido"]= $resultado[1];
  $_SESSION["documento"]= $resultado[2];
  $_SESSION["id_tip_user"]= $resultado[3];

  if ($resultado[3] == 2) {

  }
  header("Location: ../");

}else{
    ?>
    <?php
    include("../frontend/login.php");
  ?>
  <h1 class="bad">CREDENCIALES INCORRECTAS</h1>
  <?php
}
sqlsrv_close($conn);
//sqlsrv_free_stmt($resultado);
?>