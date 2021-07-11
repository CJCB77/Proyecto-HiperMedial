<?php
require_once("conexion.php");
Class Ciudad
{
	public function ObtenerTodos()
	{	$conexion=new Conexion;
		$ciudad=$conexion->consultar('tbciudad');
		return $ciudad;
	}
	public function nuevo($datos)
	{	$conexion=new Conexion;
		$ciudad=$conexion->insertar('tbciudad',$datos);
		return $ciudad;
	}
	public function Guardar($datos,$filtro)
	{	$conexion=new Conexion;
		$producto=$conexion->actualizar('tbciudad',$datos,$filtro);
		return $producto;
	}

	
	public function ObtenerFiltro($filtro)
	{
		$conexion=new Conexion;
		$ciudad=$conexion->consultarFiltro('tbciudad',$filtro);
		return $ciudad;
	}
}
?>