<!DOCTYPE html>
<head>
   <title>login</title> 
</head>
<body>
   <h2>Registrar un nuevo Usuario</h2>
   <form action="../backend/validar" method="post">
      <p>Usuario <input type="text" placeholder="ingrese su nombre" name="usuario" placeholder="user" minlength="8" required=true maxlength="50"></p>
      <p>Contraseña <input type="password" placeholder="ingrese su contraseña" name="contraseña" minlength="8" required=true maxlength="30"></p>
      <input type="submit" value="Ingresar">
      <br><br>
      <a href="../FrontEnd/CreateUser.php" style="color:#8d96e7;">Crea tu Usuario</a>
</body>