<?php

namespace Persistencia;

require_once('manejadorbasededatosinterface.php');
require_once('mysql.php');

use \ManejadorBaseDeDatosInterface; // Si no agergamos esta linea, ERROR!!!!!!, pensara que "ManjeadorBaseDeDatosInterface" es una clase en el ambito "Persistencia" y no en el global.

class BaseDeDatos{
	private $_manejador;
	
	public function __construct(ManejadorBaseDeDatosInterface $manejador){
		$this->_manejador = $manejador;
	}

	public function ejecutar(Sql $sql){
		$datos="";
		$this->_manejador->conectar();
		
		//if($sql->isInsert()){
		//	$datos = $this->_manejador->insertarDatos($sql);
		//}else{
			$datos = $this->_manejador->traerDatos($sql);		
			$this->_manejador->desconectar();
		//}
		
		return $datos;
	}
}