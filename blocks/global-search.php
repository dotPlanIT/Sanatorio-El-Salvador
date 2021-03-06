<?php
// Parametros a ser usados por el Paginador y el Buscador
$cantidadRegistrosPorPagina	= 10;
$cantidadEnlaces            = 5; // Cantidad de enlaces que tendra el paginador.
$totalRegistros             = 0;

// Vemos si viene por el paginador o por el form del buscador
if (isset($_POST['buscar'])) { // Viene por el buscador
	$pagina                 = 0;
	$inicioLimit            = 0;
	$_SESSION['BUSCAR']     = $_POST['buscar'];
	// Configuro el paginador
	require_once 'classes/BuscadorFullText.php';
	
	//Notices
	$objBuscador = new BuscadorFullText($_POST['buscar'], 'notices n');
	// Agregamos los campos donde se buscara las palabras o criterios de busqueda
	$objBuscador->addCamposFullText('title, body','lower');

	// Campos que se obtendran como resultado
	$campos = array('id', 'title', 'body', '\'novedad\' as tabla','\'id\' as getParam');
	$objBuscador->addCamposResultado($campos);

	// añade a la consulta una condicion fija
	$objBuscador->addParametrosFijos("status = 1");
	
	// Para limitar la cantidad de caracteres en la salida de algun campo no funciona si se busca en varias tablas por eso uso el substr de PHP
	/*$objBuscador->limitarLargo('n.title', 100);
	$objBuscador->limitarLargo('n.body', 250);*/
	// Capturamos la consulta que se debe realizar y agregamos el limit
	$consulta1                = $objBuscador->getConsultaMysqlMultiple();
	
	
	//Institutionals
	$objBuscador2= new BuscadorFullText($_POST['buscar'], 'institutionals');
	$objBuscador2->addCamposFullText('title, body');
	$campos = array('id', 'title', 'body ','\'institucional\' as tabla','\'id\' as getParam');
	$objBuscador2->addCamposResultado($campos);
	$objBuscador2->addParametrosFijos("status = 1");
	$consulta2                = $objBuscador2->getConsultaMysqlMultiple();
	
	//Especialidades
	$objBuscador3= new BuscadorFullText($_POST['buscar'], 'specialties');
	$objBuscador3->addCamposFullText('name, description, sub_specialties, infrastructure, practices, other');
	$campos = array('id', 'name as title', 'description as body ','\'especialidad\' as tabla','\'especialidad\' as getParam');
	$objBuscador3->addCamposResultado($campos);
	$objBuscador3->addParametrosFijos("status = 1");
	$consulta3                = $objBuscador3->getConsultaMysqlMultiple();	

	//Eventos
	$objBuscador4= new BuscadorFullText($_POST['buscar'], 'events');
	$objBuscador4->addCamposFullText('title, body, place, receivers');
	$campos = array('id', 'title', 'body ','\'evento\' as tabla','\'evento\' as getParam');
	$objBuscador4->addCamposResultado($campos);
	$objBuscador4->addParametrosFijos("status = 1");
	$consulta4                = $objBuscador4->getConsultaMysqlMultiple();		
	
	//Prensa
	$objBuscador5= new BuscadorFullText($_POST['buscar'], 'editors');
	$objBuscador5->addCamposFullText('title, body');
	$campos = array('id', 'title', 'body ','\'editors\' as tabla','\'prensa\' as getParam');
	$objBuscador5->addCamposResultado($campos);
	$objBuscador5->addParametrosFijos("status = 1");
	$consulta5                = $objBuscador5->getConsultaMysqlMultiple();	

	//Preguntas frecuentes
	$objBuscador5= new BuscadorFullText($_POST['buscar'], 'faqs');
	$objBuscador5->addCamposFullText('question, response');
	$campos = array('id', 'question as title', 'response as body ','\'faqs\' as tabla','\'pregunta\' as getParam');
	$objBuscador5->addCamposResultado($campos);
	$objBuscador5->addParametrosFijos("status = 1");
	$consulta5                = $objBuscador5->getConsultaMysqlMultiple();		
	
	//Medicos
	$objBuscador6= new BuscadorFullText($_POST['buscar'], 'providers');
	$objBuscador6->addCamposFullText('name, cv, enrollment');
	$campos = array('id', 'name as title', 'cv as body ','\'medico\' as tabla','\'medico\' as getParam');
	$objBuscador6->addCamposResultado($campos);
	$objBuscador6->addParametrosFijos("status = 1");
	$consulta6                = $objBuscador6->getConsultaMysqlMultiple();		
	
	
	$consultaFinal = 'SELECT SQL_CALC_FOUND_ROWS * From (('.$consulta1.') UNION ('.$consulta2.')  UNION ('.$consulta3.') UNION ('.$consulta4.') UNION ('.$consulta5.') UNION ('.$consulta6.'))A LIMIT %d, %d';

	$_SESSION['CONSULTA']    = $consultaFinal;

} else { // Viene por el paginador
	$pagina					= isset($_GET['pagina'])? $_GET['pagina'] : 0;
	$inicioLimit			= $cantidadRegistrosPorPagina * $pagina;
	$consultaFinal          = isset($_SESSION['CONSULTA'])?$_SESSION['CONSULTA'] : '';
	$_SESSION['BUSCAR']     = isset($_SESSION['BUSCAR'])? $_SESSION['BUSCAR'] : '';
}


/*echo $consulta1.'<br /><br />';
echo $consulta2.'<br /><br />';
echo $consultaFinal.'<br /><br />';
echo 'Consulta Generada: <br />' .$consultaLimit      = sprintf($consulta1, $inicioLimit, $cantidadRegistrosPorPagina);
echo 'Consulta Generada: <br />' .$consultaLimit      = sprintf($consulta2, $inicioLimit, $cantidadRegistrosPorPagina);*/

$consultaLimit      = sprintf($consultaFinal, $inicioLimit, $cantidadRegistrosPorPagina);

if ($consultaLimit) {

	$resultados         = $db->consulta($consultaLimit);
	$resultadosCantidad = $db->mysql_fetch_row("SELECT FOUND_ROWS();");
	$totalRegistros     = $resultadosCantidad[0];   // Se usara en el Paginador
	if($totalRegistros >0 ){
	// Mostramos los resultados de la forma clasica
	while($fila = mysql_fetch_array($resultados)) {?>
		<div class="contentSearch">
			<a href="./<?php echo $fila['tabla'];?>.php?<?php echo $fila['getParam'];?>=<?php echo $fila['id'];?>">
				<div class="titleSearch"><?php echo $fila['title'];?></div>
				<div class="bodySearch"><?php echo strip_tags(substr($fila['body'],0,500));?>...</div>
			</a>	
		</div>
	<?php }
	}else{?>
		<div class="MessageSearch">No hemos encontrado resultados para su consulta.</div>
	<?php 
	}
}
// Comenzamos con el paginador.
require_once 'classes/search-paginador.php';
// Instanciamos la clase Paginador
$paginador          = new Paginador();

// Configuramos cuanto registros por pagina que debe ser igual a el limit de la consulta mysql
$paginador->setCantidadRegistros($cantidadRegistrosPorPagina);
$paginador->setCantidadEnlaces($cantidadEnlaces);

// Y mandamos a paginar desde la pagina actual y le pasamos tambien el total
// de registros de la consulta mysql.
$datos              = $paginador->paginar($pagina, $totalRegistros);


// Preguntamos si retorno algo, si retorno paginamos con los datos que nos da el
// paginador que es un arreglo.
if ($datos) {
	echo '<div align="center">';
	echo 'Pagina: ' . ($pagina + 1) . ' de ' . $paginador->getCantidadPaginas() . '<br />';
	echo 'Registros encontrados: ' . $totalRegistros . '<br />';
	foreach ($datos as $enlace) {
	?>
		<a href="?pagina=<?php echo $enlace['numero']; ?>" title="<?php echo $enlace['title']; ?>" style="text-decoration:none;"><?php echo $enlace['vista']; ?></a>
	<?php
	}
	echo "</div>";
} ?>
<br />







