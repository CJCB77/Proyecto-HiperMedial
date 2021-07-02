<?php
//require_once indica que archivo es requerido para esta clase

require_once("conexion.php");
Class Usuario
{
	public function ObtenerTodos()
	{	$conexion=new Conexion;
		//Se envía el nombre de la tabla que va a ser consultada
		$usuario=$conexion->consultar('tbusuario');
		return $usuario;
	}
	

	public function nuevo($datos)
	{	$conexion=new Conexion;
		$usuario=$conexion->insertar('tbusuario',$datos);
		return $usuario;
	}
	public function ObtenerFiltro($filtro)
	{
		$conexion=new Conexion;
		$usuario=$conexion->consultarFiltro('tbusuario',$filtro);
		return $usuario;
	}
	
}
?>