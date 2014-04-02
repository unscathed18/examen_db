<?php

namespace Persistencia;

class Sql{
	private $_colWhere = array();
	private $_colSelect = array();
	private $_colFrom = array();
	private $_insert = "";
	private $_bInsert = false;

	public function addTable($table){
		$this->_colFrom[] = $table;
	}
	
	public function addWhere($where){
		$this->_colWhere[] = $where;
	}

	public function addInsert($insert){
		$this->_colInsert[] = $insert;
	}

	private function _generar(){
		$txt = "";
		if($this->_bInsert){// INSERTAR
			return $this->_insert;
		}else{
			// SELECT
			$select = implode(',', array_unique($this->_colSelect));
			$from = implode(',', array_unique($this->_colFrom));
			$where = implode(' AND ', array_unique($this->_colWhere));
			$txt .= "SELECT ".$select.' FROM '.$from;
			if(!empty($this->_colWhere)){
				$txt .= " WHERE ".$where;
			}
		}
		return $txt;
	}
	public function addSelect($select){
		$this->_colSelect[] = $select;
	}

	public function insertarJuego(\Juego $juego){
		$this->_bInsert = true;
		$txt = "";

		$txt .= "INSERT INTO juego (titulo, titulo_ori, descripcion, year";
			if($juego->getEmpresa() != ""){
				$txt .= ",empresa_id";
			}
		$txt .=",genero_id) VALUES(";
		$txt .= "'".$juego->getTitulo()."',";
		$txt .= "'".$juego->getTitulo_ori()."',";
		$txt .= "'".$juego->getDescripcion()."',";
		$txt .= "".$juego->getYear().",";

		if($juego->getEmpresa() != ""){
			$txt .= "(SELECT id FROM empresa WHERE lower(nombre) = '".strtolower($juego->getEmpresa())."' )".",";
		}

		$txt .= "(SELECT id FROM genero WHERE lower(nombre) = '".strtolower($juego->getGenero())."' )"."";
		$txt .= ")";
		$this->_insert = $txt;
		return $this->_insert;
	}

	public function isInsert(){
		return $this->_bInsert;
	}
	
	public function __toString(){
		
		return $this->_generar();
	}
}