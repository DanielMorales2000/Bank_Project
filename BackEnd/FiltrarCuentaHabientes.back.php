<?php 
include('../../conexion.php');


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
  $filas=sqlsrv_fetch_object($resultado);

  if($filas){
    //   echo var_dump($filas);
      foreach($filas as $a){
          echo $a."<br>";
      }
      while ($row = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC )) {
          foreach($row as $a){
              echo $a."<br>";
          }
        }
    // echo "<b>BANCO:  </b>".$filas[0]."<br>";
    // echo "<b>NIT:  </b>".$filas[1]."<br>";
    // echo "<b>CIUDAD:  </b>".$filas[2]."<br>";
    // echo "<b>SEDE:  </b>".$filas[3]."<br>";
    // echo "<b>TELEFONO:  </b>".$filas[4]."<br>";
    // echo "<b>GERENTE:  </b>".$filas[5]."<br>";
  }
}
?>