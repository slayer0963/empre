<?php

require_once "producttype.php";
include_once "../cn/connection.php";
 /**
 *
 */
 class DAOProductType
 {

 	function __construct()
 	{

 	}

 	public function getData()
 	{
		$c = conectar();
		$sql="select * from product_type;";
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
		$name = $obj->getNameTpro();
		$sql="insert into product_type value (0,'$name',1);";
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
 		$id=$obj->getIdTpro();
		$name = $obj->getNameTpro();
		$sql="update product_type set name_tpro='$name' where id_tpro=$id;";
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
 		$id=$obj->getIdTpro();
		$state=$obj->getStateTpro();
		$sql="update product_type set state_tpro=$state where id_tpro=$id;";
		if (!$c->query($sql)) {
			print "0";
		}else{
			    echo "1"; 
		     }
		mysqli_close($c);
 	}


 }
 ?>