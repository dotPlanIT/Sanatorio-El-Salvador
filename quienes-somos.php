<!DOCTYPE html>
<html lang="esp">
  <head>
    <meta charset="utf-8">
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!-- Menu responsive -->
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link href="css/styles-480.css" rel="stylesheet">
	<link href="css/styles-600.css" rel="stylesheet">
	<link href="css/styles-768.css" rel="stylesheet">
  </head>
  <body>
	<!--<div class="superior">[Menú]</div>-->
	<div class="cuerpo">
		<div class="cabecera">
			<?PHP include("/layouts/header.php"); ?>
		</div>
		<div class="container">
			<?PHP include("/layouts/menu.php"); ?>
		</div>
		<div class="agenda">[Columna derecha]</div>
		<div class="contenido">[Contenido]
			<div id="contenedor">
				<div class="bloque">[Texto/Imágenes]</div>
				<div class="bloque">[Texto/Imágenes]</div>
				<div class="bloque">[Texto/Imágenes]</div>
				<div class="bloque">[Texto/Imágenes]</div>
				<div class="bloque">[Texto/Imágenes]</div>
			</div>
		</div>
	</div>
	<footer class="footer">
		<div class="container">
			<div id="contenedor">
				<?PHP include("/layouts/footer-first.php"); ?>
				<?PHP include("/layouts/footer-second.php"); ?>
				<?PHP include("/layouts/footer-third.php"); ?>
			</div>
		</div><!-- /.container -->
		<div class="clear"></div>
		<div class="copyright">
			<?PHP include("/layouts/copyright.php"); ?>
		</div><!-- /.copyright -->
	</footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/menu.js"></script>
  </body>
</html>