<?php
require_once("conexion.php");
Class Categoria
{
	public function ObtenerTodos()
	{	$conexion=new Conexion;
		$categoria=$conexion->consultar('tbcategoria');
		return $categoria;
	}
	public function nuevo($datos)
	{	$conexion=new Conexion;
		$categoria=$conexion->insertar('tbcategoria',$datos);
		return $categoria;
	}
	
	public function ObtenerFiltro($filtro)
	{
		$conexion=new Conexion;
		$categoria=$conexion->consultarFiltro('tbcategoria',$filtro);
		return $categoria;
	}
}
?>