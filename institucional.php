<!DOCTYPE html>
<?PHP 
	require_once("./classes/mysqlclass.php");
	$db = new MySQL();
	$consulta = $db->consulta("SELECT * FROM institutionals where id=9");
	$error404 = false;
	$title = "Institucionales";
	if(isset($_GET['id'])){
		$consulta = $db->consulta("SELECT * FROM institutionals where id=".$_GET['id']);
		if($db->num_rows($consulta)>0){
		  $contenido = $db->fetch_array($consulta);
		  $title = $contenido['title'];
		 }
		 else{
			$title = "Institucionales";
			$error404 = true;
		 }
	 }else{
		$title = "Institucionales";
		$error404 = true;
	 }
?>
<html lang="esp">
  <head>
    <title>Sanatorio del Salvador | <?PHP echo $title;?> </title>
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
				<a href="./nosotros.php">Quienes Somos :: Nosotros</a>
			</div>
			<div id="contenedor">
				<div class="pageTitle">Nosotros</div>
				<div class="actionsBody">
					<button type="button" onclick="agrandar('.pageBody')">A+</button>
					<button type="button" onclick="achicar('.pageBody')">A-</button>
				</div>
				<div class="pageBody">
					<?PHP echo $contenido['body'];?>
				</div>
			</div>
			<?php } else{
				  include("./layouts/error-404.php"); ?>
				  <div class="clear"></div>
			<?php } ?>
		</div>
		<?PHP include("./blocks/addThis-button.php"); ?>
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