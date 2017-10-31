<?php
require_once('./core/db_abstract_model.php');
require_once('./config.php');

class Mascota extends DBAbstracModel {
	// ATRIBUTOS
	protected $id;
	public $foto;
	public $edad;
	public $especie;
	public $raza;

	// METODOS
	function __construct() {
		$this->db_name = DB_NAME;
	}


	public function set($datos=array()) {
		// VALIDAR DATOS EN EL CONTROLADOR

		// formato {foto, color, edad, especie, raza}
		foreach ($datos as $campo => $valor) {
					$$campo = $valor;
				}
		echo "<br/> foto: " . $foto . " colo: " . $color;
		// Prepara la query
		$this->query = "INSERT INTO mascota('foto', 'color', 'edad', 'especie', 'raza')
						VALUES ('$foto', '$color', '$edad', '$especie', '$raza');";
		// Ejecuta la query
		$this->consulta_simple();
		// Indica si se realizo la consulta
		//$this->msj = ($this->query) ? $this->query : $this->query;	
	}


	public function get() {
		//
	}


	public function edit() {
		$this->msj = "edit";
	}


	public function delete() {
		$this->msj = "delete";
	}
}

?>