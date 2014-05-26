<?PHP 
include("./classes/mysqlclass.php");
	$db = new MySQL();
	$sliders = $db->consulta("SELECT * FROM sliders where status=1 order by position"); ?>
<!DOCTYPE">
<html lang="esp">
  <head>
    <meta charset="utf-8">
	<?php $baseCMS = "http://sanatoriodelsalvador.com/cms/";?>
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
	<script src="https://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
	    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
	<script src="js/dotplan.js" type="text/javascript"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="./img/icons/favicon.ico" />
    <title>Sanatorio del Salvador | Home</title>

    <!-- Bootstrap -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
	<link href="./css/styles.css" rel="stylesheet">
	
	<!-- Menu responsive -->
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link href="./css/styles-480.css" rel="stylesheet">
	<link href="./css/styles-600.css" rel="stylesheet">
	<link href="./css/styles-768.css" rel="stylesheet">
	
	<link rel="stylesheet" href="./css/themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="./css/themes/light/light.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="./css/themes/dark/dark.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="./css/themes/bar/bar.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="./css/nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="./css/slider.css" type="text/css" media="screen" />
  </head>
  <body>
	<!--<div class="superior">[Menú]</div>-->
	<div class="cuerpo">
		<div class="cabecera">
			<?PHP require_once("./layouts/header.php"); ?>
		</div>
		<div class="container">
			<?PHP require_once("./layouts/menu.php"); ?>
		</div>
		<div class="contenidoHome">
			<div id="contenedor">
				<div class="slider-wrapper theme-default">
					<div id="slider" class="nivoSlider">
						<?PHP 
						if($db->num_rows($sliders)>0){
							while($slider=mysql_fetch_array($sliders)){?>
								<a href="<?PHP echo $slider['url'];?>">
									<img src="http://localhost/cms/app/webroot/files/sliders/<?PHP echo $slider['photo_dir'];?>/<?PHP echo $slider['photo'];?>" title="<?PHP echo $slider['title'];?>"/>
								</a>
						<?PHP }
						}?>					
					</div>
				</div>
				<hr>
					<?PHP require_once("./blocks/cta-home.php"); ?>
				<hr>
				<?PHP require_once("./blocks/ultimas-noticias-home.php"); ?>
				<div class="agenda">
					<?PHP require_once("./blocks/agenda.php"); ?>
				</div>
				<div class="prensa">
					<?PHP require_once("./blocks/editors.php"); ?>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<footer class="footer">
		<div class="container">
			<div id="contenedor">
				<?PHP require_once("./layouts/footer-first.php"); ?>
				<?PHP require_once("./layouts/footer-second.php"); ?>
				<?PHP require_once("./layouts/footer-third.php"); ?>
			</div>
		</div><!-- /.container -->
		<div class="clear"></div>
		<div class="copyright">
			<?PHP require_once("./layouts/copyright.php"); ?>
		</div><!-- /.copyright -->
	</footer>
    <!-- require_once all compiled plugins (below), or require_once individual files as needed -->
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