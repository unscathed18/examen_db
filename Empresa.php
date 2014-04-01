<?php 
class Empresa { 
	private $_id;
	private $_nombre;

	public function __construct($id, $nombre) {
		$this->_id = $id;
		$this->_nombre = $nombre;
	}

	public function getNombre() { 
		return $this->_nombre;
	}

	public function getID(){
		return $this->_id;
	}

	public function __toString() { 
		return $this->_nombre . ' ' . $this->_apellido; 
	}
}