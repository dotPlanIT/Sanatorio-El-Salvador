<?php
	$RegistrosAMostrar=4;

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
	if(isset($_GET['type'])){
		$conditions = " and n.type_notice_id = ".$_GET['type'];
	}else{
		$conditions = "";
	}
	
	$NroRegistros = $db->num_rows($db->consulta("SELECT * FROM notices n where n.status=1 ".$conditions));

	$PagAnt=$PagAct-1;
	$PagSig=$PagAct+1;
	$PagUlt=$NroRegistros/$RegistrosAMostrar;

	//verificamos residuo para ver si llevará decimales
	$Res=$NroRegistros%$RegistrosAMostrar;
	// si hay residuo usamos funcion floor para que me devuelva la parte entera, SIN REDONDEAR, y le sumamos una unidad para obtener la ultima pagina
	if($Res>0) $PagUlt=floor($PagUlt)+1;

?>

<div class="pagersNovedades">
	<?php 
		//echo "<a onclick=\"Pagina('1')\">Primero</a> ";
		if($PagAct>1) echo "<a onclick=\"Pagina('$PagAnt','novedadesAjax','pager-novedades')\"><< </a> ";
		echo "P&aacute;gina ".$PagAct." de ".$PagUlt;
		if($PagAct<$PagUlt)  echo " <a onclick=\"Pagina('$PagSig','novedadesAjax','pager-novedades')\"> >></a> ";
		//echo "<a onclick=\"Pagina('$PagUlt')\">Ultimo</a>";
	?>
</div>
<?php
	$Resultado = $db->consulta("select n.*, tn.title as type from notices n left join type_notices tn on n.type_notice_id = tn.id where n.status=1 ".$conditions." order by n.date desc Limit ".$RegistrosAEmpezar.", ".$RegistrosAMostrar);
	
	if($db->num_rows($Resultado)>0){
		while($MostrarFila=mysql_fetch_array($Resultado)){
		$date = date_create($MostrarFila['date']);
?>		<a href="novedad.php?id=<?PHP echo $MostrarFila['id'];?>">
			<div class="page-notice">
			 <img src="http://localhost/cms/app/webroot/files/notices/<?PHP echo $MostrarFila['image_dir'];?>/home_<?PHP echo $MostrarFila['image'];?>" />
			 <div class="newsContent">
				 <div class="contetTypeNotice">
					 <span class="typeNotice"><?PHP echo $MostrarFila['type'];?></span>
					 <span class="dateNotice"><?PHP echo $date->format('d/m/Y');?></span>
				 </div>
				 <div class="contentNews">
					<span class="noticeTitle"><?PHP echo $MostrarFila['title'];?></span>
					<span class="noticeDrop"><?PHP echo $MostrarFila['lower'];?></span>
				 </div>
				 <span class="reddMoreLastNews" href="">+</span>
			</div>
			</div>
		</a>
<?php			
		}
	}
?>

<div class="pagersNovedades">
	<?php 
		//echo "<a onclick=\"Pagina('1')\">Primero</a> ";
		if($PagAct>1) echo "<a onclick=\"Pagina('$PagAnt','novedadesAjax','pager-novedades')\"><< </a> ";
		echo "P&aacute;gina ".$PagAct." de ".$PagUlt;
		if($PagAct<$PagUlt)  echo " <a onclick=\"Pagina('$PagSig','novedadesAjax','pager-novedades')\"> >></a> ";
		//echo "<a onclick=\"Pagina('$PagUlt')\">Ultimo</a>";
	?>
</div>

