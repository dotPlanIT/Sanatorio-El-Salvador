var myLatlng = new google.maps.LatLng(-31.392568,-64.114184);
var mapOptions = {
  zoom: 14,
  center: myLatlng,
  mapTypeId: google.maps.MapTypeId.ROADMAP
};
 
map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
var img = new google.maps.MarkerImage("img/footer/footer-email.png");

var marker = new google.maps.Marker({
  position: myLatlng,
  map: map,
  icon: img,   
  title:"Cooperativa Cocaproseco"
});

function agrandar(divDonde){
	var donde = $(divDonde);
	var sizeFuenteActual = donde.css('font-size');
    var sizeFuenteActualNum = parseFloat(sizeFuenteActual, 10);
    var sizeFuenteNuevo = sizeFuenteActualNum+1;
    donde.css('font-size', sizeFuenteNuevo);
    return false;
}

function achicar(divDonde){
	var donde = $(divDonde);
    var sizeFuenteActual = donde.css('font-size');
    var sizeFuenteActualNum = parseFloat(sizeFuenteActual, 10);
    var sizeFuenteNuevo = sizeFuenteActualNum-1;
    donde.css('font-size', sizeFuenteNuevo);
    return false;
}