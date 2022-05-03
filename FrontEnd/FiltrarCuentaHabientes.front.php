 <?php 
 include('../BD_&_Security/tools.php');
 session_start();
 LimpiarEntradas();        
 regularNavegacion(2);

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
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/cabecera.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-light bg-light" style="width:fit-content;">
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
        <H1>Filtro de CuentaHabientes</H1>
        <form method="post">
            <h1 class="animate__animated animate__backInLeft">LOGIN</h1>
            <label for="txtName"> Nombre </label>
            <input type="text" placeholder="Nombre" name="txtName" maxlength="30"></p>
            <label for="txtLastName"> Apellido </label>
            <input type="text" placeholder="Apellido" name="txtLastName" maxlength="30"></p>
            <label for="txtDocument"> Documento </label>
            <input type="text" placeholder="Documento" name="txtDocument" maxlength="30"></p>
            <label for="txtEmail"> Correo </label>
            <input type="text" placeholder="Correo" name="txtEmail" maxlength="30"></p>
            <input type="submit" value="Ingresar" name="ingresar">
        </form>
        <?php
            include('../BackEnd/FiltrarCuentaHabientes.back.php');
            if(isset($_POST['ingresar'])
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
            if(isset($_POST['CloseSession'])){
                closeSession();
            }
        ?>
    </div>
</body>
</html>