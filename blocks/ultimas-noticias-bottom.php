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
		if($i==4){
		 $lastClass = 'lastNotice';
		}?>
		<div class="box-notice <?PHP echo $lastClass;?>">
		 <img src="http://localhost/cms/app/webroot/files/notices/<?PHP echo $notice['image_dir'];?>/home_<?PHP echo $notice['image'];?>" />
		 <span class="typyNotice"><?PHP echo $notice['type'];?></span>
		 <div class="contentLastNewss">
			<span class="noticeTitle"><?PHP echo $notice['title'];?></span>
			<span class="noticeDrop"><?PHP echo $notice['drop'];?></span>
		 </div>
		 <a class="reddMoreLastNewss" href="">+</a>
		</div>
		
	<?PHP }
 }?>
</div>