<?
include("../../phpmailer/class.phpmailer.php");
include("../../phpmailer/class.smtp.php");
 
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
$mail->Username = "propostas@fesbe.org.br";
$mail->Password = "f3d3r4c40";

$mail->From = "propostas@fesbe.org.br";
$mail->FromName = "Propostas FeSBE";
$mail->Subject = "Subject del Email";
$mail->AltBody = "Hola, te doy mi nuevo numero\nxxxx.";
$mail->MsgHTML("Hola, te doy mi nuevo numero<br><b>xxxx</b>.");
//$mail->AddAttachment("files/files.zip");
//$mail->AddAttachment("files/img03.jpg");
$mail->AddAddress("felipe.moratori@gmail.com", "Fes");
$mail->IsHTML(true);
 
if(!$mail->Send()) {
  echo "Error: " . $mail->ErrorInfo;
} else {
  echo "Mensaje enviado correctamente";
}
?>