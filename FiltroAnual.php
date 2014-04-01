<?php 
require_once 'CriterioFiltro.php';

class FiltroAnual implements CriterioFiltro{ 
	private $_year;

	public function __construct($year) { 
		$this->_year = $year;
	} 
	
	public function esSeleccionable(Juego $juego) { 
		$encontrado = false; 
		if($libro->getYear() == $this->_year){
			$encontrado = true; 
		}
		return $encontrado; 
	}
}