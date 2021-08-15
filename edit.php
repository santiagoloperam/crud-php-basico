<?php 
	if (!isset($_GET['id'])) {
		header('Location: inex.php');	
	}
	include 'conection.php';
	$id = $_GET['id'];

	$sentencia = $db->prepare("SELECT * FROM productos WHERE id = ?;");
	$sentencia->execute([$id]);
	$res = $sentencia->fetch(PDO::FETCH_OBJ);

	if (!$res->id) {
		exit();
			}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Editar Registro</title>
</head>
<body>
	<center>
		<h3>Editar Productio</h3>
		<form method="POST" action="update.php">
			<table>
				<tr>
					<td>Nombre: </td>
					<td><input type="text" name="name" value="<?php echo $res->name; ?>"></td>
				</tr>
				<tr>
					<td>Descripción: </td>
					<td><input type="text" name="description" value="<?php echo $res->description; ?>"></td>
				</tr>
				<tr>
					<td>Precio: </td>
					<td><input type="text" name="price" value="<?php echo $res->price; ?>"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="Editar Producto"></td>
				</tr>

				<input type="hidden" name="id" value="<?php echo $res->id; ?>">
			</table>
		</form>
	</center>
</body>
</html>