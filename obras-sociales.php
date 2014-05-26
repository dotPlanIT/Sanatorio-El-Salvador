<!DOCTYPE html>
<?PHP 
	require_once("./classes/mysqlclass.php");
	$db = new MySQL();
?>
<html lang="esp">
  <head>
    <title>Sanatorio del Salvador | Obras Sociales</title>
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
			<?PHP include("./blocks/logos-mutuales.php"); ?>
		</div>
		<div class="contenido">
			<div class="breadcrumb">
				<a href="./index.php"><i class="icon-home"></i></a> :: 
				<a href="./obras-sociales.php">Obras Sociales</a>
			</div>
			<div id="contenedor">
				<div class="pageTitle">Obras <span>Sociales</span></div>
				<div class="prepagas">
				<?php $consulta = $db->consulta("SELECT * FROM health_insurances where status= 1 and type = 1 order by name asc");
						if($db->num_rows($consulta)>0){?>
							<div class="specialityLetter">PREPAGAS</div>
							<?php while($MostrarFila=mysql_fetch_array($consulta)){?>
									<div class="healthName"><?php echo $MostrarFila['name']; ?></div>
							<?php } ?>
				<?php	} ?>
				</div>
				<div class="obrasSociales">
				<?php $consulta = $db->consulta("SELECT * FROM health_insurances where status= 1 and type = 2 order by name asc");
						if($db->num_rows($consulta)>0){?>
							<div class="specialityLetter">OBRAS SOCIALES</div>
							<?php while($MostrarFila=mysql_fetch_array($consulta)){?>
									<div class="healthName"><?php echo $MostrarFila['name']; ?></div>
							<?php } ?>
				<?php	} ?>				
				</div>
				<div class="art">
				<?php $consulta = $db->consulta("SELECT * FROM health_insurances where status= 1 and type = 3 order by name asc");
						if($db->num_rows($consulta)>0){?>
							<div class="specialityLetter">ART</div>
							<?php while($MostrarFila=mysql_fetch_array($consulta)){?>
									<div class="healthName"><?php echo $MostrarFila['name']; ?></div>
							<?php } ?>
				<?php	} ?>				
				</div>				
			</div>
			<div class="clear"></div>
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
		<hr>
		<div class="clear"></div>
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