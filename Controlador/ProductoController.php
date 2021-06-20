<?php
require_once("../modelo/Producto.php");
$objProducto=new Producto;
switch($_POST['opcion'])
{
	case 'consultar':
		$datos=$objProducto->ObtenerTodos();
		//El foreach pasa los registros a una tabla html
		//th define el encabezado de esa fila, en este caso id
		
		foreach($datos as $fila)
		{
			echo "<div class='col-3'>";
			$imagen = $fila['img'];
			$id = $fila['id_producto'];
			#Carga la imagen y nombre como un enlace
			echo "<a href='detalles_prod.html?id=". "$id'" . "class='link-success'>";
			echo "<img class='img-fluid mt-3' style='width: 250px; height:360px' src='../../" . $imagen . "'>";
			echo "<p class='text-center fs-5 mt-1 fw-normal'>" . $fila['nombre']."</p>";
			echo "</a>";

			#Verifica que el producto este en stock
			$stock = $fila['stock'];
			if ($stock > 0){
				echo " <p class='text-center fw-light lh-1 fs-6 fst-italic'>En stock!</p>";
			}else{
				echo " <p class='text-center fw-light lh-1 fs-6 fst-italic'>No disponible</p>";
			}


			echo "<p class='text-center lh-1 fs-6 fst-bold'>". "$".$fila['precio']."</p>";
			// echo "<td><button type='button' class='btn btn-outline-dark' onclick='editar(".$fila['Id'].")'>Editar</button></td>";
			echo "</div>";
		}
	break;

	case 'ingresar':
			$datos['nombre']=$_POST['nombre'];
			$datos['descripcion']=$_POST['descripcion'];
			$datos['id_categoria']=$_POST['categoria'];
			$datos['precio']=$_POST['precio'];
			$datos['stock']=$_POST['stock'];
			$datos['marca']=$_POST['marca'];
			$datos['img']="UploadImgs/" . $_POST['imagen'];
				if($objProducto->nuevo($datos))
				{
					echo "Registro ingresado";
				}
				else
				{
					echo "Error al registrar";
				}
	break;

	case 'consultaxcodigo':
		$filtro['id_producto']=$_POST['codigo'];
		echo json_encode($datos=$objProducto->ObtenerFiltro($filtro));
	break;


}
?>