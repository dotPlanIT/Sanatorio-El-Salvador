<!DOCTYPE html>
<?PHP 
	require_once("./classes/mysqlclass.php");
	$db = new MySQL();
	$error404 = false;
	if(isset($_GET['medico'])){
		$consulta = $db->consulta("SELECT n.*, s.name as speciality FROM providers n left join specialties s on n.specialty_id = s.id where n.status = 1 and n.id=".$_GET['medico']);
		if($db->num_rows($consulta)>0){
		  $contenido = $db->fetch_array($consulta);
		 } else{
			$title = "Institucionales";
			$error404 = true;
		 }
	 }else{
		$error404 = true;
	 }
?>
<html lang="esp">
  <head>
    <title>Sanatorio del Salvador | M&eacute;dicos</title>
	<script type="text/javascript" src="js/paginador.js"></script>
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
		<?php if($error404 == false){
			if($db->num_rows($consulta)>0){?>
				<div class="breadcrumb">
					<a href="./index.php"><i class="icon-home"></i></a> :: 
					<a href="./nuestros-medicos.php">Nuestros M&eacute;dicos</a> ::
					<a href="./medico.php?medico=<?PHP echo $contenido['id'];?>"><?PHP echo $contenido['name'];?></a>				
				</div>
				<div id="contenedor">
					<div class="pageTitle">Nuestros M&eacute;dicos</div>
					<div class="actionsBody">
						<button type="button" onclick="agrandar('.pageBody')">A+</button>
						<button type="button" onclick="achicar('.pageBody')">A-</button>
					</div>
					<div class="noticeHeaderLeft">
						<div class="contetTypeProvider">
							<span class="specialityProvider"><?PHP echo $contenido['speciality'];?></span>
							<span class="enrollmentProvider">Matricula: <?PHP echo $contenido['enrollment'];?></span>
						</div>
						<div class="noticeTitle"><?PHP echo $contenido['designation'];?> <?PHP echo $contenido['name'];?></div>
						<!--<div class="providerEnrollment">Matricula: <?PHP echo $contenido['enrollment'];?></div>-->
					</div>
					<div class="noticeHeaderRight">
						<div class="imgProvider"><img src="http://localhost/cms/app/webroot/files/providers/<?PHP echo $contenido['photo_dir'];?>/provider_<?PHP echo $contenido['photo'];?>"/></div>
					</div>
					<div class="pageBody">
						<?PHP echo $contenido['cv'];?>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
				<?php }else{
				  echo "ver de poner algo para cuando no hay nada";
				}
			}else{
				  include("./layouts/error-404.php"); ?>
				  <div class="clear"></div>
			<?php } ?>
		</div>
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