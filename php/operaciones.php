<?php
	/**
	* Esto es una clase llamada operaciones este se invocara en el front-end
	*/
	function __autoload($className)
	{
		
		require_once('./'.$className.".php");
	}
	class operaciones
	{
		//Funcion constructor
		function __construct()
		{
			//Se obtiene lo que nos esta llegando atraves de la variable accion y se almacena en $accion
			$accion=$this->accion=$_REQUEST["accion"];
			//Instanciamos la clase respueseta (creacion de un objeto)
			$this->objeto = new respuestas($_REQUEST);
			//Ejecutamos la funcion que se recibio atraves de la variable accion
			$this->objeto->$accion($_REQUEST);
		}
	}

	new operaciones();
?>
