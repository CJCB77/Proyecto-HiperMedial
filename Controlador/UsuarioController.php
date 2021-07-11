<?php
require_once("../Modelo/usuario.php");
$objUsuario=new Usuario;

switch($_POST['opcion'])
{
	case 'consultar':
		$datos=$objUsuario->ObtenerTodos();
		$tabla="";
		//El foreach pasa los registros a una tabla html
		//th define el encabezado de esa fila, en este caso id
		
		foreach($datos as $fila)
		{
			$tabla.="<tr>";
			$tabla.="<th scope='row'>".$fila['id_usuario']."</th>";
			$tabla.="<td>".$fila['usuario']."</td>";
			$tabla.="<td>".$fila['contrasena']."</td>";
			$tabla.="<td>".$fila['nombre']."</td>";
			$tabla.="<td>".$fila['apellido']."</td>";
			$tabla.="<td>".$fila['email']."</td>";
			$tabla.="<td>".$fila['direccion']."</td>";
			$tabla.="<td>".$fila['id_ciudad']."</td>";
			$tabla.="<td>".$fila['celular']."</td>";
			$tabla.="<td><button type='button' class='btn btn-outline-dark' onclick='editar(".$fila['id_usuario'].")'>Editar</button></td>";
			$tabla.="<tr>";
            
		}
		echo $tabla;
	break;

	case 'ingresar':
			$datos['usuario']=$_POST['usuario'];
			$datos['contrasena']=$_POST['contrasena'];
			$datos['nombre']=$_POST['nombre'];
			$datos['apellido']=$_POST['apellido'];
			$datos['email']=$_POST['email'];
			$datos['direccion']=$_POST['direccion'];
			$datos['id_ciudad']=$_POST['ciudad'];
			$datos['celular']=$_POST['celular'];
			
				if($objUsuario->nuevo($datos))
				{
					echo "Registro ingresado";
	
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
				$_SESSION["usuarioNombre"] = $datos['usuario'];
				$_SESSION["nombreUsuario"] =  ucfirst($datos['nombre']) . " " .ucfirst($datos['apellido']);
				$_SESSION["direccionUsuario"] = $datos['direccion'];
				$_SESSION["ciudadUsuario"] = $datos['id_ciudad'];
				
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

	case 'actualizar':
		$filtro['id_usuario']=$_POST['codigo'];
		$datos['usuario']=$_POST['usuario'];
		$datos['contrasena']=$_POST['contrasena'];
		$datos['nombre']=$_POST['nombre'];
		$datos['apellido']=$_POST['apellido'];
		$datos['email']=$_POST['email'];
		$datos['direccion']=$_POST['direccion'];
		$datos['id_ciudad']=$_POST['ciudad'];
		$datos['celular']= $_POST['celular'];
		echo $datos=$objUsuario->Guardar($datos,$filtro);
	break;

	case 'consultaxcodigo':
		$filtro['id_usuario']=$_POST['codigo'];
		echo json_encode($datos=$objUsuario->ObtenerFiltro($filtro));
	break;


}
?>