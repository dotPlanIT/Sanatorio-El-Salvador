<?php
// Parametros a ser usados por el Paginador y el Buscador
$cantidadRegistrosPorPagina	= 1;
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
	$campos = array('id', 'title', 'body', '\'notices\' as tabla');
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
	$campos = array('id', 'title', 'body ','\'institutionals\' as tabla');
	$objBuscador2->addCamposResultado($campos);
	$objBuscador2->addParametrosFijos("status = 1");
	$consulta2                = $objBuscador2->getConsultaMysqlMultiple();
	
	
	$consultaFinal = 'SELECT SQL_CALC_FOUND_ROWS * From (('.$consulta1.') UNION ('.$consulta2.'))A LIMIT %d, %d';

	$_SESSION['CONSULTA']    = $consultaFinal;

} else { // Viene por el paginador
	$pagina					= isset($_GET['pagina'])? $_GET['pagina'] : 0;
	$inicioLimit			= $cantidadRegistrosPorPagina * $pagina;
	$consultaFinal          = isset($_SESSION['CONSULTA'])?$_SESSION['CONSULTA'] : '';
	$_SESSION['BUSCAR']     = isset($_SESSION['BUSCAR'])? $_SESSION['BUSCAR'] : '';
}

// incluimos e instanciamos la clase buscadorFullText, pasando como parametros
// el valor del campo de busqueda y la tabla a buscar.
?>
<!--<div align="center">
<form id="form1" name="form1" method="post" action="">
	<input type="text" name="buscar" id="buscar" value="<?php echo $_SESSION['BUSCAR']; ?>" />
	<input type="submit" name="enviar" id="enviar" value="Enviar" />
</form>-->
<?php
/*echo $consulta1.'<br /><br />';
echo $consulta2.'<br /><br />';
echo $consultaFinal.'<br /><br />';
echo 'Consulta Generada: <br />' .$consultaLimit      = sprintf($consulta1, $inicioLimit, $cantidadRegistrosPorPagina);
echo 'Consulta Generada: <br />' .$consultaLimit      = sprintf($consulta2, $inicioLimit, $cantidadRegistrosPorPagina);*/

$consultaLimit      = sprintf($consultaFinal, $inicioLimit, $cantidadRegistrosPorPagina);

//echo '</div><br /><br />';

if ($consultaLimit) {

	$resultados         = $db->consulta($consultaLimit);
	$resultadosCantidad = $db->mysql_fetch_row("SELECT FOUND_ROWS();");
	$totalRegistros     = $resultadosCantidad[0];   // Se usara en el Paginador

	// Mostramos los resultados de la forma clasica
	echo '<table>';
	while($fila = mysql_fetch_array($resultados)) {
		echo '<tr >';
			echo '<td style="border:1px; border-style:solid;">' . $fila['id'] . '</td>';
			echo '<td style="border:1px; border-style:solid;">' . $fila['title'] . '</td>';
			echo '<td style="border:1px; border-style:solid;">' . substr($fila['body'],0,500) . '</td>';
			echo '<td style="border:1px; border-style:solid;">' . $fila['tabla'] . '</td>';
		echo '</tr>';
	}
	echo '</table>';
} else { // Muestro Propiedades del Buscador
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
}
?>
<br />
