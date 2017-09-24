<?php
class indexController {

	function __construct() {
		echo 'index principal';
	}
	public function index($parametro = null) {
		if(empty($parametro)){
			$parametro = "sin parametro";
		}
		echo "---------------------------------------</br> ";
		echo "Controlador: indexController";
		echo "</br> Metodo: index" ;
		echo "</br> parametro: " .$parametro . "</br>";
		echo "---------------------------------------</br> ";
	}

		public function saludar($parametro = null) {
		if(empty($parametro)){
			$parametro = "tu";
		}
		echo "Hola " . $parametro . "!";
	}
}

?>