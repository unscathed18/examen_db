<?php

namespace Persistencia;

class Sql{
	private $_colWhere = array();
	private $_colSelect = array();
	private $_colFrom = array();

	public function addTable($table){
		$this->_colFrom[] = $table;
	}
	
	public function addWhere($where){
		$this->_colWhere[] = $where;
	}

	private function _generar(){
		$select = implode(',', array_unique($this->_colSelect));
		$from = implode(',', array_unique($this->_colFrom));
		$where = implode(' AND ', array_unique($this->_colWhere) );
		$txt = "SELECT * ".$select.' FROM '.$from;
		if(!empty($this->_colWhere)){
			$txt .= " WHERE ".$where;
		}
		return $txt;
	}
	public function __toString(){
		
		return $this->_generar();
	}
}