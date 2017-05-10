<?php
include_once 'connection.php';
include 'sendmail.php';

//get parameters
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];


//table data
$table = 'registros';

//if (!userExists($email, $conexion)) {
  # code...
  $insertar = "INSERT INTO $table (nombre,correo,telefono,mensaje) VALUES ('$name','$email','$phone','$message')";
  mysqli_query($conexion,$insertar);

  $bool = sendEmail($name,$email,$phone,$message);
  if ($bool) {
    # code...
    $message = 'success';
  } else {
    $message = 'warning';
  }
//} else {
  # code...
//  $message = 'warning';
//}

function userExists($user, $conexion)
{
  $band = false;
  $consulta= "SELECT * FROM registros WHERE email = '$user'";
  $resultado = mysqli_query($conexion,$consulta);
  $row = mysqli_fetch_row($resultado);
  if (sizeof($row) > 0) {
    $band = true;
  }
  return $band;
}

mysqli_close($conexion);

echo $message;
?>
