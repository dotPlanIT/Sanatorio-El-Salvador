<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
$miArray = array(1,4,6,8,3,34.8,9,43);
print_r(json_encode($miArray));
/*
Data Source=###IP###,1433;Network Library=DBMSSOCN;Initial Catalog=GaSalud;User ID=WebUser;Password=NUR4TbVnBWsxa8zU;
*/
//phpinfo();

// El servidor con el formato: <computer>\<instance name> o 
// <server>,<port> cuando se use un número de puerto diferente del de defecto
$server = 'sanatoriosalvador.no-ip.org,1433';

// Connect to MSSQL
/*$link = mssql_connect($server, 'WebUser', 'NUR4TbVnBWsxa8zU');

if (!$link) {
    die('Algo fue mal mientras se conectava a MSSQL');
}
mssql_select_db("GaSalud");

$result=mssql_query("select * from spMutualesSelWebSalvador");

while ($row=mssql_fetch_array($result)) {
	$counter++; 
	$c1=$row[0];
	$c2=$row[1];
	echo ("c1: $c1, c2: $c2\n");
}
mssql_close($link);*/



$conn = mssql_connect($server, 'WebUser', 'NUR4TbVnBWsxa8zU')or die ("No conecta con SQLSERVER");;
mssql_select_db("GaSalud");

//parametros del procedimeinto
/*$p_cadena = 'Probando';
$p_entero = 6;
$p_mensaje = '';
$p_salida = 0;*/

//Inicializar el procedimeinto
$stmt = mssql_init('spEspecialidadesSelWebSalvador', $conn);


//Para pasar los parametrps
/*mssql_bind($stmt, '@cadena', $p_cadena, SQLVARCHAR, false, false, 10);
mssql_bind($stmt, '@entero', $p_entero, SQLINT4);
//parametros de salida
mssql_bind($stmt, '@mensaje', $p_mensaje, SQLVARCHAR, true, false, 50);
mssql_bind($stmt, 'RETVAL', $p_salida, SQLINT4);*/

//Ejecutar el procedimiento y limpiar la memoria
$result = mssql_execute($stmt);

//Mostrar lo que tienen los parametros de salida
/*echo 'Mensaje:: ', $p_mensaje, "\r\n", 'Salida:: ', $p_salida;*/

do
{
	echo 'spEspecialidadesSelWebSalvador';?><br/><?php
	while ($row = mssql_fetch_row($result))
	{
		echo 'Columna 0: ' .$row[0].' Columna 1: ' .$row[1];?><br/><?php
	}
}
while (mssql_next_result($result) !== false);

mssql_free_result($result);
mssql_free_statement($stmt);

mssql_close($conn);

?>
</body>
</html>
