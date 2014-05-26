<!DOCTYPE html>
<?PHP 
	require_once("./classes/mysqlclass.php");
	$db = new MySQL();
?>
<html lang="esp">
  <head>
    <title>Sanatorio del Salvador | Pr&oacute;ximos Eventos</title>
	<?PHP include("./layouts/common-header.php"); ?>
	<script type="text/javascript" src="js/paginador.js"></script>
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
			<?PHP require_once("./blocks/editors.php"); ?>
		</div>
		<div class="contenido">
			<div class="breadcrumb">
				<a href="./index.php"><i class="icon-home"></i></a> :: 
				<a href="./eventos.php">Pr&oacute;ximos Eventos</a>
			</div>
			<div id="contenedor">
				<div class="pageTitle">Pr&oacute;ximos Eventos</span></div>
				<div class="proximosEventos">
					<?PHP $consulta = $db->consulta("SELECT * FROM events where status=1 and date_from > curdate() order by date_from asc");					
					if($db->num_rows($consulta)>0){
						while($MostrarFila=mysql_fetch_array($consulta)){
						$date = date_create($MostrarFila['date_from']);?>
						<a class="linkEvent" href="./evento.php?evento=<?PHP echo $MostrarFila['id'];?>">
						<div class="eventHeaderList">	
							<div class="bookmarkList" >
								<abbr title="<?PHP echo $date->format('M');?>"><?PHP echo $date->format('M');?></abbr> <?PHP echo $date->format('d');?><sup></sup> <abbr><?PHP echo $date->format('Y');?></abbr>
								<sub><?PHP echo $date->format('H:m');?></sub>
							</div>
							<div class="eventData">
								<div class="eventTitle"><?PHP echo $MostrarFila['title'];?></div>
								<div class="eventPlace"><b>Lugar: </b>&nbsp; <?PHP echo $MostrarFila['place'];?></div>
								<div class="eventDestinations"><b>Destinado a:</b>&nbsp; <?PHP echo $MostrarFila['receivers'];?></div>
							</div>
						</div>
						</a>
					<?php }
						} ?>
				</div>
				<div class="pageTitle">Eventos Anteriores</span></div>
				<div id="eventosAnterioresAjax">
					<?php include('./pagers/pager-eventos-anteriores.php')?>
				</div>
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