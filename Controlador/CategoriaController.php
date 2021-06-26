<?php
require_once("../Modelo/categoria.php");
$objCategoria=new Categoria;
switch($_POST['opcion'])
{ 
	case 'consultar':
		$datos=$objCategoria->ObtenerTodos();
		$tabla="";
		
		foreach($datos as $fila)
		{
			$tabla.="<tr>";
			$tabla.="<th scope='row'>".$fila['id_categoria']."</th>";
			$tabla.="<td>".$fila['categoria']."</td>";
			$tabla.="<td><button type='button' class='btn btn-outline-dark' onclick='editar(".$fila['id_categoria'].")'>Editar</button></td>";
			$tabla.="<tr>";
		}
		echo $tabla;
		break;
	
	case 'cargarCategorias':
		$datos=$objCategoria->ObtenerTodos();
		$tabla="";
		
		foreach($datos as $fila)
		{
			echo "<li><a class='dropdown-item' href='prod_categorias.php?id=". $fila['id_categoria'] ."'>". $fila['categoria'] ."</a></li>";
		}
		echo $tabla;
		break;

		
	case 'combo':
		$datos=$objCategoria->ObtenerTodos();
		$combo="";
		foreach($datos as $fila)
		{
			$combo.="<option value=".$fila['id_categoria'].">".$fila['categoria']."</option>";
		}
		echo $combo;	
		break;	
		
	case 'ingresar':
		$datos['categoria']=$_POST['categoria'];
		
			if($objJefe->nuevoJefe($datos))
			{
				echo "Registro ingresado";
			}
			else
			{
				echo "Error al registrar".$objJefe->geterror();
			}
		break;
		
	case 'actualizar':
		$filtro['id_categoria']=$_POST['id_categoria']; 
		$datos['categoria']=$_POST['categoria'];
		echo $datos=$objJefe->GuardarJefe($datos,$filtro);
		break;
		
	case 'consultaxcodigo':
		$filtro['id_categoria']=$_POST['id_categoria'];
		echo json_encode($datos=$objCategoria->ObtenerFiltro($filtro));
		break;
		
	
		
}
?>