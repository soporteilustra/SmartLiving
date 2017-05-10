<?php
function sendEmail($name,$email,$phone,$message)
{
  # code...
  //$email_to = "soporte@ilustraconsultores.com, branco@ilustraconsultores.com, jeanmev@outlook.es";
  $email_to = "soporte@ilustraconsultores.com";
  $email_subject = "Consulta desde SmartLiving - Landing";

  $email_message = "<b>Detalles de la consulta: </b><br>\n\n";
  $email_message .= "<b>Nombre:</b> " . $name . "<br>\n";
  $email_message .= "<b>Correo:</b> " . $email . "<br>\n";
  $email_message .= "<b>Tel&eacute;fono: </b>" . $phone . "<br>\n";
  $email_message .= "<b>Mensaje: </b>" . $message . "<br>\n";

  // Ahora se envía el e-mail usando la función mail() de PHP
  $headers = "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/html; charset=utf-8\r\n";
  //dirección del remitente
  $headers .= "From: SmartLiving Landing| < soporte@ilustraconsultores.com >\r\n";
  //Enviamos el mensaje a tu_dirección_email
  $bool = mail($email_to,$email_subject,$email_message,$headers);

  return $bool;
}

?>
