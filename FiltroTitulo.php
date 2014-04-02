<?php 
require_once 'CriterioFiltro.php';
require_once 'db_config.php';

class FiltroTitulo implements CriterioFiltro{ 
	private $_titulo;
	private $_sql = null;
	private $_resultados = array();

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
		//Primero obtenemos las rows que coinciden con el criterio.
		if(empty($this->_resultados)){
			$consulta = new Persistencia\Sql();
			$consulta->addTable("juego");
			$consulta->addWhere($this->getCondicion());
			$consulta->addSelect("id");
			$consulta->addSelect("titulo");
			$consulta->addSelect("titulo_ori");
			$consulta->addSelect("descripcion");
			$consulta->addSelect("year");
			$consulta->addSelect("(SELECT nombre FROM empresa, juego WHERE empresa.id = juego.empresa_id ) AS empresa");
			$consulta->addSelect("(SELECT nombre FROM genero, juego WHERE genero.id = juego.genero_id ) AS genero");

			/*
				SELECT id, titulo, titulo_ori, descripcion, year,
				(SELECT nombre FROM empresa, juego WHERE empresa.id = juego.empresa_id ) AS empresa,
				(SELECT nombre FROM genero, juego WHERE genero.id = juego.genero_id ) AS genero

				FROM juego WHERE titulo = 'Phoenix Wright: Ace Attorney'
			*/

			global $bd;
			$arr = $bd->ejecutar($consulta);
			foreach($arr as $row){
				$this->_resultados[] = $this->ToJuego($row);
			}
		}

		return $this->_resultados;
	}

	public function getCondicion(){
		return "titulo = '".$this->_titulo."'";
	}

	public function ToJuego($row){
		$titulo_ori = "";
		$descripcion = "";
		$year = -1;
		$empresa = "";

		$id = $row['id'];
		$titulo = $row['titulo'];
		$genero = $row['genero'];


		$titulo = $row['titulo'];
		if($row['titulo_ori'] > ''){ // NULL or empty
			$titulo_ori = $row['titulo_ori'];
		}

		if($row['descripcion'] > ''){ // NULL or empty
			$descripcion = $row['descripcion'];
		}

		if($row['year'] > ''){ // NULL or empty
			$year = $row['year'];
		}

		if($row['empresa'] > ''){ // NULL or empty
			$empresa = $row['empresa'];
		}

		$juego = new Juego($id, $titulo, $genero, $titulo_ori, $descripcion, $year, $empresa);
		return $juego; 
	}
}