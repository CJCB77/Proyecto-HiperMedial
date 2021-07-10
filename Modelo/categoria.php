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
	public function Guardar($datos,$filtro)
	{	$conexion=new Conexion;
		$producto=$conexion->actualizar('tbcategoria',$datos,$filtro);
		return $producto;
	}

	
	public function ObtenerFiltro($filtro)
	{
		$conexion=new Conexion;
		$categoria=$conexion->consultarFiltro('tbcategoria',$filtro);
		return $categoria;
	}
}
?>