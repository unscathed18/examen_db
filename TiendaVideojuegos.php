<?php 
require_once 'Juego.php'; 
require_once 'CriterioFiltro.php'; 

class TiendaVideojuegos { 
	private $_listaJuegos = array(); 
	
	public function busqueda(CriterioFiltro $filtro = null) { 
		/* Esta funcion se podria realizar de 2 maneras: 
			1 - Leer cada fila de la tabla y pasarlo a un objeto. 1 fila - 1 objeto.
			2 - Hacer una consulta SQL que me devuelva 
		*/
		/*$_listaJuegos = array();
		foreach( $this->_listaJuegos as $juego){ 
			if( $filtro->esSeleccionable($juego)){ 
				$juegosRetorno[]= $juego; 
			}
		}*/
		$listaJuegos = array();

		if($filtro == null){
			$listaJuegos = $this->getListado();
		}else{
			$listaJuegos = $filtro->getResultados();
		}
		
		return $juegosRetorno; 
	}

	public function getListado(){
		return 
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