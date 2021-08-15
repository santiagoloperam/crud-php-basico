<?php 	
	if(!isset($_post['name'])){
		echo "No se envio nada";
	}

	include 'conection.php';
	$name = $_POST['name'];
	$description = $_POST['description'];
	$price = $_POST['price'];

	$sentencia = $db->prepare("INSERT INTO productos (name,description,price) VALUES (?,?,?);");
	$res = $sentencia->execute([$name,$description,$price]);

	if ($res === true) {
		header('Location: index.php');
	}else{
		echo "No se pudo crear el registro";
	}

 ?>