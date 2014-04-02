<?php 
require_once 'CriterioFiltro.php';

class FiltroEmpresa implements CriterioFiltro{ 
	private $_nombre;

	public function __construct($nombre) { 
		$this->_nombre = $nombre; 
	} 
	
	public function esSeleccionable(Juego $juego) { 
		$encontrado = false; 
		/*if(this->_nombre == $juego->getEmpresa()->getNombre()){
			$encontrado = true;
		}*/
		return $encontrado; 
	}
	public function getResultados(){

	}
	public function getCondicion(){
		
	}
}