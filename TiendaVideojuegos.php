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
	
	public function addJuego($titulo, $tema, $año) { 
		
	} 
	
	public function addAutorLibro($titulo, $nombreAutor, $apellidoAutor) { 
		foreach($this->_colLibros as $libro){ 
			if($libro->getTitulo() == $titulo){
				$libro->addAutor($nombreAutor,$apellidoAutor); 
			} 
		}
	}
}