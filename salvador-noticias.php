<!DOCTYPE html>
<?PHP 
	include("./classes/mysqlclass.php");
	$db = new MySQL();
	$consulta = $db->consulta("SELECT * FROM institutionals where id=10");
	if($db->num_rows($consulta)>0){
		$contenido = $db->fetch_array($consulta); 
	}
?>
<html lang="esp">
  <head>
    <title>Sanatorio del Salvador | <?PHP echo $contenido['title'];?></title>
	<?PHP include("./layouts/common-header.php"); ?>
	<script type="text/javascript" src="./js/paginador.js"></script>
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
				<a href="./salvador-noticias.php"><?PHP echo $contenido['title'];?></a>
			</div>
			<div id="contenedor">
				<div class="pageTitle"><?PHP echo $contenido['title'];?></div>
				<div class="pageBody"><?PHP echo $contenido['body'];?></div>
				<div id="boletinesAjax">
					<?php include('./pagers/pager-salvador-noticias.php')?>
				</div>
			</div>
			<div class="clear"></div>			
		</div>
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