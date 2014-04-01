<?php

namespace Persistencia;

require_once('/../manejadorbasededatosinterface.php');
require_once('mysql.php');

use \ManejadorBaseDeDatosInterface; // Si no agergamos esta linea, ERROR!!!!!!, pensara que "ManjeadorBaseDeDatosInterface" es una clase en el ambito "Persistencia" y no en el global.

class BaseDeDatos{
	private $_manejador;
	
	public function __construct(ManejadorBaseDeDatosInterface $manejador){
		$this->_manejador = $manejador;
	}
	
	public function BaseDeDatos(ManejadorBaseDedatosInterface $manejador){
	}

	public function ejecutar(Sql $sql){
		$this->_manejador->conectar();
		
		$datos = $this->_manejador->traerDatos($sql);
		
		$this->_manejador->desconectar();
		
		return $datos;
	}
}