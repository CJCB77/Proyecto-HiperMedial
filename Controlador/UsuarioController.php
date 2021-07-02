<?php
require_once("../Modelo/usuario.php");
$objUsuario=new Usuario;
switch($_POST['opcion'])
{
	case 'consultar':
		$datos=$objUsuario->ObtenerTodos();
		//El foreach pasa los registros a una tabla html
		//th define el encabezado de esa fila, en este caso id
		
		foreach($datos as $fila)
		{

            //La consulta de usuarios
		}
	break;

	case 'ingresar':
			$datos['usuario']=$_POST['usuario'];
			$datos['contrasena']=$_POST['contrasena'];
			$datos['nombre']=$_POST['nombre'];
			$datos['apellido']=$_POST['apellido'];
			$datos['email']=$_POST['correo'];
			$datos['direccion']=$_POST['direccion'];
			$datos['ciudad']=$_POST['ciudad'];
			$datos['celular']=$_POST['celular'];
			
				if($objUsuario->nuevo($datos))
				{
					echo "Registro ingresado";
					echo $datos['usuario'];
				}
				else
				{
					echo "Error al registrar";
				}
	break;

	case 'consultaxcodigo':
		$filtro['id']=$_POST['codigo'];
		echo json_encode($datos=$objUsuario->ObtenerFiltro($filtro));
	break;


}
?>