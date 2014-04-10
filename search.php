<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
</head>
 
<body>
	<?php
	require_once 'BuscadorFullText.php';
	$obj2  = new BuscadorFullText($_POST['buscar'], 'buscador');
	?>
	<form id="form1" name="form1" method="post" action="">
		<input type="text" name="buscar" id="buscar" value="<?php echo $obj2->getValue('buscar'); ?>" />
			<select name="categoria" id="categoria">
		  		<option value="Noticias">Noticias</option>
		  		<option value="Reportes">Reportes</option>
		  		<option value="Revisiones">Revisiones</option>
	    	</select>
	  	<input type="submit" name="enviar" id="enviar" value="Enviar" />
    </form>
    <?php
	$obj2->addCamposFullText('titulo, desarrollo');
	$obj2->addCamposResultado(array('idNoticia', 'titulo', 'desarrollo'));
	$obj2->addParametrosVariables('categoria' , '=');
	$consulta	= $obj2->getConsultaMysql();
	echo 'Consulta:' . sprintf($consulta, 0,10);
	?>
</body>
</html>