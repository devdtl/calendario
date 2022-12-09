<?php

require_once('bdd.php');
if (isset($_POST['delete']) && isset($_POST['id'])){
	
	
	$id = $_POST['id'];
	
	$sql = "DELETE FROM events WHERE id = $id";
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$res = $query->execute();
	if ($res == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}
	
	if (isset($_POST['title'])  && isset($_POST['editarcliente'])  && isset($_POST['editarhora'])
	  && isset($_POST['editarproducto1']) && isset($_POST['editarproducto2']) && 
	  isset($_POST['editarproducto3']) && isset($_POST['editarproducto4']) && 
	  isset($_POST['editarproducto5']) && isset($_POST['editarproducto6']) &&
	   isset($_POST['editarproducto7']) && isset($_POST['editarproducto8']) && 
	   isset($_POST['editarproducto9']) && isset($_POST['editarproducto10']) &&
	    isset($_POST['color'])){
	
	$id = $_POST['id'];
	$title = $_POST['title'];
	$cliente = $_POST['editarcliente'];
	$hora = $_POST['editarhora'];
	$producto1 = $_POST['editarproducto1'];
	$producto2 = $_POST['editarproducto2'];
	$producto3 = $_POST['editarproducto3'];
	$producto4 = $_POST['editarproducto4'];
	$producto5 = $_POST['editarproducto5'];
	$producto6 = $_POST['editarproducto6'];
	$producto7 = $_POST['editarproducto7'];
	$producto8 = $_POST['editarproducto8'];
	$producto9 = $_POST['editarproducto9'];
	$producto10 = $_POST['editarproducto10'];
	$color = $_POST['color'];
	
	$sql = "UPDATE events SET  title = '$title', cliente = '$cliente', hora = '$hora', producto1 = '$producto1', producto2 = '$producto2', producto3 = '$producto3', producto4 = '$producto4', producto5 = '$producto5', producto6 = '$producto6', producto7 = '$producto7', producto8 = '$producto8', producto9 = '$producto9',  producto10 = '$producto10', color = '$color' WHERE id = $id ";

	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}
header('Location:index.php');
}
	
?>
