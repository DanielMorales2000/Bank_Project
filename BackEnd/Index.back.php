<?php 
session_start();


echo $_SESSION["nombre"];
    echo " ";
    echo $_SESSION["apellido"];
    echo " ";
    echo $_SESSION["documento"];
    echo " ";
    echo $_SESSION["tip_user"];
if(isset($_SESSION["nombre"])){

    
}
else{
    header("Location: ../FrontEnd/login.front.php");
}
?>