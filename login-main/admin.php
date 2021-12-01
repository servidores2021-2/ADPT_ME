<!DOCTYPE html> 
<meta charset="UTF-8">

<?php 

$con = mysqli_connect("localhost", "root","","rol") or die ("Error!"); 

?>

<html>
<head>
	<title>Aplicacion</title>
	</HEAD>
    <h1>
        <P ALIGN="CENTER"><FONT SIZE="7" COLOR="BLACK" FACE="Tempus Sans ITC"> Hola Administrador

    </h1>   <B><B></FONT> <B><B>
    <H2>
        <P ALIGN="CENTER"><FONT SIZE="7" COLOR="BLACK" FACE="Tempus Sans ITC"> Altas y bajas Personal 

    </H2>   <B><B></FONT> <B><B>
	<meta charset="utf-8">
	
  
   </head>
<body BACKGROUND="perro.jpg">
 <form method="POST" action="admin.php">

	 <label>Nombre:<br></label>
	 <input type="text" name="nombre" placeholder = "Escriba su nombre"><br />
	 <label>Correo:<br> </label>
	 <input type="text" name="usuario" placeholder = "Escriba su correo"><br />
	 <label>CContraseña:<br> </label>
	 <input type="password" name="contraseña" placeholder = "Escriba su contraseña"><br />
	 <label>id_cargo:<br></label>
	 <input type="int" name="id_cargo" placeholder = "Escriba su id de cargo"><br />
	 <label>insertar:<br></label>
	
	 <input type="submit" name="insert" value = "INSERTAR DATOS">

 </form>

<?php
	if(isset($_POST["insert"])){
		
		$nombre = $_POST["nombre"];
		$usuario = $_POST["usuario"];
		$contraseña = $_POST["contraseña"];
		$id_cargo = $_POST["id_cargo"];
		


		$insertar = "INSERT INTO usuarios (nombre,usuario,contraseña,id_cargo) VALUES ('$nombre', '$usuario', '$contraseña', '$id_cargo')";
		$ejecutar = mysqli_query($con, $insertar);

		if ($ejecutar){
			echo "<h3>Insertado Correctamente</h3>";
		}
	}
?>
<br/>
<center><table width="500" border="2" style="background-color: #F9F9F9; ">
	<tr>
		<th>Id</th>
		<th>nombre</th>
		<th>usuario</th>
		<th>contraseña</th>
		<th>cargo</th>
		<th>Editar</th>
		<th>Borrar</th>
	</tr></center>
<?php
$consulta = "SELECT * FROM usuarios";
$ejecutar = mysqli_query($con, $consulta);
$i = 0;
while ( $fila = mysqli_fetch_array($ejecutar)) {
	$id = $fila['id'];
	$nombre = $fila['nombre'];
	$usuario = $fila['usuario'];
	$contraseña = $fila['contraseña'];
	$id_cargo = $fila['id_cargo'];

	$i++;

?>
<tr align="center">
<td><?php echo $id; ?></td>
<td><?php echo $nombre; ?></td>
<td><?php echo $usuario; ?></td>
<td><?php echo $contraseña; ?></td>
<td><?php echo $id_cargo; ?></td>
<td><a href="admin.php?editar=<?php echo $id; ?>">Editar</a></td>
<td><a href="admin.php?borrar=<?php echo $id; ?>">Borrar</a></td>
</tr>
<?php } ?>
</table>

<?php
if(isset($_GET['editar'])){
	include("editar.php");
}
?>

<?php
if(isset($_GET['borrar'])){
	$borrar_id = $_GET['borrar'];
	$borrar = "DELETE  FROM usuarios WHERE id = '$borrar_id'";
	$ejecutar = mysqli_query($con, $borrar);

	if ($ejecutar){
		echo "<script>alert('El usuario ha sido borrado!')</script>";
		echo "<script>windoows.open('admin.php','_self')</script>";
	}

}
?>
<br><br><br><br><br>
<MARQUEE  FACE="Arial Unicode MS" BEHAVIOR="ALTERNATE" BGCOLOR ="PINK">
<FONT COLOR="BLACK">
<center> <H1>ADPT-ME</H1>
</FONT></MARQUEE>
</body>
</html>
