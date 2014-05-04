<!DOCTYPE html>
<?PHP 
	require_once("./classes/mysqlclass.php");
	$db = new MySQL();
	if(isset($_GET['especialidad'])){
		$consulta = $db->consulta("SELECT * FROM specialties where id=".$_GET['especialidad']);
		if($db->num_rows($consulta)>0){
		  $contenido = $db->fetch_array($consulta);
		 }else{
			$messageEmpty = "No se encontro ning&uacute;na especialidad";
			$contenido['title'] = "Eventos";
		}
	}else{
		$messageEmpty = "No se encontro ning&uacute;na especialidad";
		$contenido['title'] = "Especialidades";
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
							<?php if($contenido['id'] !=""){ ?> 
							<li><a href="http://localhost/Sanatorio-El-Salvador/especialidad.php?especialidad=<?PHP echo $contenido['id'];?>#Description">Descripci&oacute;n</a></li>
							<?php } ?>   
							<?php if($contenido['id'] !=""){ ?> 
							<li><a href="http://localhost/Sanatorio-El-Salvador/especialidad.php?especialidad=<?PHP echo $contenido['id'];?>#sub_specialties">Sub-Especialidades</a></li>
							<?php } ?>  
							<?php if($contenido['id'] !=""){ ?> 
							<li><a href="http://localhost/Sanatorio-El-Salvador/especialidad.php?especialidad=<?PHP echo $contenido['id'];?>#Practices">Pr&aacute;cticas y Procedimientos</a></li>
							<?php } ?>   
							<?php if($contenido['id'] !=""){ ?> 
							<li><a href="http://localhost/Sanatorio-El-Salvador/especialidad.php?especialidad=<?PHP echo $contenido['id'];?>#Infrastructure">Infraestructura / Equipamiento</a></li>
							<?php } ?>  
							<?php if($contenido['id'] !=""){ ?> 
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
						</div>
						<?php } ?>  
						<?php if($contenido['id'] !=""){ ?> 
					  	<div id="Description">
							<div class="titleSpeciality">Descripci&oacute;n</div>
							<?PHP echo $contenido['description'];?>
						</div>
						<?php } ?> 
						<?php if($contenido['id'] !=""){ ?> 
						<div id="sub_specialties">
							<div class="titleSpeciality">Sub-Especialidades</div>
							<?PHP echo $contenido['sub_specialties'];?>
						</div>
						<?php } ?>  
						<?php if($contenido['id'] !=""){ ?> 
						<div id="Practices">
							<div class="titleSpeciality">Pr&aacute;cticas y Procedimientos</div>
							<?PHP echo $contenido['practices'];?>
						</div>
						<?php } ?>  
						<?php if($contenido['id'] !=""){ ?> 
						<div id="Infrastructure">
							<div class="titleSpeciality">Infraestructura / Equipamiento</div>
							<?PHP echo $contenido['infrastructure'];?>
						</div>	
						<?php } ?>  
						<?php if($contenido['id'] !=""){ ?> 						
						<div id="Other">
							<div class="titleSpeciality">Otros</div>
							<?PHP echo $contenido['other'];?>
						</div>
						<?php } ?> 
					</div>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="clear"></div>
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