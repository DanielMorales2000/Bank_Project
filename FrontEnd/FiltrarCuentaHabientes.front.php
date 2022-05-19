 <?php 
 session_start();
 echo("XDXDXDXD:".$_SESSION["tip_user"] );
//  if(isset($_SESSION["tip_user"]) && $_SESSION["tip_user"] != null){
//     if($_SESSION["tip_user"] != $id){
//         echo $_SESSION["tip_user"];
//         echo " ".$id;
//         header("Location: ../FrontEnd/index.front.php");
//     }
// }
// else{
//     // header("Location: ../FrontEnd/index.front.php");
//     echo '<script> window.location.replace("../FrontEnd/index.front.php"); </script>';
// }
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
 if(isset($_POST['CloseSession'])){
    closeSession();
 }
 include('../BD_&_Security/tools.php');
//  regularNavegacion(2);
 LimpiarEntradas();        

 $name = "";
 $lastname = "";
 $document = "";
 $email = "";
 ?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-light bg-light" style="width:fit-content;">
    <a class="navbar-brand" href="../FrontEnd/mainPageBanquero.front.php">
        <button type="button" class="btn btn-primary">Pagina Principal</button>
    </a>
    <a class="navbar-brand" href="../FrontEnd/CreateAccountHolder.front.php" >
        <button type="button" class="btn btn-primary">Crear CuentaHabiente</button>
    </a>
    <a class="navbar-brand" href="../FrontEnd/FiltrarCuentaHabientes.front.php">
        <button type="button" class="btn btn-primary">CuentaHabientes</button>
    </a>
    <a class="navbar-brand">
        <form method="POST">
            <button type="submit" class="btn btn-link" name="CloseSession">Cerrar Sesión</button>
        </form>
    </a>
    </nav>
    <div align="center">
        <form method="post">
            <h1 class="animate__animated animate__backInLeft">Filtro de CuentaHabientes</h1>
            <label for="txtName"> Nombre </label>
            <input type="text" placeholder="Nombre" name="name" maxlength="30">
            <label for="txtLastName"> Apellido </label>
            <input type="text" placeholder="Apellido" name="lastname" maxlength="30">
            <label for="txtDocument"> Documento </label>
            <input type="text" placeholder="Documento" name="document" maxlength="30">
            <label for="txtEmail"> Correo </label>
            <input type="text" placeholder="Correo" name="email" maxlength="30">
            <input type="submit" value="Filtrar" name="filtrar">
        </form>
        <?php
            include('../BackEnd/FiltrarCuentaHabientes.back.php');
            if(isset($_POST['filtrar'])
            ){
                if(isset($_POST['name'])){
                    $name = $_POST['name'];
                }
                if(isset($_POST['lastname'])){
                    $lastname = $_POST['lastname'];
                }
                if(isset($_POST['document'])){
                    $document = $_POST['document'];
                }
                if(isset($_POST['email'])){
                    $email = $_POST['email'];
                }
                validateDataFilter($conn, $name, $lastname, $document, $email);
            }
            
        ?>
    </div>
</body>
</html>
