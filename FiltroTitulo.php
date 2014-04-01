<?php 
require_once 'CriterioFiltro.php';

class FiltroTitulo implements CriterioFiltro{ 
	private $_titulo;

	public function __construct($titulo) { 
		$this->_titulo = $titulo;
	} 
	
	public function esSeleccionable(Juego $juego) { 
		$encontrado = false; 
		$pattern = "/(".$this->_titulo.")/i";
		if(preg_match($pattern, $libro->getTitulo())){
			$encontrado = true; 
		}
		return $encontrado; 
	}

	public function getResultados(){
		$lista_juegos = array();



		return $lista_juegos;
	}

	public function getCondicion(){
		return " ";
	}
}