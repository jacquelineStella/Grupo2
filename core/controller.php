<?php
/*	CONTROLLER
	----------

	clase padre que heredaran todos los controladores

	los controladores hijos ralizaran la tarea de: 	
	* Instancia al modelo
	* Modificar sus propiedades si es necesario
	* Llamar a un metodo que retornara un dato
	* Enviar los datos obtenidos del model a la vista

	* Tendra una estructura similar:

	class ModeloController {
		public function __construct($recurso='', $argumentos=array() { }
	}

	* instanciara a la vista JSON y la retornar


	*/
class Controller{
	
	public function __construct($recurso='', $argumentos=array()) {

	 }	

	}	
?>