<?php
//Base de datos
$conexion = new mysqli('localhost','root','root','smartliving');

//fecha de la exportación
$fecha = date("d-m-Y");
$consulta= "SELECT * FROM registros";
$resultado= $conexion->query($consulta);

//Inicio de la instancia para la exportación en Excel
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Registros_SmartLiving_Landing_$fecha.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo "<table border=1> ";
echo "<tr> ";
echo  "<th colspan='6'>REPORTE DE REGISTROS - SMART LIVING </th> ";
echo "</tr> ";
echo "<tr> ";
echo  "<th>N&deg;</th> ";
echo  "<th>Nombre</th> ";
echo 	"<th>Correo</th> ";
echo 	"<th>Teléfono</th> ";
echo  "<th>Mensaje</th> ";
echo 	"<th>Fecha</th> ";
echo "</tr> ";

while($row = mysqli_fetch_array($resultado)){

	$id = $row['id'];
	$nombre = $row['nombre'];
	$correo = $row['correo'];
	$telefono = $row['telefono'];
	$mensaje = $row['mensaje'];
  $fecha = $row['fecha'];

	echo "<tr> ";
	echo 	"<td>".$id."</td> ";
	echo 	"<td>".$nombre."</td> ";
	echo 	"<td>".$correo."</td> ";
	echo 	"<td>".$telefono."</td> ";
  echo 	"<td>".$mensaje."</td> ";
	echo 	"<td>".$fecha."</td> ";
	echo "</tr> ";

}
echo "</table> ";

?>
