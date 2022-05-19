<?php
    /**
     * Redireccionar: Redirecciona al usuario a la página principal segun su rol
     */
    
    function regularNavegacion($id){
        session_start();
        if(isset($_SESSION["tip_user"]) && $_SESSION["tip_user"] != null){
            if($_SESSION["tip_user"] != $id){
                echo $_SESSION["tip_user"];
                echo " ".$id;
                header("Location: ../FrontEnd/index.front.php");
            }
        }
        else{
            // header("Location: ../FrontEnd/index.front.php");
            echo '<script> window.location.replace("../FrontEnd/index.front.php"); </script>';
        }
    }

    /**
     * Limpieza de entradas de formularios en todo el sistema
     */
    function LimpiarEntradas(){
        if(isset($_POST)){
            foreach($_POST as $key => $value){
                $_POST[$key] = LimpiarCadena($value);
            }
        }
    }
    function LimpiarCadena($cadena){
        $patron = array('/<script>/','/<\/script>/','/</','/>/','/"/','/\'/');
        $cadena = preg_replace($patron,'',$cadena);
        $cadena = htmlspecialchars($cadena);
        return $cadena;
    }

    /**
     * Presentaciòn de errores en interfaz de usuario
     */
    function MostrarErrores(){
        error_reporting(E_ALL);
        INI_SET('display_errors','1');
    }

    // function IniciarSesionSegura(){
        
    //     if(ini_set('session.use,only_cookies',1)==FALSE){
    //         $action = "error";
    //         $error = "No puedo iniciar una sesion segura";
    //     }
    
    //     $cookieParams = session_get_cookie_params();
    //     $path = $cookieParams["path"];

    //     $secure = true;    
    //     $httponly = true;    
    //     $samesite = 'strict';  

    //     session_set_cookie_params([
    //         'lifetime' => $cookieParams["lifetime"],
    //         'path' => $path,
    //         'domain' => $_SERVER['HTTP_HOST'],//dominio
    //         'secure' => $secure,
    //         'httponly'=> $httponly,
    //         'samesite' => $samesite
    //     ]);
        
    //     session_start();
    //     session_regenerate_id(true);
    // }

    /**
     * 
     */

    function closeSession(){
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {

            $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
        }
        // Finalmente, destruir la sesión.
        session_destroy();
        header('Location:index.front.php');
     }
?>