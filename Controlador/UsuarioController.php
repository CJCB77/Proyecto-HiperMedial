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

	case 'iniciar':
		$nombre = $_POST['nombre'];
		$passwd = $_POST['contrasena'];

		$datos = $objUsuario->UsuarioExiste($nombre);

		if ($datos){
			if ($passwd == $datos['contrasena']){

				session_start();

				$_SESSION["usuarioid"] = $datos['id_usuario'];
				$_SESSION["usuarioNombre"] = $datos['nombre'];
				exit;
				
			}
			else{
				echo "Contraseña incorrecta";
			}

		}
		else{
			echo "Usuario no existe";
		}
	break;

	case 'salir':
		session_unset();
		session_destroy();
	break;


	case 'consultaxcodigo':
		$filtro['id']=$_POST['codigo'];
		echo json_encode($datos=$objUsuario->ObtenerFiltro($filtro));
	break;


}
?>