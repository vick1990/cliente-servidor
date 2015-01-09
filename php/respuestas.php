<?php
class respuestas
{
	private $cnn = '';

	function __construct()
	{
		$this->cnn=$this->conectar();
	}
	public function guardar($datos) {
		$usuario = $datos['usuario'];
		$texto = $datos['res'];
	  	$sql = mysql_query("INSERT INTO respuesta (usuario,respuesta) VALUES('$usuario','$texto')",$this->cnn);
	  	if($sql)
	  		echo "Registro exitoso";
	  	else
	  		echo "Error al insertar los datos";
	  }

	public  function respuestas() {
	  	$res = array();
	  	$sql = mysql_query("SELECT * FROM respuesta",$this->cnn); 
	  	while ($sslq = mysql_fetch_array($sql)) {
	  		$res[] = array(
	            "usuario" =>utf8_encode( $sslq['usuario']),
	            "respuesta"  =>utf8_encode($sslq['respuesta'])
	        );
	    }
	    $this->datos['resp']=$res;
	    echo json_encode($this->datos['resp']);
	 }

	 public function borrar() {
	 	$sql = mysql_query("DELETE  FROM respuesta",$this->cnn);
	 	if($sql)
	 		echo json_encode('Operacion satisfactoria');
	 	else
	 		echo json_encode('Error:al realizar el borrado general');
	 }

	 public function borrar_id($datos) {
	 	$id = $datos['usuario'];
	 	$sql = mysql_query("DELETE  FROM respuesta WHERE usuario='".$id."'",$this->cnn);
	 	if($sql)
	 		echo json_encode('Operacion satisfactoria');
	 	else
	 		echo json_encode('Error:al realizar el borrado de '.$id);
	 }

	 private function conectar() {
	  	$cnx = mysql_connect('mysql.webcindario.com','vickvasquez','darknees_1990');
	  	if(!$cnx) {
	  		echo 'Error al realizar la conexion';
	  		exit();
	  	}
	  	$db = mysql_select_db('vickvasquez');
	  	if(!$db) {
	  		echo "Error al seleccionar DB";
	  		exit();
	  	}
	  	return $cnx;
	  }
	}

?>