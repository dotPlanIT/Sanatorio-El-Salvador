﻿<!DOCTYPE html>
<?PHP 
	require_once("./classes/mysqlclass.php");
	$db = new MySQL();
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
				<a class="icon-home" href="./index.php">Home</a> :: 
				<a href="./especialidades.php">Servicios :: Especialidades</a>
			</div>
			<div id="contenedor">
				<div class="pageTitle">Servicios - Especialidades</div>
				<div class="specialitisLeft">
				<?php foreach (range('A' , 'I' ) as $letter ){
						$consulta = $db->consulta("SELECT * FROM specialties where status= 1 and name Like '".$letter."%'");
						if($db->num_rows($consulta)>0){?>
							<div class="specialityLetter"><?php echo $letter; ?></div>
							<?php while($MostrarFila=mysql_fetch_array($consulta)){?>
								<a href="./especialidad.php?especialidad=<?php echo $MostrarFila['id']; ?>"><div class="specialityName"><?php echo $MostrarFila['name']; ?></div></a>
							<?php }
						}
					} ?>
				</div>
				<div class="specialitisRight">
					<?php foreach (range('J' , 'Z' ) as $letter ){
						$consulta = $db->consulta("SELECT * FROM specialties where status= 1 and name Like '".$letter."%'");
						if($db->num_rows($consulta)>0){?>
							<div class="specialityLetter"><?php echo $letter; ?></div>
							<?php while($MostrarFila=mysql_fetch_array($consulta)){?>
								<a href="./especialidad.php?especialidad=<?php echo $MostrarFila['id']; ?>"><div class="specialityName"><?php echo $MostrarFila['name']; ?></div></a>
							<?php }
						}
					} ?>
				</div>		
				<div class="clear"></div>				
			</div>
		</div>
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