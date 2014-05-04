function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}
function Pagina(nropagina,divAjax,page){
	
	//donde se mostrar� los registros
	divContenido = document.getElementById(divAjax);
	//borro el contenido
	 $("#"+divAjax).empty();
	//le pongo la imagen del gif
	divContenido.innerHTML = '<span class="loading"></span>';
	ajax=objetoAjax();
	//uso del medoto GET
	//indicamos el archivo que realizar� el proceso de paginar
	//junto con un valor que representa el nro de pagina
	URLAjex = "pagers/"+page+".php?pag="+nropagina;
	ajax.open("GET", URLAjex);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//borro el loading
			$("#"+divAjax).empty();
			//mostrar resultados en esta capa
			divContenido.innerHTML = ajax.responseText
		}
	}
	//como hacemos uso del metodo GET
	//colocamos null ya que enviamos 
	//el valor por la url ?pag=nropagina
	ajax.send(null)
}