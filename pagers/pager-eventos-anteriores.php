<?php
	$RegistrosAMostrar=5;

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
	
	$NroRegistros = $db->num_rows($db->consulta("SELECT * FROM events n where n.status=1 and date_from < curdate() ".$conditions." order by date_from asc"));

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
		if($PagAct>1) echo "<a onclick=\"Pagina('$PagAnt','eventosAnterioresAjax','pager-eventos-anteriores')\"><< </a> ";
		echo "P&aacute;gina ".$PagAct." de ".$PagUlt;
		if($PagAct<$PagUlt)  echo " <a onclick=\"Pagina('$PagSig','eventosAnterioresAjax','pager-eventos-anteriores')\"> >></a> ";
		//echo "<a onclick=\"Pagina('$PagUlt')\">Ultimo</a>";
	?>
</div>
<?php
	$Resultado = $db->consulta("SELECT * FROM events n where n.status=1 and date_from < curdate()".$conditions." order by date_from asc Limit ".$RegistrosAEmpezar.", ".$RegistrosAMostrar);
	
	if($db->num_rows($Resultado)>0){
		while($MostrarFila=mysql_fetch_array($Resultado)){
		$date = date_create($MostrarFila['date_from']);?>
		<a class="linkEvent" href="./evento.php?evento=<?PHP echo $MostrarFila['id'];?>">
		<div class="eventHeaderList">	
			<div class="bookmarkList" >
				<abbr title="<?PHP echo $date->format('M');?>"><?PHP echo $date->format('M');?></abbr> <?PHP echo $date->format('d');?><sup></sup> <abbr><?PHP echo $date->format('Y');?></abbr>
				<sub><?PHP echo $date->format('H:m');?></sub>
			</div>
			<div class="eventData">
				<div class="eventTitle"><?PHP echo $MostrarFila['title'];?></div>
				<div class="eventPlace"><b>Lugar: </b>&nbsp; <?PHP echo $MostrarFila['place'];?></div>
				<div class="eventDestinations"><b>Destinado a:</b>&nbsp; <?PHP echo $MostrarFila['receivers'];?></div>
			</div>
		</div>
		</a>
		<?php }
	} ?>

<div class="pagersNovedades">
	<?php 
		//echo "<a onclick=\"Pagina('1')\">Primero</a> ";
		if($PagAct>1) echo "<a onclick=\"Pagina('$PagAnt','eventosAnterioresAjax','pager-eventos-anteriores')\"><< </a> ";
		echo "P&aacute;gina ".$PagAct." de ".$PagUlt;
		if($PagAct<$PagUlt)  echo " <a onclick=\"Pagina('$PagSig','eventosAnterioresAjax','pager-eventos-anteriores')\"> >></a> ";
		//echo "<a onclick=\"Pagina('$PagUlt')\">Ultimo</a>";
	?>
</div>

