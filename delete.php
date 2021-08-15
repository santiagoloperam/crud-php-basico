<?php 	

if (!isset($_GET['id'])) {
	header('Location: index.php');
}

$id = $_GET['id'];

include('conection.php');

$sentencia = $db->prepare("DELETE FROM productos WHERE id = ?;");
$res = $sentencia->execute([$id]);

if ($res === true) {
	header('Location: index.php');
}else{
	echo "No se eliminó el registro";
}

 ?>