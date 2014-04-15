<?PHP
	$consulta = $db->consulta("select n.*, tn.title as type from notices n left join type_notices tn on n.type_notice_id = tn.id where n.status=1 order by n.date desc limit 4");
?>
<div class="lastNews">
<div class="boxTitle">Últimas <span>Novedades</span></div>
<?PHP 
if($db->num_rows($consulta)>0){
	$lastClass = "";
	$i=0;
	while($notice = mysql_fetch_array($consulta)){
		$i++;
		$date = date_create($notice['date']);
		if($i==4){
		 $lastClass = 'lastNotice';
		}?>
		<div class="box-notice <?PHP echo $lastClass;?>">
		 <img src="http://localhost/cms/app/webroot/files/notices/<?PHP echo $notice['image_dir'];?>/home_<?PHP echo $notice['image'];?>" />
		 <div class="contetTypeNotice">
			 <span class="typeNotice"><?PHP echo $notice['type'];?></span>
			 <span class="dateNotice"><?PHP echo $date->format('d/m/Y');?></span>
		 </div>
		 <div class="contentLastNews">
			<span class="noticeTitle"><?PHP echo $notice['title'];?></span>
			<span class="noticeDrop"><?PHP echo $notice['lower'];?></span>
		 </div>
		 <a class="reddMoreLastNews" href="">+</a>
		</div>
		
	<?PHP }
 }?>
</div>