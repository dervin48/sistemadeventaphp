<?php

require_once "conexion.php";

class ModeloCategorias{

	/*=============================================
	=            Crear Categoria                =
	=============================================*/
	

	static public function mdlIngresarCategorias($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("	INSET INTO $tabla(Categoria) VALUES (:categoria)");

		$stmt -> bindParam(":categoria", $datos, PDO::PARAM_STR);

		if($stmt ->execute()){
			return "ok";
		}else{
			return"error";
		}
		$stmt ->close();
		$stmt = null; 
	}
	
	
	
}