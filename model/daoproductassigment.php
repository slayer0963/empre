<?php

require_once "productassigment.php";
include_once "../cn/connection.php";
 /**
 *
 */
 class DAOProductAssigment
 {

 	function __construct()
 	{

 	}

 	public function setData($obj)
 	{
 		$c=conectar();
 		$bus = $obj->getIdBus();
		$pro = $obj->getIdPro();
		$sql="insert into assignment_probus value (0,$bus,$pro);";
		if (!$c->query($sql)) {
			print "0";
		}else{
			    echo "1"; 

		     }
		mysqli_close($c);
 	}

 	public function getDataUsers()
 	{
		$c = conectar();
		$sql="select * from users;";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}
 	public function getDataBusiness($id_usu)
 	{
		$c = conectar();
		$sql="select * from business where id_user=$id_usu;";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}


 	public function getData()
 	{
		$c = conectar();
		$sql="select * from product pro where not exists(select asi.id_pro from assignment_probus asi where asi.id_pro=pro.id_pro);";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}

	public function getDataProduct()
 	{
		$c = conectar();
		$sql="select pro.id_pro, pro.name_pro, pro.descr_pro, bus.name_bus, us.fullname_user from assignment_probus asi inner join product pro on asi.id_pro=pro.id_pro inner join business bus on asi.id_bus=bus.id_bus inner join users us on bus.id_user=us.id_user;";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}



 }
 ?>