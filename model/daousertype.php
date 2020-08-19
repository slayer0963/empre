<?php

require_once "usertype.php";
include_once "../cn/connection.php";
 /**
 *
 */
 class DAOUserType
 {

 	function __construct()
 	{

 	}

 	public function getData()
 	{
		$c = conectar();
		$sql="select * from user_type;";
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
		$name = $obj->getNameUstp();
		$sql="insert into user_type value (0,'$name',1);";
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
 		$id=$obj->getIdUstp();
		$name = $obj->getNameUstp();
		$sql="update user_type set name_ustp='$name' where id_ustp=$id;";
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
 		$id=$obj->getIdUstp();
		$state=$obj->getStateUstp();
		$sql="update user_type set state_ustp=$state where id_ustp=$id;";
		if (!$c->query($sql)) {
			print "0";
		}else{
			    echo "1";
		     }
		mysqli_close($c);
 	}


 }
 ?>
