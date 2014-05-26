<!DOCTYPE html>
<?php 
ini_set('SMTP','localhost' ); 
ini_set('sendmail_from', 'info@sanatoriodelsalvador.com');
require_once("./classes/mysqlclass.php");
require_once './classes/PHPMailer/PHPMailerAutoload.php';

$db = new MySQL();

if(isset($_POST['contact_email'])){

$to = 'info@sanatoriodelsalvador.com';
$subject = 'Example subject';
$body = 'With an example body…'; 

mail($to, $subject , $body);



	//Create a new PHPMailer instance
	/*$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';*/
	//Set who the message is to be sent from
	//$mail->setFrom('info@sanatoriodelsalvador.com');
	//Set an alternative reply-to address
	//$mail->addReplyTo('info@sanatoriodelsalvador.com');
	

	
	
	
	/* Por gmail */
	/*$mail->IsSMTP();
	$mail->Mailer = "smtp";
	$mail->SMTPSecure = "ssl";
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;
	$mail->SMTPAuth = true;
	$mail->Username = "sanatoriodelsalvadorweb@gmail.com"; // SMTP username
	$mail->Password = "Sanatorio2013"; // SMTP password*/
	
	
	
//$mail->Host = "smtp.gmail.com"; 

	
	
	
	//Set who the message is to be sent to
	//$mail->addAddress('leilu.and@gmail.com');
	//Set the subject line
	//$mail->Subject = 'PHPMailer test local';

	
	
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	//$mail->msgHTML(file_get_contents('./classes/PHPMailer/examples/contents.html'), dirname(__FILE__));
	//Replace the plain text body with one created manually
	//$mail->AltBody = 'This is a message body';
	//Attach an image file
	//$mail->addAttachment('./classes/PHPMailer/examples/images/phpmailer_mini.png');

	//send the message, check for errors
	/*if (!$mail->send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		echo "Message sent!";
	}*/
}

if(isset($_POST['contact_email1'])){
    $name = $_POST['contact_name'];
	$lastname = $_POST['contact_lastname'];
	$mailDeContacto = $_POST['contact_email'];
	$consultation = $_POST['contact_consultation'];
	$destinatario = "leilu.and@gmail.com,leila_and@yahoo.com"; 
	$asunto = "Recibiste una consulta desde la web sanatariodelsalvador.com"; 
	$cuerpo = ' 
	<html> 
	<head> 
	   <title>Consulta desde el formulario de contacto</title> 
	</head> 
	<body> 
	<h1>Consulta desde el formulario de contacto</h1> 
	<p> 
	<b> Han ingresado una direccion de correo> "'. $mailDeContacto .'" , esta persona esta interesada en tu sitio sanatariodelsalvador.com , avisale cuando este online.. y blabla bla inventemos algo aca
	</p> 
	
	<ul>
		<li><span>Nombre y Apellido: </span><b>"'. $name .'"&nbsp; "'. $lastname .'"</b></li>
		<li><span>Correo electr&oacute;nico: </span><b>"'. $mailDeContacto .'"</b></li>
		<li><span>Consulta / Sugerencia: </span><b>"'. $consultation .'"</b></li>
	</ul>
	
	</body> 
	</html> 
	';

	//para el envío en formato HTML 
	$headers = "MIME-Version: 1.0\r\n"; 
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

	//dirección del remitente 
	$headers .= "From: dotPlan <info@sanatoriodelsalvador.com>\r\n"; 

	//dirección de respuesta, si queremos que sea distinta que la del remitente 
	$headers .= "Reply-To: info@sanatoriodelsalvador.com\r\n"; 
	
*/
	
	if(mail($destinatario,$asunto,$cuerpo,$headers)){
		echo "se encio";
	}else{
		echo "no se envio";
	}
} ?>
<html lang="esp">
  <head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
	<script src="https://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
	<script src="js/dotplan.js" type="text/javascript"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sanatorio del Salvador | Contacto</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!-- Menu responsive -->
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link href="css/styles-480.css" rel="stylesheet">
	<link href="css/styles-600.css" rel="stylesheet">
	<link href="css/styles-768.css" rel="stylesheet">  
	<script>
		function mostrar_informacion(cosa){
		
			alert(cosa);
		}
	</script>
	
  </head>
  <body>
	<!--<div class="superior">[Menú]</div>-->
	<div class="cuerpo">
		<div class="cabecera">
			<?PHP include("./layouts/header.php"); ?>
		</div>
		<div class="container">
			<?PHP include("./layouts/menu.php"); ?>
		</div>
		<div class="agenda">
			<?PHP include("./blocks/cta-lateral.php"); ?>
			<?PHP require_once("./blocks/agenda.php"); ?>
			<?PHP require_once("./blocks/editors.php"); ?>
		</div>
		<div class="contenido">
			<div class="breadcrumb">
				<a href="./index.php"><i class="icon-home"></i></a> :: 
				<a href="./contacto.php">Contacto</a>
			</div>
			<div id="contenedor">
				<div class="pageTitle">Contacto</div>
				<div class="contactText">
					<span>Encontranos en:</span>
				</div>
				<div class="contactInfo">
					<div class="contactInfoLeft">
						<?PHP echo $configuration['address'];?> - B° <?PHP echo $configuration['neighborhood'];?></br>
						(<?PHP echo $configuration['zipcode'];?>) - <?PHP echo $configuration['province'];?></br>
						<?PHP echo $configuration['phone_tag_one'];?>: <?PHP echo $configuration['phone_one'];?></br>
						<?PHP echo $configuration['phone_tag_two'];?>: <?PHP echo $configuration['phone_two'];?></br>
						<h2>Seguinos en:</h2>
							<div class="contactSocial">
								<a href="https://twitter.com/<?PHP echo $configuration['twitter'];?>" target="_blank"><img src="img/header/header-tw.jpg" /></a>
								<a href="http://www.flickr.com/<?PHP echo $configuration['flickr'];?> target="_blank"><img src="img/header/header-fr.jpg" /></a>
								<a href="https://www.facebook.com/<?PHP echo $configuration['facebook'];?>" target="_blank"><img src="img/header/header-fb.jpg" /></a>
								<a href="http://www.linkedin.com/<?PHP echo $configuration['linkedin'];?>" target="_blank"><img src="img/header/header-in.jpg" /></a>
								<a href="https://www.youtube.com/<?PHP echo $configuration['youtube'];?>" target="_blank"><img src="img/header/header-yt.jpg" /></a>
							</div>
						<h2><?PHP echo $configuration['phone_tag_three'];?>: <?PHP echo $configuration['phone_three'];?></h2>
					</div>
					<div class="contactInfoRight">
						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3405.180799263397!2d-64.1637038!3d-31.409144399999995!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9432a2a76bf3ac45%3A0x2d73933a91752078!2sGeneral+Deheza+542!5e0!3m2!1ses-419!2sar!4v1396383265013" width="460" height="290" frameborder="0" style="border:0"></iframe>
					</div>
				</div>
				<div class="formContact">
					<div class="contactText">
						<span>Completá el siguiente formulario, y a la brevedad responderemos su consulta:</span>
					</div>
					<div class="contactForm">
					  <form name="visita" action="" method="post"  onsubmit="return mostrar_informacion(this.contact_email.value)">
						<div class="contactField"><div class="contactLabel">Nombre: </div><input class="input_text" name="contact_name" type="text"/></div>
						<div class="clear"></div>
						<div class="contactField"><div class="contactLabel">Apellido: </div><input class="input_text" name="contact_lastname" type="text"/></div>
						<div class="clear"></div>
						<div class="contactField"><div class="contactLabel">Correo Electrónico: </div><input class="input_text" name="contact_email" type="text"/></div>
						<div class="clear"></div>
						<div class="contactField"><div class="contactLabel">Consulta: </div><textarea rows="5" class="input_text" name="contact_consultation" /></textarea></div>
						<div class="clear"></div>
						<div class="contactField"><input type="submit"  value="Enviar" class="boton" /> </div>
						<div class="clear"></div>
					  </form>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<footer class="footer">
		<div class="container">
			<div id="contenedor">
				<?PHP include("./layouts/footer-first.php"); ?>
				<?PHP include("./layouts/footer-second.php"); ?>
				<?PHP include("./layouts/footer-third.php"); ?>
			</div>
		</div><!-- /.container -->
		<div class="clear"></div>
		<div class="copyright">
			<?PHP include("./layouts/copyright.php"); ?>
		</div><!-- /.copyright -->
	</footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/menu.js"></script>
  </body>
</html>