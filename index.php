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
		$juegosTitulo = $tiendaVideoJuegos->busqueda(new FiltroTitulo("Phoenix Wright: Ace Attorney"));
		$juegosYear = $tiendaVideoJuegos->busqueda(new FiltroAnual(1999));
		$juegosEmpresa = $tiendaVideoJuegos->busqueda(new FiltroEmpresa('konami'));
		$juegosGenero = $tiendaVideoJuegos->busqueda(new FiltroGenero('novela visual'));

		echo "<h1>Filtro por titulo</h1>";
		foreach($juegosTitulo as $juego){
			
			echo $juego."<br/><br/>";
		}
		echo "<br><br>";

		echo "<h1>Filtro por a&ntilde;o</h1>";
		foreach($juegosYear as $juego){
			
			echo $juego."<br/><br/>";
		}
		echo "<br><br>";

		echo "<h1>Filtro por empresa</h1>";
		foreach($juegosEmpresa as $juego){
			echo $juego."<br/><br/>";
		}
		echo "<br><br>";

		echo "<h1>Filtro por Genero</h1>";
		foreach($juegosGenero as $juego){
			echo $juego."<br/><br/>";
		}
		echo "<br><br>";



		//Aniadir juego a BD
		/*$sql = new Persistencia\Sql();
		$sql->insertarJuego(new Juego(-1,"Metal Gear Solid", "accion","METARU GIAA", "MUY BUEN JUEGO", 1993, "konami"));
		$tiendaVideoJuegos->addJuego($sql);*/
		
	}
}

Index::run();
?>
</body>
</html>