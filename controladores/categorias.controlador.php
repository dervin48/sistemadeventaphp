<?php
class ControladorCategorias{

/*=============================================
=            Crear Categoria            =
=============================================*/

	static public function ctrCrearCategoria(){
		if(isset($_POST["nuevaCategoria"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoria"])){

				$tabla = "categorias";
				$datos = $_POST["nuevaCategoria"];
				$respuesta = ModeloCategorias::mdlIngresarCategorias($tabla, $datos);

				if($respuesta=="ok"){

					echo'<script>

					swal({
						type:"sucess",
						title: "La categoria ha sido guardada correctamente",
						showConfirmButton: true,
						confirmButtonText:"Cerrar",  
						closeOnConfirm: false
					}).then((result)=> {
							if(result.value){
								window.location ="categorias";
							}
						})
					</script>';
				}
		}else{
			echo'<script>
				swal({
					type:"error"
					title:"!LA Categoria no puede ir vacia o llevar caracteres especiales",
					showConfirmButton: true,
					confirmButtonText: "Cerrar",
					closeOnConfirm: false
					}).then((result) => {
						if (result.value){
							window.location = "categorias";
						}
						})
			</script>';
		}
	}


}
	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrMostrarCategorias($item, $valor){

		$tabla = "categorias";

		$respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);

		return $respuesta;
	
	}





	/*=============================================
	=            Editar Categorias           =
	=============================================*/
	
	
	static public function ctrEditarCategorias($item, $valor){

		$tabla = "categorias";
		$respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);

		return $respuesta;

	}

	static public function ctrEditarCategoria(){
		if(isset($_POST["editarCategoria"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCategoria"])){

				$tabla = "categorias";
				$datos = array("categoria" => $_POST["Editarcategoria"],
					"id" => $_POST["idCategoria"]);
				$respuesta = ModeloCategorias::mdlEditarCategoria($tabla, $datos);

				if($respuesta=="ok"){

					echo'<script>

					swal({
						type:"sucess",
						title: "La categoria ha sido cambiada correctamente",
						showConfirmButton: true,
						confirmButtonText:"Cerrar",  
						closeOnConfirm: false
					}).then((result)=> {
							if(result.value){
								window.location ="categorias";
							}
						})
					</script>';
				}
		}else{
			echo'<script>
				swal({
					type:"error"
					title:"!LA Categoria no puede ir vacia o llevar caracteres especiales",
					showConfirmButton: true,
					confirmButtonText: "Cerrar",
					closeOnConfirm: false
					}).then((result) => {
						if (result.value){
							window.location = "categorias";
						}
						})
			</script>';
		}
	}


}

}


