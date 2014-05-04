<!DOCTYPE html>
<?PHP 
	require_once("./classes/mysqlclass.php");
	$db = new MySQL();
	if(isset($_GET['evento'])){
		$eventid = $_GET['evento'];
		$consulta = $db->consulta("SELECT * FROM events where status = 1 and id=".$eventid);
		if($db->num_rows($consulta)>0){
		  $contenido = $db->fetch_array($consulta);
		 }else{
			$messageEmpty = "No se encontro ning&uacute;n Evento";
			$contenido['title'] = "Eventos";
		}
	}else{
		$messageEmpty = "No se encontro ning&uacute;n Evento";
		$contenido['title'] = "Eventos";
	}
?>
<html lang="esp">
  <head>
    <title>Sanatorio del Salvador | <?PHP echo $contenido['title'];?></title>
	<?PHP include("./layouts/common-header.php"); ?>
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
		<div class="agenda"><?PHP include("./blocks/cta-lateral.php"); ?></div>
		<div class="contenido">
			<div class="breadcrumb">
				<a href="./index.php"><i class="icon-home"></i></a> :: 
				<a href="./eventos.php">Eventos</a>
			</div>
			<div id="contenedor">
				<div class="pageTitle">Eventos</span></div>
				<div class="actionsBody">
					<button type="button" onclick="agrandar('.pageBody')">A+</button>
					<button type="button" onclick="achicar('.pageBody')">A-</button>
				</div>
				<?php if($db->num_rows($consulta)>0){
					$date = date_create($contenido['date_from']); ?>
				<div class="bookmark" >
					<abbr title="<?PHP echo $date->format('M');?>"><?PHP echo $date->format('M');?></abbr> <?PHP echo $date->format('d');?><sup></sup> <abbr><?PHP echo $date->format('Y');?></abbr>
					<sub><?PHP echo $date->format('H:m');?></sub>
				</div>
				<div class="eventData">
					<div class="eventTitle"><?PHP echo $contenido['title'];?></div>
					<div class="eventPlace"><?PHP echo $contenido['place'];?></div>
					<div class="eventDestinations"><?PHP echo $contenido['receivers'];?></div>
				</div>
				<div class="eventHeaderRight">
					<img src="http://localhost/cms/app/webroot/files/events/<?PHP echo $contenido['image_dir'];?>/event_<?PHP echo $contenido['image'];?>" />
				</div>
				<div class="clear"></div>
				<div class="pageBody">
					<?PHP echo $contenido['body'];?>
				</div>
				<?php }else {
					echo $messageEmpty;
					}
				?>
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
		<?PHP include("./blocks/ultimas-noticias-bottom.php"); ?>
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