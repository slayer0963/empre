<?php

require_once "color.php";
include_once "../cn/connection.php";
 /**
 *
 */
 class DAOColor
 {

 	function __construct()
 	{

 	}

 	public function getData()
 	{
		$c = conectar();
		$sql="select * from color;";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}


 	public function setData($obj)
 	{
 		$c=conectar();
		$name = $obj->getColorName();
		$sql="insert into color value (0,'$name',1);";
		if (!$c->query($sql)) {
			print "0";
		}else{
			    echo "1"; 

		     }
		mysqli_close($c);
 	}


 	public function updateData($obj)
 	{
 		$c=conectar();
 		$id=$obj->getColorId();
		$name = $obj->getColorName();
		$sql="update color set name_color='$name' where id_color=$id;";
		if (!$c->query($sql)) {
			print "0".$sql;
		}else{
			    echo "1"; 
		     }
		mysqli_close($c);
 	}

 	public function updateState($obj)
 	{
 		$c=conectar();
 		$id=$obj->getColorId();
		$state=$obj->getColorState();
		$sql="update color set state_color=$state where id_color=$id;";
		if (!$c->query($sql)) {
			print "0";
		}else{
			    echo "1"; 
		     }
		mysqli_close($c);
 	}


 }
 ?>