<?php
session_start();

require_once("../Modelo/orden.php");
$objOrden=new Orden;
switch($_POST['opcion'])
{

	case 'consultar':
		$datos=$objOrden->ObtenerPorId($_SESSION["usuarioid"]);
		$tabla="";
		//El foreach pasa los registros a una tabla html
		//th define el encabezado  de esa fila, en este caso id
		
		foreach($datos as $fila)
		{
			$tabla.="<tr>";
			$tabla.="<th scope='row'>".$fila['id_orden']."</th>";
			$tabla.="<td>".$fila['fecha_compra']."</td>";
			$tabla.="<td>".$fila['fecha_entrega']."</td>";
			$tabla.="<td>".$fila['ciudad']."</td>";
			$tabla.="<td>".$fila['direccion']."</td>";
			$tabla.="<td>".$fila['nombre']."</td>";
			$tabla.="<td>". "$" .$fila['total']."</td>";
			$tabla.="<td>".$fila['estado']."</td>";
			$tabla.="<tr>";
		}
		echo $tabla;
	break;

	case 'ingresar':
			$datos['id_usuario']=$_POST['hidden_usuario'];
            $fecha_actual = date("Y-m-d");
            $fecha_entrega = date('Y-m-d', strtotime($fecha_actual. ' + 3 days'));
			$datos['fecha_compra']=$fecha_actual;
			$datos['fecha_entrega']=$fecha_entrega;
			$datos['ciudad']=$_POST['hidden_ciudad'];
			$datos['direccion']=$_POST['hidden_direccion'];
			$datos['nombre']=$_POST['hidden_nombre'];
			$datos['total']=$_POST['hidden_total'];
			$datos['estado']="pendiente";
				if($objOrden->nuevo($datos))
				{
					echo "Registro ingresado";
				}
				else
				{
					echo "Error al registrar";
				}
	break;



}
?>