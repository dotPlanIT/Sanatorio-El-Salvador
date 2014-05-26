<?PHP
	$consulta = $db->consulta("select * from buttons where status=1 order by position desc limit 4");
?>
<div class="lateralCallToActions">
<?php 
if($db->num_rows($consulta)>0){
	while($cta = mysql_fetch_array($consulta)){?>
	<a href="<?PHP echo $cta['link'];?>">
		<div class="lateralCallToAction">
			<img src="http://localhost/cms/app/webroot/files/buttons/<?PHP echo $cta['image_dir'];?>/button_<?PHP echo $cta['image'];?>" onerror="this.onerror=null;this.src='./img/default/icon-S.png';" />
			<span><?PHP echo $cta['phrase1'];?></span><br/><span class="CTAText"><?PHP echo $cta['phrase2'];?></span>
		</div>
	</a>
	<?php }
}?>			
</div>