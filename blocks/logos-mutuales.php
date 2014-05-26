<?PHP
	$consulta = $db->consulta("select * from health_icons where status=1 order by position desc limit 30");
?>
<div class="logosMutuales">
<?php 
if($db->num_rows($consulta)>0){
	while($logo = mysql_fetch_array($consulta)){?>
	<a href="<?PHP echo $logo['link'];?>" target="_blanck">
		<div class="logoMutual">
			<img src="http://localhost/cms/app/webroot/files/healthicons/<?PHP echo $logo['image_dir'];?>/lateral_<?PHP echo $logo['image'];?>" onerror="this.onerror=null;this.src='./img/default/icon-S.png';" />
		</div>
	</a>
	<?php }
}?>		
</div>