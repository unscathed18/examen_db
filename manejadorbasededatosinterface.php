<?php
require_once('Persistencia/sql.php');

interface ManejadorBaseDeDatosInterface{
	public function conectar();
	public function desconectar();
	public function traerDatos(Persistencia\Sql $sql);
}