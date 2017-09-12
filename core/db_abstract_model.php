<?php
abstract class DBAbstracModel {

	// Atributos modificables para la base de datos
	private static $db_host = 'localhost';
	private static $db_user = 'root';
	private static $db_pass = '';
	protected $db_name = '';
	protected $query;
	protected $rows = array();
	private $conn;

	// Metodos abstactos para el ABM que seran heredados por las clases hijas
	abstract protected function get();
	abstract protected function set();
	abstract protected function edit();
	abstract protected function delete();


	// Conecta a la base de datos
	private function abrir_conexion() {
		$this->conn = new mysqli(self::$db_host, self::$db_user, self::$db_pass, $this->db_name);
	}

	// Desconecta la base de datos
	private function cerrar_conexion() {
		$this->conn->close();
	}

	// Ejecuta consulta del tipo INSERT, UPDATE, DELETE
	protected function consulta_simple() {
		$this->abrir_conexion();
		$this->conn->query($this->query);
		$this->cerrar_conexion();
	}

	// Ejecuta consulta del tipo SELECT, los retorna en un array
	protected function obtener_resultados() {
		$this->abrir_conexion();
		$resultados = $this->conn->query($this->query);
		while ($this->rows[] = $resultados->fetch_assoc());
		$resultados->close();
		$this->cerrar_conexion();
		array_pop($this->rows);
	}

}

?>