<?php 
	include 'conection.php';
	$sentencia = $db->query('SELECT * FROM productos');
	$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Crud 2</title>
</head>
<body>
	<h3>Lista</h3>
	<table border="1px">
		<tr>
			<td>ID</td>
			<td>NOMBRE</td>
			<td>DESCRIPCIÓN</td>
			<td>PRECIO</td>
			<td>EDITAR</td>
			<td>ELIMINAR</td>			
		</tr>

		<?php 
			foreach ($productos as $producto) {
		 ?>
		 	<tr>
		 		<td><?php echo $producto->id; ?></td>
		 		<td><?php echo $producto->name; ?></td>
		 		<td><?php echo $producto->description; ?></td>
		 		<td><?php echo $producto->price; ?></td>
		 		<td><a href="edit.php?id=<?php echo $producto->id; ?>">Editar</a></td>
		 		<td><a href="delete.php?id=<?php echo $producto->id; ?>">Eliminar</a></td>
		 	</tr>

		 <?php 
		 	}
		  ?>

	</table>

	<br><hr><br>

	<h3>Ingresar Registro</h3>
	<form action="create.php" method="POST">
		<table>
			<tr>
				<td>Nombre: </td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>Descripción: </td>
				<td><input type="text" name="description"></td>
			</tr>
			<tr>
				<td>Precio: </td>
				<td><input type="number" name="price"></td>
			</tr>
			<tr>
				<td><input type="reset" value="Limpiar"></td>
				<td><input type="submit" value="Agregar"></td>
			</tr>
		</table>
	</form>
</body>
</html>