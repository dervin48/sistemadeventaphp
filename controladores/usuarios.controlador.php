<?php

class ControladorUsuarios{

    /*=============================================
    INGRESO DE USUARIO
    =============================================*/

    static public function ctrIngresoUsuario(){

        if(isset($_POST["ingUsuario"])){

            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"])&&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

                // $encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "user";

                $item = "usuario";
                $valor = $_POST["ingUsuario"];

                $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

                if(is_array($respuesta)){

                    if(isset($respuesta["usuario"]) && isset($respuesta["password"]) && isset($respuesta["estado"])){

                        // if ($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar){

                            if($respuesta["estado"] == 1){

                                $_SESSION["iniciarSesion"] = "ok";
                                $_SESSION["id"] = $respuesta["id"];
                                $_SESSION["nombre"] = $respuesta["nombre"];
                                $_SESSION["usuario"] = $respuesta["usuario"];

                                if(isset($respuesta["foto"])){
                                    $_SESSION["foto"] = $respuesta["foto"];
                                } else {
                                    $_SESSION["foto"] = "vistas/img/usuarios/default/anonymous.png";
                                }

                                $_SESSION["perfil"] = $respuesta["perfil"];

                                /*=============================================
                                REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
                                =============================================*/

                                date_default_timezone_set('America/Bogota');

                                $fecha = date('Y-m-d');
                                $hora = date('H:i:s');

                                $fechaActual = $fecha.' '.$hora;

                                $item1 = "ultimo_login";
                                $valor1 = $fechaActual;

                                $item2 = "id";
                                $valor2 = $respuesta["id"];

                                $ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

                                if($ultimoLogin == "ok"){

                                    echo '<script>
                                        window.location = "inicio";
                                    </script>';

                                }               
                                
                            }else{

                                echo '<br>
                                    <div class="alert alert-danger">El usuario aún no está activado</div>';

                            }       

                        }else{

                            echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';

                        }
                    } else {
                        echo '<br><div class="alert alert-danger">Respuesta inválida del servidor</div>';
                    }

                }else{
                    echo '<br><div class="alert alert-danger">Respuesta inválida del servidor</div>';
                }

            }   

        }

    }


/*=============================================
=            CREAR USUARIO            =
=============================================*/

static public function ctrCrearUsuario(){

        if(isset($_POST["nuevoUsuario"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
               preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
               preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){

/*=============================================
=            Validar Imagen           =
=============================================*/

    $ruta ="";

    if(isset($_FILES["nuevaFoto"]["tmp_name"])){

            list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

            $nuevoAncho =500;
            $nuevoAlto = 500;



            /*=============================================
            =CREAMOS DIRECTORIO DONDE SE GUARDA FOTO     =
            =============================================*/

            $directorio="vistas/img/usuarios/".$_POST["nuevoUsuario"];
            mkdir($directorio, 0755);

            /*=============================================
            =            Tipode imagen funciones por defecto            =
            =============================================*/
            
            if($_FILES["nuevaFoto"]["type"]== "image/jpeg"){

                /*=============================================
                = Gurardamos iamgen en el directorio            =
                =============================================*/

                $aleatorio = mt_rand (100, 999);
                $ruta = "vistas/img/usuarios/".POST["nuevoUsuario"]."/".$aleatorio.".jpg";

                $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                imagejpeg($destino, $ruta);
                     
            }
            if($_FILES["nuevaFoto"]["type"]== "image/png"){

                /*=============================================
                = Gurardamos iamgen en el directorio            =
                =============================================*/

                $aleatorio = mt_rand (100, 999);
                $ruta = "vistas/img/usuarios/".POST["nuevoUsuario"]."/".$aleatorio.".png";

                $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);
                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                imagepng($destino, $ruta);
                     
            }

}
            $tabla = "user";
            $encriptar=crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
            $datos = array(
                "nombre" => $_POST["nuevoNombre"],
                "usuario" => $_POST["nuevoUsuario"],
                "password" => $encriptar,
                "perfil" => $_POST["nuevoPerfil"],
                "foto" =>$ruta
            );

            $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

            if($respuesta == 'ok') {
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>';
                echo '<script>';
                echo 'Swal.fire({';
                echo '  type: "success",';
                echo '  title: "!El usuario ha sido guardado correctamente",';
                echo '  showConfirmButton: true,';
                echo '  confirmButtonText: "Cerrar",';
                echo '  closeOnConfirm: false';
                echo '}).then((result) => {';
                echo '  if (result.value) {';
                echo '    window.location = "usuarios";';
                echo '  }';
                echo '});';
                echo '</script>';
            } else {
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>';
                echo '<script>';
                echo 'Swal.fire({';
                echo '  type: "error",';
                echo '  title: "!El usuario no puede ir vacio o llevar caracteres especiales",';
                echo '  showConfirmButton: true,';
                echo '  confirmButtonText: "Cerrar",';
                echo '  closeOnConfirm: false';
                echo '}).then((result) => {';
                echo '  if (result.value) {';
                echo '    window.location = "usuarios";';
                echo '  }';
                echo '});';
                echo '</script>';
            }
        }
    }
}

/*=============================================
=            MOSTRAR USUARIO            =
=============================================*/

static public function ctrMostrarUsuarios($item, $valor){

    $tabla ="user";
    $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

    return $respueta;

}





}