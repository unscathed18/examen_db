<?php 
require_once 'CriterioFiltro.php';

class FiltroGenero implements CriterioFiltro{ 
	private $_genero;	

	public function __construct($genero) { 
		$this->_genero = $genero;
	} 
	
	public function esSeleccionable(Juego $juego) { 
		$encontrado = false;
		if($libro->getGenero() == $this->_genero){
			$encontrado = true; 
		}
		return $encontrado; 
	}
}