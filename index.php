<?php 
require_once 'db_config.php';
require_once 'TiendaVideojuegos.php'; 
require_once 'FiltroAnual.php'; 
require_once 'FiltroAutor.php'; 
require_once 'FiltroTema.php'; 
require_once 'FiltroTitulo.php'; 

abstract class Index { 
	public function run() { 
		$tiendaVideojuegos = new TiendaVideojuegos(); 
		/* * Carga de autores */ 
		$libreria->addAutorLibro('Introduccion a PHP', 'Enrique', 'Place'); 
		/* * Búsqueda de libros */ 
		
		$libros2008 = $libreria->busqueda(new FiltroAnual(2008)); 
		$librosAutor = $libreria->busqueda(new FiltroAutor('Enrique','Place'));
		$librosTema = $libreria->busqueda(new FiltroTema('PHP')); 
		$librosTitulo = $libreria->busqueda(new FiltroTitulo('Java')); 

		echo self::_librosEncontrados2Html("Libros del 2008: ",$libros2008);
		echo self::_librosEncontrados2Html("Libros del Autor: ",$librosAutor);
		echo self::_librosEncontrados2Html("Libros del Tema: ",$librosTema); 
		echo self::_librosEncontrados2Html("Libros del Titulo: ",$librosTitulo);
	} 
	private function _librosEncontrados2Html($titulo, $array) 
	{ 
		return $titulo.': ' . implode(', ', $array).'<br><br>';
	}
}

Index::run();