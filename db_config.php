<?php
require_once('manejadorbasededatosinterface.php');
require_once('Persistencia/basededatos.php');
require_once('Persistencia/mysql.php');
require_once('Persistencia/sql.php');

$bd = new Persistencia\BaseDeDatos(new Persistencia\MySQL());