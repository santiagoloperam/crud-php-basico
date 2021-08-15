<?php 
	if (!isset($_POST['id'])) {
		header('Location: index.php');
	}

	include 'conection.php';

	$id = $_POST['id'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	$price = $_POST['price'];

	$sentencia = $db->prepare("UPDATE productos SET name = ?, description = ?, price = ? WHERE id= ?;");
	$res = $sentencia->execute([$name,$description,$price,$id]);

	if ($res === true) {
		header('Location: index.php');
	}else{
		echo "Error al actualizar";
	}



 ?>