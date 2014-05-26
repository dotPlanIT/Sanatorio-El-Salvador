<?php
	$RegistrosAMostrar=6;

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
		$conditions = " and n.type_editor_id = ".$_GET['type'];
	}else{
		$conditions = "";
	}
	
	$NroRegistros = $db->num_rows($db->consulta("SELECT * FROM editors n where n.status=1 ".$conditions." order by date"));

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
		if($PagAct>1) echo "<a onclick=\"Pagina('$PagAnt','prensaAjax','pager-prensa')\"><< </a> ";
		echo "P&aacute;gina ".$PagAct." de ".$PagUlt;
		if($PagAct<$PagUlt)  echo " <a onclick=\"Pagina('$PagSig','prensaAjax','pager-prensa')\"> >></a> ";
		//echo "<a onclick=\"Pagina('$PagUlt')\">Ultimo</a>";
	?>
</div>
<div class="totalEditors">
<?php
	$Resultado = $db->consulta("select n.*, tn.id as typeId, tn.title as type, tn.photo as photo, tn.photo_dir as photo_dir from editors n left join type_editors tn on n.type_editor_id = tn.id where n.status=1 ".$conditions." order by n.date desc Limit ".$RegistrosAEmpezar.", ".$RegistrosAMostrar);
	$numEditor = 1;
	$classEditor ="impar";
	if($db->num_rows($Resultado)>0){
		while($MostrarFila=mysql_fetch_array($Resultado)){
		if($numEditor%2==0){$classEditor ="par";}else{$classEditor ="impar";}
		$numEditor++;
		$date = date_create($MostrarFila['date']); ?>
		<div class="editorsListContenedor <?PHP echo $classEditor; ?>">
			<div class="editorsList">
				<span class="typeEditor"></span><a href="listado-prensa.php?type=<?PHP echo $MostrarFila['typeId'];?>"><?PHP echo $MostrarFila['type'];?></a></br>
				<span class="editorTitle"><a class="editorList" href="prensa.php?prensa=<?PHP echo $MostrarFila['id'];?>"><?PHP echo $MostrarFila['means'];?></br></a></span>
				<hr>
				 <img src="http://localhost/cms/app/webroot/files/typeeditors/<?PHP echo $MostrarFila['photo_dir'];?>/typeeditor_<?PHP echo $MostrarFila['photo'];?>" />
				 <div class="editorContent">
					 <span class="editorMedio">Titulo: </span><a class="editorList" href="prensa.php?prensa=<?PHP echo $MostrarFila['id'];?>"><?PHP echo $MostrarFila['title'];?></a></br>
					 <span class="dateEditor">Fecha de publicaci&oacute;n: </span><?PHP echo $date->format('d/m/Y');?></br>
				</div>
			</div>
			<span class="linkEditor"><a class="reddMorePrensa" href="<?PHP echo $MostrarFila['link'];?>">+</a></span>
		</div>
<?php			
		}
	}
?>
</div>
<div class="pagersNovedades">
	<?php 
		//echo "<a onclick=\"Pagina('1')\">Primero</a> ";
		if($PagAct>1) echo "<a onclick=\"Pagina('$PagAnt','prensaAjax','pager-prensa')\"><< </a> ";
		echo "P&aacute;gina ".$PagAct." de ".$PagUlt;
		if($PagAct<$PagUlt)  echo " <a onclick=\"Pagina('$PagSig','prensaAjax','pager-prensa')\"> >></a> ";
		//echo "<a onclick=\"Pagina('$PagUlt')\">Ultimo</a>";
	?>
</div>

