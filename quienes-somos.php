<!DOCTYPE html>
<?PHP 
	include("/classes/mysqlclass.php");
	$db = new MySQL();
	$consulta = $db->consulta("SELECT * FROM institutionals where id=9");
	if($db->num_rows($consulta)>0){
	  $contenido = $db->fetch_array($consulta);
	 }
?>
<html lang="esp">
  <head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
	<script src="https://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
	<script src="js/dotplan.js" type="text/javascript"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sanatorio del Salvador | <?PHP echo $contenido['title'];?></title>

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
		<div class="contenido">
			<div class="breadcrumb">
				<a href="/quienes-somos.php"><i class="icon-home"></i></a> > 
				<a href="/quienes-somos.php">Quienes Somos</a>
			</div>
			<div id="contenedor">
				<div class="pageTitle">Quienes <span>Somos</span></div>
				<div class="actionsBody">
					<button type="button" onclick="agrandar('.pageBody')">A+</button>
					<button type="button" onclick="achicar('.pageBody')">A-</button>
				</div>
				<div class="pageBody">
					<?PHP echo $contenido['body'];?>
				</div>
			</div>
		</div>
		<!-- AddThis Button BEGIN -->
		<div class="addthis_toolbox addthis_default_style">
			<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
			<a class="addthis_button_tweet"></a>
			<a class="addthis_button_pinterest_pinit" pi:pinit:layout="horizontal"></a>
			<a class="addthis_counter addthis_pill_style"></a>
		</div>
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-533976252b0cdbc3"></script>
		<!-- AddThis Button END -->
		<hr>
		<?PHP include("/blocks/ultimas-noticias-bottom.php"); ?>
		<div class="clear"></div>
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