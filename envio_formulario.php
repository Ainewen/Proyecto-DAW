<?php
if(!empty($_POST['nombre']) AND !empty($_POST['email']) AND !empty($_POST['telefono']) AND !empty($_POST['mensaje']) AND !empty($_POST['g-recaptcha-response'])){
 
$to ="info@fabricacolchoneszaragoza.es";
$headers = "Content-Type: text/html; charset=utf-8\n"; 
$headers .= "De:".$_POST['nombre']."\r\n";            
$tema="Contacto desde el Sitio Web Fabrica Colchones Zaragoza";
$mensaje="
<table border='0' cellspacing='2' cellpadding='2'>
  <tr>
    <td width='20%' align='center' bgcolor='#FFFFCC'><strong>Nombre:</strong></td>
    <td width='80%' align='left'>$_POST[nombre]</td>
  </tr>
  <tr>
    <td align='center' bgcolor='#FFFFCC'><strong>E-mail:</strong></td>
    <td align='left'>$_POST[email]</td>
  </tr>
  <tr>
    <td align='center' bgcolor='#FFFFCC'><strong>Teléfono:</strong></td>
    <td align='left'>$_POST[telefono]</td>
  </tr>
   <tr>
    <td width='20%' align='center' bgcolor='#FFFFCC'><strong>Mensaje</strong></td>
    <td width='80%' align='left'>$_POST[mensaje]</td>
  </tr>
</table>
";

	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$data = array(
		'secret' => '6Lf8spMUAAAAAHNFToU0SX26A6No5IT1b1N_Jy8l',
		'response' => $_POST['g-recaptcha-response']
	);
	$options = array(
		'http' => array (
			'method' => 'POST',
			'content' => http_build_query($data)
		)
	);
	$context  = stream_context_create($options);
	$verify = file_get_contents($url, false, $context);
	$captcha_success = json_decode($verify);
	if($captcha_success->success){
	@mail($to,$tema,$mensaje,$headers);
	
	echo "Su mensaje ha sido enviado, gracias.<br /><a href='contacto.html'>Volver a la página anterior</a>";}
	 	
} else {
		echo "No se puede enviar el formulario, verifica los campos. <br /><a href='contacto.html'>Volver a la página anterior</a>";
}

?>