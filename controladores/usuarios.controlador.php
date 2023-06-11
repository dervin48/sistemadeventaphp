<?php

class ControladorUsuarios{

	/*==========================================
	=            Ingreso de usuario            =
	==========================================*/
	
	
	
static public function ctrIngresoUsuario(){

    if(isset($_POST["ingUsuario"])){
        if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
           preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])) {

            $tabla ="user";
            $item = "usuario";
            $valor = $_POST["ingUsuario"];

            $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

            if(is_array($respuesta) && $respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $_POST["ingPassword"]) {

                $_SESSION["iniciarSesion"] = "ok";

                echo '<script>
                    window.location = "index.php";
                </script>';

            } else {
                echo '<br><div class="alert alert-danger">Error al ingresar. Vuelve a intentarlo.</div>';
            }
        }
    }
}}