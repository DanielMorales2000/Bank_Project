<?php 
include('../BD_&_Security/tools.php');
session_start();
regularNavegacion(2);
if(isset($_POST['CloseSession'])){
   closeSession();
}

?>

<!DOCTYPE html>
<head>
   <title>login</title> 
</head>
<body>
   <h2>Registrar un nuevo Usuario</h2>
   <form action="../BackEnd/CreateAccountHolder.back.php" method="post">
      <p>Nombre <input type="text" placeholder="Ingrese Nombre" name="name" placeholder="user" minlength="8" required=true maxlength="50"></p>
      <p>Apellido <input type="text" placeholder="Ingrese Apellido" name="lastname" placeholder="user" minlength="8" required=true maxlength="50"></p>
      <p>Documento <input type="text" placeholder="Ingrese Documento" name="document" placeholder="user" minlength="8" required=true maxlength="50"></p>
      <p>Correo <input type="email" placeholder="Ingrese Correo" name="email" placeholder="user" minlength="8" required=true maxlength="50"></p>
      <p>Clave Aplicativo<input type="password" placeholder="Ingrese Clave para el aplicativo" name="pswApp" placeholder="user" minlength="8" required=true maxlength="50"></p>
      <p>Saldo Inicial <input type="number" placeholder="Ingrese un saldo inicial" name="accountBalance" placeholder="user" minlength="8" required=true maxlength="50"></p>
      <p>Tipo de Cuenta <select name="idTipeAccount">
            <option value="1" selected>Ahorros</option>
            <option value="2">Corriente</option>
        </select></p>
      <p>Clave Cuenta <input type="password" placeholder="ingrese clave de cuenta" name="pswAccount" minlength="8" required=true maxlength="30"></p>
      <input type="submit" value="Ingresar">
   </form>
</body>