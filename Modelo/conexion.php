<?php
Class conexion
//Todas las variables empiezan con el simbolo $
{	private $usuario="root";
	private $pass="";
	private $dbconn=null;
	private $dns="mysql:host=localhost:3307;dbname=dbpapeleria";
	private $error=null;
	
	private function conectar()
	{
		try {
			//Interfaz de Objetos de Datos PHP (PDO) (establece conexiones con bases de datos)
			$this->dbconn = new PDO($this->dns, $this->usuario, $this->pass);
			//Atributos para manejo de base de datos, en este caso para manejo de errores y lanzamiento de excepciones
			$this->dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
			return true;
			} catch (PDOException $e) {
			$this->error= $e->getMessage(); 
			return false;
		}
	}
		
	public function consultar($tabla)
	{	try {
		if(!$this->conectar())
		{	return "No conecta".$this->error;
			exit;
		}
		$query="Select * from $tabla";
		//Prepare, prepara una sentencia SQL para su ejecución
		$result_set = $this->dbconn->prepare($query);
		$result_set->execute();
		//fetchAll Devuelve un array que contiene todas las filas restantes del conjunto de resultados.
		$result = $result_set->fetchAll();
		return $result;
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}
	public function consultaporI($tabla)
	{	try {
		if(!$this->conectar())
		{	return "No conecta".$this->error;
			exit;
		}
		$query="Select * from $tabla";
		//Prepare, prepara una sentencia SQL para su ejecución
		$result_set = $this->dbconn->prepare($query);
		$result_set->execute();
		//fetchAll Devuelve un array que contiene todas las filas restantes del conjunto de resultados.
		$result = $result_set->fetchAll();
		return $result;
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}
	
	
	public function consultarFiltro($tabla,$filtro)
	{	try {
		if(!$this->conectar())
		{	return "No conecta".$this->error;
			exit;
		}
		$query="Select * from $tabla where ";
		foreach($filtro as $clave=>$valor)
		{
			$query .="$clave = :$clave and ";
		}
		$query = substr ($query, 0, strlen($query) - 4);
		$result_set = $this->dbconn->prepare($query);
		foreach($filtro as $clave=>$valor)
		{$clave=':'.$clave;
			$result_set->bindValue($clave, $valor);
		}
		$result_set->execute();
		$result = $result_set->fetchAll();
		return $result;
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}

	public function insertar($tabla,$datos)
	{	
		try {
			$this->conectar();
			$sql = "INSERT INTO $tabla(";
			foreach($datos as $clave=>$valor)
			{
				$sql .=$clave.",";
			}
			$sql = substr ($sql, 0, strlen($sql) - 1).") VALUES(";
			foreach($datos as $clave=>$valor)
			{
				$sql .=":".$clave.",";
			}
			$sql = substr ($sql, 0, strlen($sql) - 1).")";
			$stmt = $this->dbconn->prepare($sql);
			foreach($datos as $clave=>$valor)
			{$clave=':'.$clave;
			 $stmt->bindValue($clave, $valor);
			}
			// execute the insert statement
			$stmt->execute();
			return "Datos insertados...";
		} catch (Exception $e) {
			$this->error= $e->getMessage();
			return "Error al insertar... ".$this->error;
		}
	}
	
}
?>