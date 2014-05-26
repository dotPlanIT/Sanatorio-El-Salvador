<!DOCTYPE html>
<?PHP 
	require_once("./classes/mysqlclass.php");
	$db = new MySQL();
	$error404 = false;
	if(isset($_GET['evento'])){
		$eventid = $_GET['evento'];
		$consulta = $db->consulta("SELECT * FROM events where status = 1 and id=".$eventid);
		if($db->num_rows($consulta)>0){
		  $contenido = $db->fetch_array($consulta);
		 }else{
			$error404 = true;
			$messageEmpty = "No se encontro ning&uacute;n Evento";
			$contenido['title'] = "Eventos";
		}
	}else{
		$error404 = true;
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
		<div class="agenda">
			<?PHP include("./blocks/cta-lateral.php"); ?>
			<?PHP require_once("./blocks/agenda.php"); ?>
			<?PHP require_once("./blocks/editors.php"); ?>
		</div>
		<div class="contenido">
		<?php if($error404 == false){ ?>
			<div class="breadcrumb">
				<a href="./index.php"><i class="icon-home"></i></a> :: 
				<a href="./eventos.php">Eventos</a> ::
				<a href="./evento.php?evento=<?PHP echo $contenido['id'];?>"><?PHP echo $contenido['title'];?></a>
			</div>
			<div id="contenedor">
				<div class="pageTitle">Eventos</div>
				<div class="actionsBody">
					<button type="button" onclick="agrandar('.pageBody')">A+</button>
					<button type="button" onclick="achicar('.pageBody')">A-</button>
				</div>
				<?php $consulta = $db->consulta("SELECT * FROM events where status = 1 and id=".$eventid);
				if($db->num_rows($consulta)>0){
					$date = date_create($contenido['date_from']); ?>
				<div class="eventHeader">	
					<div class="bookmark" >
						<abbr title="<?PHP echo $date->format('M');?>"><?PHP echo $date->format('M');?></abbr> <?PHP echo $date->format('d');?><sup></sup> <abbr><?PHP echo $date->format('Y');?></abbr>
						<sub><?PHP echo $date->format('H:m');?></sub>
					</div>
					<div class="eventData">
						<div class="eventTitle"><?PHP echo $contenido['title'];?></div>
						<div class="eventPlace"><b>Lugar: </b>&nbsp; <?PHP echo $contenido['place'];?></div>
						<div class="eventDestinations"><b>Destinado a:</b>&nbsp; <?PHP echo $contenido['receivers'];?></div>
					</div>
				</div>
				<?php if($contenido['image_dir'] != ""){ ?>
					<div class="eventHeaderRight">
						<img src="http://localhost/cms/app/webroot/files/events/<?PHP echo $contenido['image_dir'];?>/event_<?PHP echo $contenido['image'];?>" class="double-border"/>
					</div>
				<?php } ?>
				<div class="pageBody">
					<?PHP echo $contenido['body'];?>
				</div>
				<?php }else {
					echo $messageEmpty;
					}
				?>
			</div>
			<?php } else{
				  include("./layouts/error-404.php"); ?>
				  <div class="clear"></div>
			<?php } ?>
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
		<div class="clear"></div>
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