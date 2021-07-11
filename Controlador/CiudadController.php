<?php
require_once("../Modelo/ciudad.php");
$objCiudad=new Ciudad;
switch($_POST['opcion'])
{ 
	case 'consultar':
		$datos=$objCiudad->ObtenerTodos();
		$tabla="";
		
		foreach($datos as $fila)
		{
			$tabla.="<tr>";
			$tabla.="<th scope='row'>".$fila['id_ciudad']."</th>";
			$tabla.="<td>".$fila['ciudad']."</td>";
			$tabla.="<td><button type='button' class='btn btn-outline-dark' onclick='editar(".$fila['id_ciudad'].")'>Editar</button></td>";
			$tabla.="<tr>";
		}
		echo $tabla;
		break;

		
	case 'combo':
		$datos=$objCiudad->ObtenerTodos();
		$combo="";
		foreach($datos as $fila)
		{
			$combo.="<option value=".$fila['id_ciudad'].">".$fila['ciudad']."</option>";
		}
		echo $combo;	
	break;	
		
	case 'ingresar':
		$datos['ciudad']=$_POST['ciudad'];
		
			if($objCiudad->nuevo($datos))
			{
				echo "Registro ingresado";
			}
			else
			{
				echo "Error al registrar";
			}
		break;
		
	case 'actualizar':
		$filtro['id_ciudad']=$_POST['codigo']; 
		$datos['ciudad']=$_POST['ciudad'];
		echo $datos=$objCiudad->Guardar($datos,$filtro);
		break;
		
	case 'consultaxcodigo':
		$filtro['id_ciudad']=$_POST['codigo'];
		echo json_encode($datos=$objCiudad->ObtenerFiltro($filtro));
		break;
		
	
		
}
?>