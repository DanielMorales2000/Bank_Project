<?php
    include('../BackEnd/index.back.php');
    include('../../conexion.php');
    LimpiarEntradas();
    if(isset($_POST['txtUser']) && isset($_POST['txtPassword']) && isset($_POST['txtRole'])){
        validateLogin($conn);
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/cabecera.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
</head>
<body background="images/13.jpg">
   <form method="post">
        <h1 class="animate__animated animate__backInLeft">LOGIN</h1>
        <label for="txtUser"> Documento </label>
        <input type="text" placeholder="Documento de identidad" name="txtUser" minlength="8" required=true maxlength="50"></p>
        <label for="txtPassword"> Contraseña </label>
        <input type="password" placeholder="Contraseña" name="txtPassword" minlength="8" required=true maxlength="30"></p>
        
        <select name="txtRole">
            <option value="1" selected>CuentaHabiente</option>
            <option value="2">Banquero</option>
        </select>
        <input type="submit" value="Ingresar">
   </form> 
</body>
</html>