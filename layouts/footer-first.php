<script>
function validarEmail(formulario) {
	email = formulario.mail.value;
	expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(email!=""){
		if ( !expr.test(email) ){
			document.getElementById('formMessage').innerHTML="Error: La dirección de correo " + email + " es incorrecta.";
			return false;
		}else{
			return true;
		}
	}else{
		document.getElementById('formMessage').innerHTML="Ingrese una direcciön de correo.";
		return false;
	}
    return false;
}
</script>
<div class="footer-first">
	<div id="modal" class="footerSuscription">
		<span class="footerSuscriptionTitle">Suscribite a nuestro<br/><b>bolet&iacute;n oficial</b></span>
		<div class="paddingVertical2"><img src="img/footer/salvador-noticias.png" /></div>
		<span id="formMessage"></span>
		<form action="http://gbactivo.net/pub/suscr.aspx" method="post" onSubmit = "return validarEmail(this)" name="boletin-oficial" id="boletin-oficial" class="paddingVertical2">
			<input type="hidden" name="CodCuenta" value="QSK3485" />
			<input type="hidden" name="CodGrupo" value="MVF35972" />
			<input type="hidden" name="UrlConfirmacion" value="www.sanatoriodelsalvador.com" />
			<span class="paddingVertical2">Ingres&aacute; tu direcci&oacute;n de correo electr&oacute;nico</span>
			<input name="mail" type="text" /><input type='submit' name="Submit"  value="Enviar" class="footerNewsletterSubmit" />
		</form>
		<span class="paddingVertical2 font15">Mir&aacute; nuestras ediciones <a href="./salvador-noticias.php">aqu&iacute;</a></span>
		<div class="overlay"></div>
	</div>
	<div class="footerCV">
		<img src="img/footer/footer-CV.png" /><span class="paddingVertical2 font15">Si quer&eacute;s trabajar con nosotros, <br/>ingres&aacute; tu CV <a href="./rrhh.php">aqu&iacute;</a></span>
	</div>
</div>