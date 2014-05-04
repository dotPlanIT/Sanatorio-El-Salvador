<?PHP 
	require_once("./classes/mysqlclass.php");
	$db = new MySQL();
	$configurations = $db->consulta("SELECT * FROM configurations");
	if($db->num_rows($configurations)>0){
	  $configuration = $db->fetch_array($configurations);
	 }
	if (isset($_POST['buscar'])) {
		$_SESSION['variable'] = $_POST['buscar'];
		
	}else if(isset($_SESSION['BUSCAR'])) {
		$_SESSION['variable'] = $_SESSION['BUSCAR'];
	}else{
		$_SESSION['variable'] = "";
	}
?>
<div class="headerLeft"><a href="http://sanatoriodelsalvador.com"><img src="img/logo.png"/></a></div>
<div class="headerRight">
	<div class="headerLineFirst">
		<div class="turneroHeader"><a href=""><img src="img/header/header-turnero.png" /><span class="headerText">TURNOS<br/>ONLINE</span></a></div>
		<div class="phonesHeader"><img src="img/header/header-phone.jpg" /><span class="headerText"><?PHP echo $configuration['phone_one'];?></span><br/><span class="headerText"><?PHP echo $configuration['phone_two'];?></span></div>
	</div>
	<div class="clear"></div>
	<div class="headerLineSecond">
		<form name="global-search" action="search.php" method="post">
			<input type="text" name="buscar" id="buscar" value="<?php echo $_SESSION['variable']; ?>" />
			<input id="enviar"  name="enviar" type='submit' value="." class="headerSearchSubmit" />
		</form>
	</div>
	<div class="headerLineThird">
		<a href="https://twitter.com/SdelSalvador" target="_blank"><img src="img/header/header-tw.jpg" /></a>
		<a href="http://www.flickr.com/photos/94256088@N03/" target="_blank"><img src="img/header/header-fr.jpg" /></a>
		<a href="https://www.facebook.com/SanatoriodelSalvador" target="_blank"><img src="img/header/header-fb.jpg" /></a>
		<a href="" target="_blank"><img src="img/header/header-in.jpg" /></a>
		<a href="https://www.youtube.com/channel/UC5GUTHeSz02-0Z2Keq_IVyQ?feature=watch" target="_blank"><img src="img/header/header-yt.jpg" /></a>
	</div>
</div>
<div class="clear"></div>