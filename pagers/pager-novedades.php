<?php
	require_once("/../classes/mysqlclass.php");
	$db = new MySQL();
	$RegistrosAMostrar=4;

	//estos valores los recibo por GET
	if(isset($_GET['pag'])){
		$RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
		$PagAct=$_GET['pag'];
	//caso contrario los iniciamos
	}else{
		$RegistrosAEmpezar=0;
		$PagAct=1;
	}
	
	//******--------determinar las páginas---------******//

	$NroRegistros = $db->num_rows($db->consulta("SELECT * FROM notices where status=1"));

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
		if($PagAct>1) echo "<a onclick=\"Pagina('$PagAnt')\"><<</a> ";
		echo "P&aacute;gina ".$PagAct." de ".$PagUlt;
		if($PagAct<$PagUlt)  echo " <a onclick=\"Pagina('$PagSig')\">>></a> ";
		//echo "<a onclick=\"Pagina('$PagUlt')\">Ultimo</a>";
	?>
</div>
<?php
	$Resultado = $db->consulta("select n.*, tn.title as type from notices n left join type_notices tn on n.type_notice_id = tn.id where n.status=1 order by n.date desc Limit ".$RegistrosAEmpezar.", ".$RegistrosAMostrar);
	
	if($db->num_rows($Resultado)>0){
		while($MostrarFila=mysql_fetch_array($Resultado)){
?>
		<div class="page-notice">
		 <img src="http://localhost/cms/app/webroot/files/notices/<?PHP echo $MostrarFila['image_dir'];?>/home_<?PHP echo $MostrarFila['image'];?>" />
		 <div class="newsContent">
			 <span class="typyNotice"><?PHP echo $MostrarFila['type'];?></span>
			 <div class="contentNews">
				<span class="noticeTitle"><?PHP echo $MostrarFila['title'];?></span>
				<span class="noticeDrop"><?PHP echo $MostrarFila['drop'];?></span>
			 </div>
			 <a class="reddMoreLastNews" href="">+</a>
		</div>
		</div>
<?php			
		}
	}
?>

<div class="pagersNovedades">
	<?php 
		//echo "<a onclick=\"Pagina('1')\">Primero</a> ";
		if($PagAct>1) echo "<a onclick=\"Pagina('$PagAnt')\"><<</a> ";
		echo "P&aacute;gina ".$PagAct." de ".$PagUlt;
		if($PagAct<$PagUlt)  echo " <a onclick=\"Pagina('$PagSig')\">>></a> ";
		//echo "<a onclick=\"Pagina('$PagUlt')\">Ultimo</a>";
	?>
</div>

