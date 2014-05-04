<?PHP
	$consulta = $db->consulta("select e.id, e.title, e.date_from,  LEFT(e.body,100) as cuerpo, e.receivers from events e where e.status=1 order by date_from desc limit 2");
?>
<div class="events">
<div class="TitleEvents">Agenda de Actividades</div>
<?php 
if($db->num_rows($consulta)>0){
	while($event = mysql_fetch_array($consulta)){
		$date = date_create($event['date_from']);?>
		<a href="evento.php?evento=<?PHP echo $event['id'];?>">
			<div class="event">
				<div class="dateEvent">
					<span class="dayEvent"><?PHP echo $date->format('d');?></span></br>
					<span class="monthEvent"><?PHP echo $date->format('M');?></span>
				</div>
				<div class="titleEvent"><?PHP echo $event['title'];?></div>
				<span class="dropEvent"><?PHP echo strip_tags($event['cuerpo']);?>...</span>
				<div class="clear"></div>
				<hr>
				<div class="receiversEvent">Destinado a <?PHP echo $event['receivers'];?></div>
			</div>
		</a>
	<?php }
}?>				
</div>