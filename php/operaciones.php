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
		
		function __construct()
		{
			$accion=$this->accion=$_REQUEST["accion"];
			$this->objeto = new respuestas($_REQUEST);
			$this->objeto->$accion($_REQUEST);
		}
	}

	new operaciones();
?>
