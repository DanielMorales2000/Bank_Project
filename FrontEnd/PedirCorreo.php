<?php ob_start();?>
<?php
include('../conexion.php');

include('../FrontEnd/CorreoRestClave.php');
if(isset($_POST['enviar']) && isset($_POST["correoRestClave"])){
    $correo = $_POST["correoRestClave"];
    echo $correo;
    CorreoRestablecimiento($correo);
} 
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Restablecimiento Contraseña</title>
      <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>login</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
   <body>
      <div class="wrap">
         <header>
            <h3><b>RESTABLECIMIENTO DE CONTRASEÑA</b></h3>
         </header>
         <section id="principal">
            <form id="formulario" method="post" action="#">
               <!-- <div class="campos">
                  <label>Cedula:</label>
                  <input type="text" name="cedula" required> <br><br>
               </div> -->
               <div class="campos">
                  <label>Correo:</label>
                  <input type="email" name="correoRestClave"><br><br>
               </div>
               <input type="hidden" name="anticsrf" value="<?php echo $_SESSION['anticsrf'];?>">
               <input id="submit" type="submit" name="enviar" value="Enviar Correo">
            </form>
         </section>
      </div>
   </body>
</html>
<?php ob_end_flush(); ?>
