<?php

namespace Persistencia;
require_once('Persistencia/basededatos.php');
require_once('Persistencia/sql.php');
require_once('Persistencia/mysql.php');

class UsuarioPersistencia{
	public function getAll(){
		$bd = new BaseDeDatos(new MySQL());
		$sql = new Sql();

		$sql->addTable('usuarios');
		return $bd->ejecutar($sql);
	}

	public static function load($id){
		$bd = new BaseDeDatos(new MySQL());
		$sql = new Sql();

		$sql->addTable('usuarios');
		$sql->addWhere("id = ".$id);

		return $bd->ejecutar($sql);
	}

	public function guardarUsuario($nombre, $apellido){
		$bd = new BaseDeDatos(new MySQL());
		$sql = new Sql();

		$sql->addFunction("insert");
		$sql->addTable("usuarios");
		$sql->addSelect("nombre");
		$sql->addSelect("apellido");
		$sql->addValue($nombre);
		$sql->addValue($apellido);

		return $bd->ejecutar($sql);
	}

	public function modificarUsuario($id, $nombre, $apellido){
		$bd = new BaseDeDatos(new MySQL());
		$sql = new SQL();

		$sql->addFunction("update");
		$sql->addTable("usuarios");
		$sql->addSelect("nombre='".$nombre."'");
		$sql->addSelect("apellido='".$apellido."'");
		$sql->addWhere("id=".$id);

		return $bd->ejecutar($sql);
	}

	public function eliminarUsuario($id){
		$bd = new BaseDeDatos(new MySQL());
		$sql = new SQL();

		$sql->addFuncion("delete");
		$sql->addTable("usuarios");
		$sql->addWhere("id=".$id);

		return $bd->ejecutar($sql);
	}
}