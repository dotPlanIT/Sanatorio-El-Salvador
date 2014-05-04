<?php
	$RegistrosAMostrar=9;

	//estos valores los recibo por GET
	if(isset($_GET['pag'])){
		require_once("./../classes/mysqlclass.php");
		$db = new MySQL();
		$RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
		$PagAct=$_GET['pag'];
	//caso contrario los iniciamos
	}else{
		require_once("./classes/mysqlclass.php");
		$db = new MySQL();
		$RegistrosAEmpezar=0;
		$PagAct=1;
	}
	
	//******--------determinar las páginas---------******//
	
	$NroRegistros = $db->num_rows($db->consulta("SELECT * FROM sent_newsletters n where n.status=1 "));

	$PagAnt=$PagAct-1;
	$PagSig=$PagAct+1;
	$PagUlt=$NroRegistros/$RegistrosAMostrar;

	//verificamos residuo para ver si llevará decimales
	$Res=$NroRegistros%$RegistrosAMostrar;
	// si hay residuo usamos funcion floor para que me devuelva la parte entera, SIN REDONDEAR, y le sumamos una unidad para obtener la ultima pagina
	if($Res>0) $PagUlt=floor($PagUlt)+1;

?>
<div class="sentSubTitle">Mir&aacute; nuestras &uacute;ltimas ediciones:</div>
<div class="pagersBoletin">
	<?php 
		//echo "<a onclick=\"Pagina('1')\">Primero</a> ";
		if($PagAct>1) echo "<a onclick=\"Pagina('$PagAnt','boletinesAjax','pager-salvador-noticias')\"><< </a> ";
		echo "P&aacute;gina ".$PagAct." de ".$PagUlt;
		if($PagAct<$PagUlt)  echo " <a onclick=\"Pagina('$PagSig','boletinesAjax','pager-salvador-noticias')\"> >></a> ";
		//echo "<a onclick=\"Pagina('$PagUlt')\">Ultimo</a>";
	?>
</div>
<div class="boletines">
<?php
	$Resultado = $db->consulta("select n.* from sent_newsletters n where n.status=1 order by n.date desc Limit ".$RegistrosAEmpezar.", ".$RegistrosAMostrar);
	
	if($db->num_rows($Resultado)>0){
		while($MostrarFila=mysql_fetch_array($Resultado)){
		$date = date_create($MostrarFila['date']);
?>		<a href="<?PHP echo $MostrarFila['link'];?>" target="_blank">
			 <div class="boletinContent">
				 <img src="http://localhost/cms/app/webroot/files/sentnewsletter/<?PHP echo $MostrarFila['image_dir'];?>/list_<?PHP echo $MostrarFila['image'];?>" />
				 <span class="reddMoreLastNews" href="">+</span>
				 <div class="contentBoletin">
					<span class="boletinTitle"><?PHP echo $MostrarFila['title'];?></span></br>
					<span class="dateBoletin"><?PHP echo $date->format('F Y');?></span>
				 </div>
			</div>
		</a>
<?php			
		}
	}
?>
</div>
<div class="clear"></div>
<div class="pagersBoletin">
	<?php 
		//echo "<a onclick=\"Pagina('1')\">Primero</a> ";
		if($PagAct>1) echo "<a onclick=\"Pagina('$PagAnt','boletinesAjax','pager-salvador-noticias')\"><< </a> ";
		echo "p&aacute;gina ".$PagAct." de ".$PagUlt;
		if($PagAct<$PagUlt)  echo " <a onclick=\"Pagina('$PagSig','boletinesAjax','pager-salvador-noticias')\"> >></a> ";
		//echo "<a onclick=\"Pagina('$PagUlt')\">Ultimo</a>";
	?>
</div>

