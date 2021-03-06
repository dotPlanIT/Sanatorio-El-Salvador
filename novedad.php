<!DOCTYPE html>
<?PHP 
	require_once("./classes/mysqlclass.php");
	$db = new MySQL();
	$consulta = $db->consulta("SELECT n.*, tn.title as tipo, DATE_FORMAT(n.date,'%d-%m-%Y') as fecha FROM notices n left join type_notices tn on n.type_notice_id = tn.id where n.status = 1 and n.id=".$_GET['id']);
	$error404 = false;	
	if($db->num_rows($consulta)>0){
		$contenido = $db->fetch_array($consulta);
	 }else{
		$error404 = true;
	 }
?>
<html lang="esp">
  <head>
    <title>Sanatorio del Salvador | Novedades</title>
	<script type="text/javascript" src="js/paginador.js"></script>
	<?PHP include("./layouts/common-header.php"); ?>
  </head>
  <body>
	<!--<div class="superior">[Men�]</div>-->
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
			<?php if($db->num_rows($consulta)>0){?>
				<div class="breadcrumb">
					<a href="./index.php"><i class="icon-home"></i></a> :: 
					<a href="./novedades.php">Novedades</a> ::
					<a href="./novedades.php?type=<?PHP echo $contenido['type_notice_id'];?>"><?PHP echo $contenido['tipo'];?></a> ::				
					<a href="./novedad.php?id=<?PHP echo $contenido['id'];?>"><?PHP echo $contenido['title'];?></a>
				</div>
				<div id="contenedor">
					<div class="pageTitle">Novedades</div>
					<div class="actionsBody">
						<button type="button" onclick="agrandar('.pageBody')">A+</button>
						<button type="button" onclick="achicar('.pageBody')">A-</button>
					</div>
					<div class="noticeHeaderLeft">
						<div class="contetTypeNotice">
							<span class="typeNotice"><?PHP echo $contenido['tipo'];?></span>
							<span class="dateNotice"><?PHP echo $contenido['fecha'];?></span>
						</div>
						<div class="noticeTitle"><?PHP echo $contenido['title'];?></div>
						<div class="noticeDrop"><?PHP echo strip_tags($contenido['lower']);?></div>
					</div>
					<div class="noticeHeaderRight">
						<div class="noticeImage"><img src="http://localhost/cms/app/webroot/files/notices/<?PHP echo $contenido['image_dir'];?>/notice_<?PHP echo $contenido['image'];?>"/></div>
					</div>
					<div class="pageBody">
						<?PHP echo $contenido['body'];?>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			<?php }else{
			  echo "ver de poner algo para cuando no hay nada";
			}?>
			<?php } else{
				  include("./layouts/error-404.php"); ?>
				  <div class="clear"></div>
			<?php } ?>
		</div>
	<hr>
	<?PHP include("./blocks/ultimas-noticias-bottom.php"); ?>	
	</div>
	<div class="clear"></div>
	
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