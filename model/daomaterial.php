<?php

require_once "material.php";
include_once "../cn/connection.php";
 /**
 *
 */
 class DAOMaterial
 {

 	function __construct()
 	{

 	}

 	public function getData()
 	{
		$c = conectar();
		$sql="select * from material;";
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
    $c->set_charset('utf8');
		$name = $obj->getNameMat();
		$sql="insert into material value (0,'$name',1);";
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
    $c->set_charset('utf8');
 		$id=$obj->getIdMaterial();
		$name = $obj->getNameMat();
		$sql="update material set  name_mat='$name' where id_mat=$id;";
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
 		$id=$obj->getIdMaterial();
		$state=$obj->getStateMat();
		$sql="update material set state_mat=$state where id_mat=$id;";
		if (!$c->query($sql)) {
			print "0";
		}else{
			    echo "1";
		     }
		mysqli_close($c);
 	}


 }
 ?>
