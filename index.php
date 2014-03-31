<!DOCTYPE html>
<html lang="esp">
  <head>
    <meta charset="utf-8">
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
	<script src="https://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
	    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
	<script src="js/dotplan.js" type="text/javascript"></script>
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
	
	<link rel="stylesheet" href="css/themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/themes/light/light.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/themes/dark/dark.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/themes/bar/bar.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/slider.css" type="text/css" media="screen" />
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
		<div class="contenido">
			<div id="contenedor">
				<div class="slider-wrapper theme-default">
					<div id="slider" class="nivoSlider">
						<img src="img/sliders/toystory.jpg" data-thumb="img/sliders/toystory.jpg" alt="" title="#htmlcaption"/>
						<!--<a href="http://dev7studios.com"><img src="img/sliders/up.jpg" data-thumb="img/sliders/up.jpg" alt="" title="This is an example of a caption" /></a>
						<img src="img/sliders/walle.jpg" data-thumb="img/sliders/walle.jpg" alt="" data-transition="slideInLeft" title="#htmlcaption" />
						<img src="img/sliders/nemo.jpg" data-thumb="img/sliders/nemo.jpg" alt="" title="#htmlcaption" />-->
					</div>
					<div id="htmlcaption" class="nivo-html-caption">
						<strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>. 
					</div>
				</div>
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
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/menu.js"></script>
    <script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
  </body>
</html>