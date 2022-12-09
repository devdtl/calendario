<?php

// Connexion à la base de données
require_once('bdd.php');
//echo $_POST['title'];
if (isset($_POST['title'])  && isset($_POST['cliente']) && isset($_POST['hora']) && isset($_POST['producto1']) && isset($_POST['producto2']) && isset($_POST['producto3']) && isset($_POST['producto4']) && isset($_POST['producto5']) && isset($_POST['producto6']) && isset($_POST['producto7']) && isset($_POST['producto8']) && isset($_POST['producto9']) && isset($_POST['producto10']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
	
	$title = $_POST['title'];
	$cliente = $_POST['cliente'];
	$hora = $_POST['hora'];
	$producto1 = $_POST['producto1'];
	$producto2 = $_POST['producto2'];
	$producto3 = $_POST['producto3'];
	$producto4 = $_POST['producto4'];
	$producto5 = $_POST['producto5'];
	$producto6 = $_POST['producto6'];
	$producto7 = $_POST['producto7'];
	$producto8 = $_POST['producto8'];
	$producto9 = $_POST['producto9'];
	$producto10 = $_POST['producto10'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];

	$sql = "INSERT INTO events(title, cliente, hora, producto1, producto2, producto3, producto4, producto5, producto6,
	 producto7, producto8, producto9, producto10, start, end, color) values
	  ('$title', '$cliente', '$hora', '$producto1', '$producto2', '$producto3', '$producto4',  '$producto5', '$producto6',  '$producto7', '$producto8',  '$producto9', '$producto10', '$start', '$end', '$color')";
	//$req = $bdd->prepare($sql);
	//$req->execute();
	
	echo $sql;
	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Errpr en prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Error de ejecución');
	}

}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
