<?php  class MySQL{

  private $conexion; 
  private $total_consultas;

  //Se conecta a la base de datos 
  public function MySQL(){ 
	$server = 'localhost';
	$user = 'root';
	$password = '';
	$nombreBD = 'dotplan_cms';
	
    if(!isset($this->conexion)){
      $this->conexion = (mysql_connect($server,$user,$password))or die(mysql_error());
      mysql_select_db($nombreBD,$this->conexion) or die(mysql_error());
	  mysql_query("SET NAMES 'utf8'"); 
    }
  }

  public function consulta($consulta){ 
    $this->total_consultas++; 
    $resultado = mysql_query($consulta,$this->conexion);
    if(!$resultado){ 
      echo 'MySQL Error: ' . mysql_error();
      exit;
    }
    return $resultado;
  }

  public function fetch_array($consulta){
   return mysql_fetch_array($consulta);
  }

  public function num_rows($consulta){
   return mysql_num_rows($consulta);
  }

  public function getTotalConsultas(){
   return $this->total_consultas; 
  }
  
  public function mysql_fetch_row($consulta){
    return mysql_fetch_row(mysql_query($consulta,$this->conexion));
  }

}
?>