<!DOCTYPE html>
<?PHP 
	require_once("./classes/mysqlclass.php");
	$db = new MySQL();
	$error404 = false;
	$title = "Institucionales";
	if(isset($_GET['prensa'])){
		$editorid = $_GET['prensa'];
		$consulta = $db->consulta("select n.*, tn.id as typeId, tn.title as type, tn.photo as photo, tn.photo_dir as photo_dir from editors n left join type_editors tn on n.type_editor_id = tn.id where n.status=1 and n.id=".$editorid );
		if($db->num_rows($consulta)>0){
		  $contenido = $db->fetch_array($consulta);
		 }else{
			$messageEmpty = "No se encontro ning&uacute;n art&iacute;culo de prensa";
			$contenido['title'] = "Prensa";
			$error404 = true;
		}
	}else{
		$messageEmpty = "No se encontro ning&uacute;n art&iacute;culo de prensa";
		$contenido['title'] = "Prensa";
		$error404 = true;
	}
?>
<html lang="esp">
  <head>
    <title>Sanatorio del Salvador | Prensa</title>
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
				<a href="./listado-prensa.php">Prensas</a> :: 
				<a href="./prensa.php?prensa=<?PHP echo $contenido['id'];?>"><?PHP echo $contenido['title'];?></a>
			</div>
			<div id="contenedor">
				<div class="pageTitle">Prensa</div>
				<div class="actionsBody">
					<button type="button" onclick="agrandar('.pageBody')">A+</button>
					<button type="button" onclick="achicar('.pageBody')">A-</button>
				</div>
				<?php if($db->num_rows($consulta)>0){ ?>
				<div class="eventHeader">	
					 <img src="http://localhost/cms/app/webroot/files/typeeditors/<?PHP echo $contenido['photo_dir'];?>/typeeditor_<?PHP echo $contenido['photo'];?>" />
					 <div class="editor">
						 <span class="editorTitle editorList"><?PHP echo $contenido['title'];?></span></br>
						 <span class="editorMedio">Medio: <!--de publicaci&oacute;n:--> </span><?PHP echo $contenido['means'];?></br>
						 <span class="typeEditor">Tipo de medio: </span><a href="listado-prensa.php?type=<?PHP echo $contenido['typeId'];?>"><?PHP echo $contenido['type'];?></a></br>
						 <span class="dateEditor">Fecha de publicaci&oacute;n: </span><?PHP echo $date->format('d/m/Y');?></br>
						 <span class="linkEditor"><a target="_blank" href="<?PHP echo $contenido['link'];?>">Hace clic para ver el articulo en <?PHP echo $contenido['means'];?></a></span>
					</div>
				</div>
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
		<div class="clear"></div>
		<hr>
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