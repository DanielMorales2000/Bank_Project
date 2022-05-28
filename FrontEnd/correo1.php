<!DOCTYPE html>
<html>
   <head>
      <title>Envio Correo</title>
      <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>login</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
   <body>
      <div class="wrap">
         <header>
            Enviar mail desde localhost con PHP Mailer
         </header>
         <section id="principal">
            <form id="formulario" method="post" action="EnviarCorreo.php" enctype="multipart/form-data">
               <div class="campos">
                  <label>Para:</label>
                  <input type="email" name="email" required>
               </div>
               <div class="campos">
                  <label>Asunto:</label>
                  <input type="text" name="asunto">
               </div>
               <!-- <div class="campos">
                  <label>Mensaje:</label>
                  <textarea name="mensaje"></textarea>
               </div> -->
               <input type="hidden" name="anticsrf" value="<?php echo $_SESSION['anticsrf'];?>">
               <input id="submit" type="submit" name="enviar" value="Enviar mail">
            </form>
         </section>
      </div>
   </body>
</html>