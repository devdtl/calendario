<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=pos;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=pos",
			            "root",
			            "");

		$link->exec("set namonth utf8");

		return $link;

	}

}
