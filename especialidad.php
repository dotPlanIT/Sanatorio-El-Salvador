<!DOCTYPE html>
<?PHP 
	require_once("./classes/mysqlclass.php");
	$db = new MySQL();
	$error404 = false;
	$title = "Especialidades";
	if(isset($_GET['especialidad'])){
		$consulta = $db->consulta("SELECT * FROM specialties where id=".$_GET['especialidad']);
		if($db->num_rows($consulta)>0){
		  $contenido = $db->fetch_array($consulta);
		 }else{
			$title = "Especialidades";
			$error404 = true;
		 }
	 }else{
		$title = "Especialidades";
		$error404 = true;
	 }
?>
<html lang="esp">
  <head>
    <title>Sanatorio del Salvador | Especialidades</title>
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
				<a href="./especialidades.php">Servicios :: Especialidades</a> 
				<?php if($db->num_rows($consulta)>0){?>
				:: <a href="./especialidad.php?especialidad=<?PHP echo $contenido['id'];?>"><?PHP echo $contenido['name'];?></a> 
				<?php } ?>
			</div>
			<div id="contenedor">
				<div class="pageTitle">Servicios - Especialidades</div>
				<?php if($db->num_rows($consulta)>0){?>
					<div id="tabs">
					<div class="specialityHeader">
						<div class="specialityTitle"><?PHP echo $contenido['name'];?></div>
						<div class="specialityHeaderLeft">
						  <ul>
							<?php if($contenido['id'] !=""){ ?> 
							<li><a href="http://localhost/Sanatorio-El-Salvador/especialidad.php?especialidad=<?PHP echo $contenido['id'];?>#General">Staff de Profesionales M&eacute;dicos</a></li>
							<?php } ?>   
							<?php if($contenido['description'] !=""){ ?> 
							<li><a href="http://localhost/Sanatorio-El-Salvador/especialidad.php?especialidad=<?PHP echo $contenido['id'];?>#Description">Descripci&oacute;n</a></li>
							<?php } ?>   
							<?php if($contenido['sub_specialties'] !=""){ ?> 
							<li><a href="http://localhost/Sanatorio-El-Salvador/especialidad.php?especialidad=<?PHP echo $contenido['id'];?>#sub_specialties">Sub-Especialidades</a></li>
							<?php } ?>  
							<?php if($contenido['practices'] !=""){ ?> 
							<li><a href="http://localhost/Sanatorio-El-Salvador/especialidad.php?especialidad=<?PHP echo $contenido['id'];?>#Practices">Pr&aacute;cticas y Procedimientos</a></li>
							<?php } ?>   
							<?php if($contenido['infrastructure'] !=""){ ?> 
							<li><a href="http://localhost/Sanatorio-El-Salvador/especialidad.php?especialidad=<?PHP echo $contenido['id'];?>#Infrastructure">Infraestructura / Equipamiento</a></li>
							<?php } ?>  
							<?php if($contenido['other'] !=""){ ?> 
							<li><a href="http://localhost/Sanatorio-El-Salvador/especialidad.php?especialidad=<?PHP echo $contenido['id'];?>#Other">Otros</a></li>
							<?php } ?>  
						  </ul>
						</div>
						<div class="specialityHeaderRight">
							<img src="http://localhost/cms/app/webroot/files/specialties/<?PHP echo $contenido['photo_dir'];?>/speciality_<?PHP echo $contenido['photo'];?>" onerror="this.onerror=null;this.src='./img/default/logo-speciality.png';"/>
						</div>
					</div>
					<div class="contentSpeciality">
						<?php if($contenido['id'] !=""){ ?> 
						<div id="General">
							<div class="titleSpeciality">Staff de Profesionales M&eacute;dicos</div>
							<?php 
								//Consulto por el jefe
								$consulta = $db->consulta("SELECT * FROM providers where specialty_id=".$_GET['especialidad']. " And job = 2");
								if($db->num_rows($consulta)>0){
									  $provider = $db->fetch_array($consulta);
									  $cv = "";
									  if($provider['cv'] != ""){
									   $cv = '<a href="./medico.php?medico='.$provider['id'].'"> (Ver CV)</a>';
									  }?>
									  <div class="jefeMedico"><b><?PHP echo $provider['name'];?></b><?php echo $cv;?></div>
									  <?php 
								} 
								// Consulto por los medicos
								$consulta = $db->consulta("SELECT * FROM providers where specialty_id=".$_GET['especialidad']. " And job = 1 order by name asc");
								if($db->num_rows($consulta)>0){
								    echo '<div class="equipoMedico">Equipo M&eacute;dico:</div>';
									while($MostrarFila=mysql_fetch_array($consulta)){
									 $cv = "";
									 if($MostrarFila['cv'] != ""){
										$class="providerName";
										$cv = '<a href="./medico.php?medico='.$provider['id'].'"> (Ver CV)</a>';
									 } ?>
										<div class="providerSinCV"><?php echo $MostrarFila['name']; ?><?php echo $cv;?></div>
									<?php  
									}
								} 								
							 ?>
						</div>
						<?php } ?>  
						<?php if($contenido['description'] !=""){ ?> 
					  	<div id="Description">
							<div class="titleSpeciality">Descripci&oacute;n</div>
							<?PHP echo $contenido['description'];?>
						</div>
						<?php } ?> 
						<?php if($contenido['sub_specialties'] !=""){ ?> 
						<div id="sub_specialties">
							<div class="titleSpeciality">Sub-Especialidades</div>
							<?PHP echo $contenido['sub_specialties'];?>
						</div>
						<?php } ?>  
						<?php if($contenido['practices'] !=""){ ?> 
						<div id="Practices">
							<div class="titleSpeciality">Pr&aacute;cticas y Procedimientos</div>
							<?PHP echo $contenido['practices'];?>
						</div>
						<?php } ?>  
						<?php if($contenido['infrastructure'] !=""){ ?> 
						<div id="Infrastructure">
							<div class="titleSpeciality">Infraestructura / Equipamiento</div>
							<?PHP echo $contenido['infrastructure'];?>
						</div>	
						<?php } ?>  
						<?php if($contenido['other'] !=""){ ?> 						
						<div id="Other">
							<div class="titleSpeciality">Otros</div>
							<?PHP echo $contenido['other'];?>
						</div>
						<?php } ?> 
					</div>
					</div>
				<?php } ?>
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