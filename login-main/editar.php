<?php
if(isset($_GET['editar'])){
	$editar_id = $_GET['editar'];

	$consulta = "SELECT * FROM usuarios WHERE id = '$editar_id'";
	$ejecutar = mysqli_query($con, $consulta);

	$fila = mysqli_fetch_array($ejecutar);

    $id = $fila['id'];
	$nombre = $fila['nombre'];
	$usuario = $fila['usuario'];
	$contraseña = $fila['contraseña'];
	$id_cargo = $fila['id_cargo'];
}
?>
<br />
<form method="POST" action="">
<input type="int" name="id" value="<?php echo $id; ?>"><br />
<input type="text" name="nombre" value="<?php echo $nombre; ?>"><br />
<input type="text" name="usuario" value="<?php echo $usuario; ?>"><br />
<input type="password" name="contraseña" value="<?php echo $contraseña; ?>"><br />

<input type="text" name="id_cargo" value="<?php echo $id_cargo; ?>"><br />
<input type="submit" name="actualizar" value="ACTUALIZAR DATOS">
</form>

<?php
if (isset($_POST['actualizar'])){

$actualizar_nombre = $_POST['nombre'];
$actualizar_usuario = $_POST['usuario'];
$actualizar_contraseña = $_POST['contraseña'];
$actualizar_id_cargo = $_POST['id_cargo'];

$actualizar = "UPDATE usuarios SET  nombre='$actualizar_nombre', usuario='$actualizar_usuario', contraseña='$actualizar_contraseña', id_cargo='$actualizar_id_cargo' WHERE id='$editar_id'";
$ejecutar = mysqli_query($con, $actualizar);

if ($ejecutar){
	echo "<script>alert('Datos Actualizados!')</script>";
	echo "<script>windoows.open('admin.php','_self')</script>";
}
}
?>
