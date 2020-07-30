<?php

require_once "categories.php";
include_once "../cn/connection.php";
 /**
 *
 */
 class DAOCategories
 {

 	function __construct()
 	{

 	}

 	public function getData()
 	{
		$c = conectar();
		$sql="select * from categories;";
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
		$name = $obj->getNameCat();
		$logo = $obj->getLogo();
		$sql="insert into categories value (0,'$name',1,'$logo');";
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
 		$id=$obj->getIdCat();
		$name = $obj->getNameCat();
		$logo = $obj->getLogo();
		$sql="update categories set name_cat='$name', logo='$logo' where id_cat=$id;";
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
 		$id=$obj->getIdCat();
		$state=$obj->getStateCat();
		$sql="update categories set state_cat=$state where id_cat=$id;";
		if (!$c->query($sql)) {
			print "0";
		}else{
			    echo "1"; 
		     }
		mysqli_close($c);
 	}


 }
 ?>