<?php 
require_once 'CriterioFiltro.php';
require_once 'db_config.php';

class FiltroTitulo implements CriterioFiltro{ 
	private $_titulo;
	private $_sql = null;
	private $resultados = array();

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
		$resultados = 

		//Primero obtenemos las rows que coinciden con el criterio.
		if(!$this->_sql){
			$consulta = new Sql();
			$consulta->addTable("juegos");
			$consulta->addWhere($this->getCondicion());
		}

		return $lista_juegos;
	}

	public function getCondicion(){
		return "titulo = '".$this->_titulo."'";
	}
}