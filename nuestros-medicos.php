<!DOCTYPE html>
<?PHP 
	require_once("./classes/mysqlclass.php");
	$db = new MySQL();
?>
<html lang="esp">
  <head>
    <title>Sanatorio del Salvador | Nuestros M&eacute;dicos</title>
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
			<div class="breadcrumb">
				<a href="./index.php"><i class="icon-home"></i></a> :: 
				<a href="./especialidades.php">Nuestros M&eacute;dicos</a> 
			</div>
			<div id="contenedor">
				<div class="pageTitle">Nuestros M&eacute;dicos</div>
				<?php if($db->num_rows($consulta)>0){?>
					<div id="tabs">
						<div class="staffLetters">
							<ul>
							<?php foreach (range('A' , 'Z' ) as $letter ){ ?>
								<li><a href="./nuestros-medicos.php#<?php echo $letter; ?>"><?php echo $letter; ?></a></li>
							<?php } ?>
							</ul>
						</div>
						<div class="contentStaff">
							<?php foreach (range('A' , 'Z' ) as $letter ){ ?>
								<div id="<?php echo $letter; ?>">
								  <?php $consulta = $db->consulta("SELECT p.*, s.name as Especialidad FROM providers p, specialties s where p.specialty_id = s.id and p.status= 1 and p.name Like '".$letter."%'");
										if($db->num_rows($consulta)>0){ ?>
										<div class="providerABCNameTop">Nombre</div>
										<div class="providerSpecialityTop">Especialidad</div>
										<?php while($MostrarFila=mysql_fetch_array($consulta)){
												 $cv = "";
												 if($MostrarFila['cv'] != ""){
													$cv = '<a href="./medico.php?medico='.$MostrarFila['id'].'"> (Ver CV)</a>';
												 }?>
											<div class="providerABCName"><?php echo $MostrarFila['name']; ?> <?php echo $cv;?></div>
											<div class="providerSpeciality"><a href="especialidad.php?especialidad=<?php echo $MostrarFila['specialty_id']; ?>"><?php echo $MostrarFila['Especialidad']; ?></a></div>
									<?php }
										} ?>
								</div>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="clear"></div>
		<hr>
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
<!--<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">-->
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>	
	    <script>
$( document ).ready(function() {
  $("#tabs").tabs();
});
  </script>
  </body>
</html>