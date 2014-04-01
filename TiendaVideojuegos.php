<?php 
require_once 'Juego.php'; 
//require_once 'CriterioFiltro.php'; 

class TiendaVideojuegos { 
	private $_listaJuegos = array(); 
	
	public function busqueda(CriterioFiltro $filtro) { 
		$_listaJuegos = array();
		foreach( $this->_listaJuegos as $juego){ 
			if( $filtro->esSeleccionable($juego)){ 
				$juegosRetorno[]= $juego; 
			}
		} 
			return $juegosRetorno; 
	}
	
	public function addJuego(Juego $juego) { 
		$this->_listaJuegos[] = $juego;
	}

	public function getJuego($index){
		if($index >= count($this->_listaJuegos)){
			throw new Exception("Index de juego invalido! Esta fuera del rango del vector --> ".$index);
		}
		return $this->_listaJuegos[$index];
	}
}