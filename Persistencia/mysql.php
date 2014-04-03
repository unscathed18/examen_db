<?php

namespace Persistencia;
require_once('manejadorbasededatosinterface.php');

use \ManejadorBaseDeDatosInterface;

class MySQL implements ManejadorBaseDeDatosInterface{
	private $_usuario;
	private $_clave;
	private $_base;
	private $_servidor;
	private $_conexion; // Resource
	
	public function conectar(){
		$this->_usuario = 'root';
		$this->_clave = '';
		$this->_servidor = 'localhost';
		$this->_base = 'tiendavideojuegos';
		
		$this->_conexion = mysql_connect($this->_servidor, $this->_usuario, $this->_clave);
		
		mysql_select_db($this->_base, $this->_conexion);
	}
	
	public function desconectar(){
		mysql_close($this->_conexion);
	}
	public function traerDatos(Sql $sql){
		//echo $sql."<br/><br/>";
		$resultado = mysql_query($sql,$this->_conexion);
		$todo = array();
		while($fila = mysql_fetch_array($resultado)){
			$todo[] = $fila;
		}
		
		return $todo;
	}

	public function insertarDatos(Sql $sql){
		$resultado = mysql_query($sql, $this->_conexion);
		return $resultado;
	}

	
}
