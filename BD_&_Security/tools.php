<?php 
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
        $patron = array('/<script>.*<\/script>/');
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
?>