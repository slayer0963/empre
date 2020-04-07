<?php

// require_once "business.php";
include_once "../cn/connection.php";
 /**
 *
 */
 class DAOAproduct
 {

 	function __construct()
 	{

 	}


 	public function getDataB($id_usu)
 	{
		$c = conectar();
		$sql="select bu.id_bus,bu.name_bus,bu.pic_logo_bus,u.fullname_user as id_user, bu.state_bus  from business bu inner join users u on bu.id_user=u.id_user where u.id_user=$id_usu;";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}

	public function getDataU()
 	{
		$c = conectar();
		$sql="select id_user, fullname_user, imagen from users;";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}

	public function getDataP($id_bus)
 	{
		$c = conectar();
		$sql="select pro.id_pro, pro.name_pro from assignment_probus apb inner join product pro on apb.id_pro=pro.id_pro where id_bus=$id_bus;";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}

	public function getDataC()
 	{
		$c = conectar();
		$sql="select id_color, name_color, code_color from color;";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}

	public function getDataM()
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

	public function getDataS()
 	{
		$c = conectar();
		$sql="select * from sizes;";
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