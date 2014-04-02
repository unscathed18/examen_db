<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: text/html; charset=UTF-8');
?>

<!DOCTYPE html>
<html>
<head>
<title>Examen DB</title>
<meta charset="utf-8"/>
</head>
<body>

<?php

require_once 'db_config.php';
require_once 'TiendaVideojuegos.php'; 
require_once 'FiltroAnual.php'; 
require_once 'FiltroEmpresa.php'; 
require_once 'FiltroGenero.php';
require_once 'FiltroTitulo.php'; 

abstract class Index { 
	public function run() { 
		
		$tiendaVideoJuegos = new TiendaVideojuegos();
		$juegos = $tiendaVideoJuegos->busqueda(new FiltroTitulo("Phoenix Wright: Ace Attorney"));

		foreach($juegos as $juego){
			//echo $juego."<br/>";
		}

		$sql = new Persistencia\Sql();
		$sql->insertarJuego(new Juego(-1,"Metal Gear Solid", "accion","METARU GIAA", "MUY BUEN JUEGO", 1993, "konami"));
		$tiendaVideoJuegos->addJuego($sql);

		
		echo $sql;
	}
}

Index::run();
?>
</body>
</html>