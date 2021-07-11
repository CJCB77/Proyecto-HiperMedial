<?php
//require_once indica que archivo es requerido para esta clase

require_once("conexion.php");
Class Orden
{
	public function ObtenerTodos()
	{	$conexion=new Conexion;
		//Se envía el nombre de la tabla que va a ser consultada
		$orden=$conexion->consultar('tborden');
		return $orden;
	}
	public function ObtenerPorId($id)
	{	$conexion=new Conexion;
		//Se envía el nombre de la tabla que va a ser consultada
		$orden=$conexion->consultarId('tborden',$id);
		return $orden;
	}
	

	public function nuevo($datos)
	{	$conexion=new Conexion;
		$orden=$conexion->insertar('tborden',$datos);
		return $orden;
	}

	public function Guardar($datos,$filtro)
	{	$conexion=new Conexion;
		$producto=$conexion->actualizar('tborden',$datos,$filtro);
		return $producto;
	}

	public function ObtenerFiltro($filtro)
	{
		$conexion=new Conexion;
		$orden=$conexion->consultarFiltro('tborden',$filtro);
		return $orden;
	}

	
}
?>