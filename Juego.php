<?php 
require 'Empresa.php';

class Juego{ 

	//Fields
	private $_id;
	private $_titulo;
	private $_titulo_ori; // NULL
	private $_descripcion; // NULL
	private $_year; // NULL
	private $_empresa; // NULL
	private $_genero;

	// Methods
	public function __construct($id, $titulo, $genero, $titulo_ori="", $descripcion = "", $year = -1, $empresa = null) { 
		$this->_id = $id;
		$this->_titulo = $titulo;
		$this->_titulo_ori = $titulo_ori;
		$this->_descripcion = $descripcion;
		$this->_year = $year;
		$this->_empresa = $empresa;
		$this->_genero = $genero;
	}

	//Setters
	public function setTitulo($titulo) {
		$this->_titulo = $titulo;
	}

	public function setTitulo_ori($titulo_ori){
		$this->_titulo_ori = $titulo_ori;
	}

	public function setDescripcion($descripcion){
		$this->_descripcion = $descripcion;
	}

	public function setYear($year){
		$this->_year = $year;
	}

	public function setEmpresa(Empresa $empresa){
		$this->_empresa = $empresa;
	}

	public function setGenero(Genero $genero){
		$this->_genero = $genero;
	}

	//Getters
	public function getTitulo() {
		return $this->_titulo;
	} 
	public function getTitulo_ori() { 
		return $this->_titulo_ori; 
	}
	public function getYear() { 
		return $this->_year;
	}

	public function getEmpresa(){
		return $this->_empresa;
	}

	public function getGenero(){
		return $this->_genero;
	}

	public function getDescripcion(){
		return $this->_descripcion;
	}

	public function getID(){
		return $this->_id;
	}

	// Override
	public function __toString() { 
		return $this->_titulo + " -- Genero: " + $this->_genero;
	}
}